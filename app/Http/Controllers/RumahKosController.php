<?php

namespace App\Http\Controllers;

use App\Models\RumahKos;
use Illuminate\Http\Request;
use Validator,Auth;
use App\Http\Controllers\MainController;

class RumahKosController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_kos' => 'required',
            'jenis_kos' => 'required',
            'jlh_kamar' => 'required',
            'jlh_gedung' => 'required',
            'no_telp' => 'required', 
            'provinsi' => 'required', 
            'kab_kota' => 'required', 
            'kec' => 'required', 
            'alamat' => 'required', 
            'kode_pos' => 'required', 
            'deskripsi' => 'required', 
        ]);
        return $validator;
    }
    

    public function index()
    {
        //
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                RumahKos::where('id_pengelola', $checkPengelola->id)->get() : RumahKos::all();
        return view('rumah_kos.index', [
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

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token']);

        $checkPengelola = MainController::checkPengelola();
        $input['id_pengelola'] = $checkPengelola ? $checkPengelola->id : null;
        // dd($input, $checkPengelola);
        $data = MainController::store(RumahKos::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(RumahKos $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(RumahKos::class, $id);
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
        $data = MainController::update(RumahKos::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(RumahKos::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
