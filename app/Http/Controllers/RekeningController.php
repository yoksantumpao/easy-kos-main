<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class RekeningController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_bank' => 'required',
            'no_rek' => 'required',
            'atn' => 'required'
        ]);
        return $validator;
    }

    public function index()
    {
        //
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                Rekening::where('id_pengelola', $checkPengelola->id)->get() : Rekening::all();
        return view('rekening.index', [
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
        
        $data = MainController::store(Rekening::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(Rekening $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Rekening::class, $id);
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
        $data = MainController::update(Rekening::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Rekening::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
