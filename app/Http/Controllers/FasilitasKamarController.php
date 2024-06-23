<?php

namespace App\Http\Controllers;

use App\Models\{FasilitasKamar};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class FasilitasKamarController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_fs_kr' => 'required',
            'deskripsi_fs_kr' => 'required',
            'foto_fs_kr' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('fasilitas_kamar.index', [
            'data' => FasilitasKamar::all(),
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
        $data = MainController::store(FasilitasKamar::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(FasilitasKamar $fasilitas_kamar)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(FasilitasKamar::class, $id);
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
        $data = MainController::update(FasilitasKamar::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(FasilitasKamar::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
