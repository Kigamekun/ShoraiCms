<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.index', [
            'page' => Page::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create-or-edit',['act'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'seo_title' => 'required',
            'content' => 'required',

        ]);



        Page::create([
            'title' => $request->title,
            'seo_title' => $request->seo_title,
            'content' => $request->content,

        ]);

        return redirect()->route('page.index')->with(['message'=>'Page berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Page::find($id);
        return view('page.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Page::find($id);

        return view('page.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Page::where('id', $id)
        ->update([
            'title' => $request->title,
            'seo_title' => $request->seo_title,
            'content' => $request->content,

        ]);

        return redirect()->route('page.index')->with(['message'=>'page berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Page::destroy($id);
        return redirect()->route('page.index')->with(['message'=>'page berhasil di delete','status'=>'success']);
    }
}
