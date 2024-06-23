<?php

namespace App\Http\Controllers;

use App\Models\{Kamar, TipeKamar, RumahKos, PenghuniKos};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;

class KamarController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'id_tipe_kamar' => 'required',
            'id_rumah_kos' => 'required',
            'nama_kamar' => 'required',
            'status_kamar' => 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                Kamar::leftJoin('tipe_kamars','tipe_kamars.id', 'kamars.id_tipe_kamar')
                        ->leftJoin('rumah_kos','rumah_kos.id', 'kamars.id_rumah_kos')
                        ->leftJoin('penghuni_kos','penghuni_kos.id', 'kamars.id_penghuni')
                        ->where('kamars.id_pengelola', $checkPengelola->id)
                        ->select('kamars.*','penghuni_kos.nama_penghuni as nama_penghuni','tipe_kamars.nama_tipe as nama_tipe', 'rumah_kos.nama_kos as nama_kos')
                        ->get() : 
                Kamar::leftJoin('tipe_kamars','tipe_kamars.id', 'kamars.id_tipe_kamar')
                        ->leftJoin('rumah_kos','rumah_kos.id', 'kamars.id_rumah_kos')
                        ->leftJoin('penghuni_kos','penghuni_kos.id', 'kamars.id_penghuni')
                        ->select('kamars.*','penghuni_kos.nama_penghuni as nama_penghuni','tipe_kamars.nama_tipe as nama_tipe', 'rumah_kos.nama_kos as nama_kos')
                        ->get();

        // $test = PenghuniKos::
        //             select('penghuni_kos.*')
        //             ->leftJoin('kamars','kamars.id_penghuni', 'penghuni_kos.id')
        //             ->whereNull('kamars.id_penghuni')
        //             ->get();
        // dd($test);

        return view('kamar.index', [
            'data' => $data,
            'tk' => $checkPengelola ? TipeKamar::where('id_pengelola',$checkPengelola->id)->get() : [],
            'rk' => $checkPengelola ? RumahKos::where('id_pengelola',$checkPengelola->id)->get() : [],
            'ph' => PenghuniKos::
                    select('penghuni_kos.*')
                    ->leftJoin('kamars','kamars.id_penghuni', 'penghuni_kos.id')
                    ->whereNull('kamars.id_penghuni')
                    ->get(),
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
        $data = MainController::store(Kamar::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(Kamar $kamar)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Kamar::class, $id);
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
        $data = MainController::update(Kamar::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Kamar::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
