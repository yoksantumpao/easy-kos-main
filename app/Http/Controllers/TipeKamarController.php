<?php

namespace App\Http\Controllers;

use App\Models\{TipeKamar, FasilitasKamar};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class TipeKamarController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_tipe' => 'required',
            'harga_kamar' => 'required',
            'ukuran_kamar' => 'required',
            // 'foto_tipe_kamar'=> 'required',
            'fasilitas_kamar'=> 'required'
        ]);
        return $validator;
    }

    public function index()
    {
        //
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                TipeKamar::where('id_pengelola', $checkPengelola->id)->get() : TipeKamar::all();
        return view('tipe_kamar.index', [
            'data' => $data,
            'fasilitas' => FasilitasKamar::all()
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
        if($request->file('foto_tipe_kamar')){
            $fileName = MainController::storeFile($request,'foto_tipe_kamar', 'fotoTipeKamar');
        }
        // dd($fileName);
        $input = $request->except(['_token']);
        $checkPengelola = MainController::checkPengelola();
        $input['id_pengelola'] = $checkPengelola ? $checkPengelola->id : null;
        $input['foto_tipe_kamar'] = $fileName;

        $data = MainController::store(TipeKamar::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(TipeKamar $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(TipeKamar::class, $id);
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
        $data = MainController::update(TipeKamar::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(TipeKamar::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}

