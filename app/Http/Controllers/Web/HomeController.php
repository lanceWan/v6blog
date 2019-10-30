<?php

namespace App\Http\Controllers\Web;
use MarkdownEditor;
use App\Http\Controllers\Controller;
use App\Model\Tag;
use App\Model\Post;
use App\Model\Link;
use App\Model\Setting;
use App\Model\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category:id,name')->latest()->paginate(6);
        $links = Link::latest()->get();
        return view('web.index', compact('posts', 'links'));
    }


    public function detail($id)
    {
        $post = Post::with(['tags', 'category:id,name'])->find($id);
        // 更新浏览文章次数
        $post->increment('view');
        return view('web.post', compact('post'));
    }

    public function aboutMe()
    {
        $about = Setting::where(['key' => 'about'])->first();
        return view('web.about', compact('about'));
    }
    
    public function message()
    {
        return view('web.message');
    }

    public function tag()
    {
        $tags = Tag::select('id', 'name')->get();
        return view('web.tag', compact('tags'));
    }

    public function postTag($id)
    {
        return $this->postItem($id, true);
    }

    public function postCategory($id)
    {
        return $this->postItem($id, false);
    }

    public function postItem($id, $bool)
    {
        $attribute = $bool ? Tag::find($id) : Category::find($id);
        $posts = optional($attribute)->posts()->latest()->paginate(6);
        $links = Link::latest()->get();
        return view('web.index', compact('posts', 'links', 'attribute'));
    }
}
