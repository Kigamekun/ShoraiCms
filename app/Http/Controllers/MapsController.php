<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maps.index', [
            'maps' => Maps::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maps.create-or-edit',['act'=>'create']);
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
            'embed_maps' => 'required',

        ]);



        Maps::create([
            'nama' => $request->nama,
            'embed_maps' => $request->embed_maps,

        ]);

        return redirect()->route('maps.index')->with(['message'=>'Maps berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maps  $maps
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Maps::find($id);
        return view('maps.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maps  $maps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Maps::find($id);

        return view('maps.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maps  $maps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Maps::where('id', $id)
        ->update([
            'nama' => $request->nama,
            'embed_maps' => $request->embed_maps,

        ]);

        return redirect()->route('maps.index')->with(['message'=>'maps berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maps  $maps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Maps::destroy($id);
        return redirect()->route('maps.index')->with(['message'=>'maps berhasil di delete','status'=>'success']);
    }
}
