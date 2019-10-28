<?php

namespace App\Http\Controllers\Admin;
use Exception;
use App\Model\Link;
use App\Http\Requests\LinkRequest;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        
        $isCreate = Link::create($request->all());
        $isCreate ? flash('添加友链成功！')->success() : flash('添加友链失败！')->error();
        return redirect()->route('link.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $link = Link::find($id);
            return view('admin.link.edit', compact('link'));
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, $id)
    {
        try {
            $isUpdate = Link::find($id)->fill($request->all())->save();
            $isUpdate ? flash('修改友链成功！')->success() : flash('修改友链失败！')->error();
            return redirect()->route('link.index');
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Link::destroy($id);
        $isDelete ? flash('删除友链成功！')->success() : flash('删除友链失败！')->error();
        return redirect()->route('link.index');
    }
}
