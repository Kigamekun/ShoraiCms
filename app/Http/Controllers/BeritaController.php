<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('berita.index', [
            'berita' => Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create-or-edit',['act'=>'create']);
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
            'content' => 'required',
            'gambar' => 'required',
        ]);


    $file = $request->file('gambar');
    $thumbname = time() . '-' . $file->getClientOriginalName();
    $file->move(public_path() . '/thumbBerita' . '/', $thumbname);

        Berita::create([
            'judul' => $request->judul,
            'content' => $request->content,
            'gambar' => $thumbname,
            'categories' => $request->categories
        ]);

        return redirect()->route('berita.index')->with(['message'=>'Berita berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Berita::find($id);
        return view('berita.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Berita::find($id);
        return view('berita.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumbBerita' . '/', $thumbname);


        Berita::where('id', $id)
        ->update([
            'judul' => $request->judul,
            'content' => $request->content,
            'gambar' => $thumbname,
        ]);

        }else {

            Berita::where('id', $id)
            ->update([
                'judul' => $request->judul,
                'content' => $request->content,
            ]);

        }


        return redirect()->route('berita.index')->with(['message'=>'Berita berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Berita::destroy($id);
        return redirect()->route('berita.index')->with(['message'=>'Berita berhasil di delete','status'=>'success']);
    }
}
