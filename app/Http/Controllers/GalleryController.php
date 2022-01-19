<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Carbon\Carbon;
class GalleryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index', [
            'gallery' => Gallery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create-or-edit',['act'=>'create']);
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
            'album_name' => 'required',
            'image' => 'required',

        ]);

        $data = [];

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = Carbon::now()->timestamp.$file->getClientOriginalName();
                $file->move(public_path() . '/gallery/', $name);
                $data[] = $name;
            }
        }

            Gallery::create([
            'album_name' => $request->album_name,
            'image' => json_encode($data),

        ]);

        return redirect()->route('gallery.index')->with(['message'=>'Gallery berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Gallery::find($id);
        return view('gallery.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Gallery::find($id);

        return view('gallery.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = [];
        foreach (explode(',',$request->imgold) as $key => $value) {
            if ($value != '') {
                $gallery[] = $value;
            }
        }


        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = Carbon::now()->timestamp.$file->getClientOriginalName();
                $file->move(public_path() . '/gallery/', $name);
                $data[] = $name;
            }
        }

        $gallery = array_merge($gallery,$data);

        Gallery::where('id', $id)
        ->update([
            'album_name' => $request->album_name,
            'image' => $gallery,

        ]);

        return redirect()->back()->with(['message'=>'gallery berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Gallery::destroy($id);
        return redirect()->route('gallery.index')->with(['message'=>'gallery berhasil di delete','status'=>'success']);
    }
}
