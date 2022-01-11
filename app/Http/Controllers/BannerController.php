<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index', [
            'banner' => Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create-or-edit',['act'=>'create']);
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
            'judul' => 'required',
            'gambar' => 'required',
        ]);




    $file = $request->file('gambar');
    $thumbname = time() . '-' . $file->getClientOriginalName();
    $file->move(public_path() . '/banner' . '/', $thumbname);

        Banner::create([
            'judul' => $request->judul,
            'gambar' => $thumbname,
        ]);

        return redirect()->route('banner.index')->with(['message'=>'Banner berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Banner::find($id);
        return view('banner.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banner::find($id);
        return view('banner.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/banner' . '/', $thumbname);


            Banner::where('id', $id)->update([
                'judul' => $request->judul,
                'gambar' => $thumbname,
            ]);
        }else {

        Banner::where('id', $id)->update([
            'judul' => $request->judul,

        ]);
        }



        return redirect()->route('banner.index')->with(['message'=>'Banner berhasil diubah','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect()->route('banner.index')->with(['message'=>'Banner berhasil dihapus','status'=>'success']);
    }
}
