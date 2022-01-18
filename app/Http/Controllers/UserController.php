<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{


    public static function getAvailableModels()
    {

    $models = [];
    $NotShowable = ['User'];
    $modelsPath = app_path('Models');
    $modelFiles = File::allFiles($modelsPath);
    foreach ($modelFiles as $modelFile) {
        if (!in_array($modelFile->getFilenameWithoutExtension(),$NotShowable)) {

            $models[] = $modelFile->getFilenameWithoutExtension();
        }
    }

    return $models;
    }

    public function index(Request $request)
    {

        $user = User::all();
        return view('user.index', compact('user'));
    }


    public function create(Request $request)
    {
        $component = $this->getAvailableModels();
        return view('user.create-or-edit',['act'=>'create','component'=>$component]);
    }

    public function store(Request $request)
    {

        $perm = json_encode($request->permission,TRUE);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $perm,
        ]);

        return redirect()->route('admin.users.index')->with(['message'=>'Berhasil menambah User','status'=>'success']);
    }

    public function edit($id)
    {
        $data = User::find($id);
        $component = $this->getAvailableModels();
        return view('user.create-or-edit', [
            'component'=>$component,
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
        $perm = json_encode($request->permission,TRUE);

        User::where('id', $id)

        ->update([
            'name' => $request->name,
            // 'email' => $request->email,

            'permission' => $perm,

        ]);

        return redirect()->route('admin.users.index')->with(['message'=>'users berhasil di update','status'=>'success']);
    }


    public function destroy($id)
    {

        User::destroy($id);
        return redirect()->route('admin.users.index')->with(['message'=>'maps berhasil di delete','status'=>'success']);
    }
}
