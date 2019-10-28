<?php

namespace App\Http\Controllers\Admin;
use Exception;
use App\Model\Tag;
use App\Model\Post;
use App\Model\Category;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category:id,name')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $request->all();
        // 用户ID
        $post['user_id'] = auth()->user()->id;
        // 文章内容
        $post['body'] = $post['editormd'];
        // 文章封面上传
        if ($request->hasFile('image')) {
            $post['image'] = $request->image->store('images');
        }
        $isCreate = Post::create($post);

        if ($isCreate) {
            // 文章标签
            if ($post['tags']) {
                $tags = explode(',', $post['tags']);
                $tagIds = [];
                collect($tags)->each(function($item, $key) use (&$tagIds){
                    $tag = Tag::firstOrCreate(['name' => $item]);
                    $tagIds[$key] = $tag->id;
                });
                $isCreate->tags()->sync($tagIds);
            }
            flash('添加文章成功！')->success();
        }else{
            flash('添加文章失败！')->error();
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with(['category:id,name', 'tags'])->find($id);
        if (is_null($post)) {
            abort(404);
        }
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $request->all();
        // 文章内容
        $post['body'] = $post['editormd'];
        // 文章封面上传
        if ($request->hasFile('image')) {
            $post['image'] = $request->image->store('images');
        }
        $article = Post::find($id);
        // 更新文章
        $article->fill($post)->save();

        if ($article) {
            // 文章标签，更新文章标签关系
            if ($post['tags']) {
                $tags = explode(',', $post['tags']);
                $tagIds = [];
                collect($tags)->each(function($item, $key) use (&$tagIds){
                    $tag = Tag::firstOrCreate(['name' => $item]);
                    $tagIds[$key] = $tag->id;
                });
                $article->tags()->sync($tagIds);
            }
            flash('修改文章成功！')->success();
        }else{
            flash('修改文章失败！')->error();
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Post::destroy($id);
        $isDelete ? flash('删除文章成功！')->success() : flash('删除文章失败！')->error();
        return redirect()->route('post.index');
    }
}
