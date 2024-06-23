<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKos;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;
use File;

class FasilitasKosController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_fs_ks' => 'required',
            'deskripsi_fs_ks' => 'required',
            // 'foto_fs_ks' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                FasilitasKos::where('id_pengelola', $checkPengelola->id)->get() : FasilitasKos::all();
        return view('fasilitas_kos.index', [
            'data' => $data,
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $this->validateForm($request);
        $input = $request->except(['_token']);
        $checkPengelola = MainController::checkPengelola();
        $input['id_pengelola'] = $checkPengelola ? $checkPengelola->id : null;

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('foto_fs_ks')){
            $fileName = MainController::storeFile($request,'foto_fs_ks', 'fotoFasilitasKos');
            $input['foto_fs_ks'] = $fileName;
        }
        // dd($fileName);
        // dd($input);
        $data = MainController::store(FasilitasKos::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(FasilitasKos $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(FasilitasKos::class, $id);
    }

    
    public function update(Request $request, $id){
        $validate = $this->validateForm($request);
        $oldData = MainController::findId(FasilitasKos::class, $id);
        $input = $request->except(['_token', '_method']);
        
        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('foto_fs_ks')){
            $fileName = MainController::storeFile($request,'foto_fs_ks', 'fotoFasilitasKos');
            File::delete('fotoFasilitasKos/'.$oldData->foto_fs_ks);
            $input['foto_fs_ks'] = $fileName;
        }

        
        $data = MainController::update(FasilitasKos::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(FasilitasKos::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
