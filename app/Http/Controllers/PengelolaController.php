<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class PengelolaController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama' => 'required',
            'email' => 'required|unique:pengelolas,email',
            'password' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required', 
            'role' => 'required', 
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('pengelola.index', [
            'data' => Pengelola::all(),
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $this->validateForm($request);


        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token']);
        
        $data = MainController::store(Pengelola::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(Pengelola $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Pengelola::class, $id);
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validateForm($request);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        $data = MainController::update(Pengelola::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Pengelola::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
