<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.index', [
            'staff' => Staff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create-or-edit',['act'=>'create']);
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
            'jabatan' => 'required',
            'foto' => 'required',
            'nip' => 'required',
            'urutan' => 'required',
        ]);


    $file = $request->file('foto');
    $thumbname = time() . '-' . $file->getClientOriginalName();
    $file->move(public_path() . '/staffThumb' . '/', $thumbname);

        Staff::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $thumbname,
            'nip' => $request->nip,
            'urutan' => $request->urutan
        ]);

        return redirect()->route('staff.index')->with(['message'=>'staff berhasil ditambahkan','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staff::find($id);
        return view('staff.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Staff::find($id);
        // dd($data);
        return view('staff.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/staffThumb' . '/', $thumbname);


        Staff::where('id', $id)
        ->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $thumbname,
            'nip' => $request->nip,
            'urutan' => $request->urutan
        ]);

        }else {

            Staff::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'urutan' => $request->urutan

            ]);

        }


        return redirect()->route('staff.index')->with(['message'=>'Staff berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::destroy($id);
        return redirect()->route('staff.index')->with(['message'=>'Staff berhasil di delete','status'=>'success']);
    }
}
