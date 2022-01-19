<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.index', [
            'video' => Video::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create-or-edit',['act'=>'create']);
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
            'nama' => 'required',
            'video' => 'required',

        ]);



        Video::create([
            'nama' => $request->nama,
            'video' => $request->video,

        ]);

        return redirect()->route('video.index')->with(['message'=>'Video berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Video::find($id);
        return view('video.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Video::find($id);

        return view('video.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Video::where('id', $id)
        ->update([
            'nama' => $request->nama,
            'video' => $request->video,

        ]);

        return redirect()->route('video.index')->with(['message'=>'video berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Video::destroy($id);
        return redirect()->route('video.index')->with(['message'=>'video berhasil di delete','status'=>'success']);
    }
}
