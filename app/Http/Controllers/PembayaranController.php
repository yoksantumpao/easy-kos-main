<?php

namespace App\Http\Controllers;

use App\Models\{Pembayaran, Kamar, FasilitasKos};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;
use Auth;
class PembayaranController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            // 'id_penghuni'=> 'required',
            // 'id_kos'=> 'required',
            'id_kamar'=> 'required',
            'jlh_bln'=> 'required',
            'start_month'=> 'required',
            'end_month'=> 'required',
            'total_pembayaran'=> 'required',
            'status_pembayaran'=> 'required',
            // 'bukti_pembayaran'=> 'required',
        ]);
        return $validator;
    }

    public function index()
    {
        //
        $checkPengelola = MainController::checkPengelola();
        // dd($checkPengelola->id);
        $data = $checkPengelola ? 
                Pembayaran::leftJoin('penghuni_kos','penghuni_kos.id', 'pembayarans.id_penghuni')
                        ->leftJoin('rumah_kos','rumah_kos.id', 'pembayarans.id_kos')
                        ->leftJoin('kamars','kamars.id', 'pembayarans.id_kamar')
                        ->where('pembayarans.id_pengelola', $checkPengelola->id )
                        ->select(
                                'pembayarans.*', 
                                'penghuni_kos.nama_penghuni as nama_penghuni',
                                'penghuni_kos.email_penghuni as email_penghuni',
                                'penghuni_kos.jenis_kelamin as jenis_kelamin',
                                'penghuni_kos.pekerjaan as pekerjaan',
                                'penghuni_kos.no_telp as no_telp',
                                'penghuni_kos.no_wa as no_wa',
                                'rumah_kos.nama_kos as nama_kos',
                                'kamars.nama_kamar as nama_kamar'
                            )
                        ->get() : 
                Pembayaran::leftJoin('penghuni_kos','penghuni_kos.id', 'pembayarans.id_penghuni')
                        ->leftJoin('rumah_kos','rumah_kos.id', 'pembayarans.id_kos')
                        ->leftJoin('kamars','kamars.id', 'pembayarans.id_kamar')
                        ->select(
                                'pembayarans.*', 
                                'penghuni_kos.nama_penghuni as nama_penghuni',
                                'rumah_kos.nama_kos as nama_kos',
                                'kamars.nama_kamar as nama_kamar'
                            )
                        ->get();
        return view('pembayaran.index', [
            'data' => $data,
            'ph' => $checkPengelola ? 
                        Kamar::leftJoin('penghuni_kos', 'penghuni_kos.id', 'kamars.id_penghuni')
                          ->where('kamars.id_pengelola', $checkPengelola->id )
                          ->get()
                        : [],
            'km' => $checkPengelola ? 
                        Kamar::where('id_pengelola', $checkPengelola->id)->get()
                        : [],
            
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
        $getKamar = MainController::findId(Kamar::class, $input['id_kamar']);
        $input['id_pengelola'] = Auth::guard('pengelola')->user()->id;
        $input['id_penghuni'] = $getKamar->id_penghuni;
        $input['id_kos'] = $getKamar->id_rumah_kos;
        if($request->file('bukti_pembayaran')){
            $fileName = MainController::storeFile($request,'bukti_pembayaran', 'buktiPembayaran');
            $input['bukti_pembayaran'] = $fileName;
        }
        // dd($getKamar);

        $data = MainController::store(Pembayaran::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(Pembayaran $kamar)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(Pembayaran::class, $id);
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validateForm($request);
        $oldData = MainController::findId(FasilitasKos::class, $id);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('bukti_pembayarana')){
            $fileName = MainController::storeFile($request,'bukti_pembayarana', 'buktiPembayaran');
            File::delete('fotoFasilitasKos/'.$oldData->bukti_pembayarana);
            $input['bukti_pembayarana'] = $fileName;
        }
        $input = $request->except(['_token', '_method']);
        $getKamar = MainController::findId(Kamar::class, $input['id_kamar']);
        $input['id_pengelola'] = Auth::guard('pengelola')->user()->id;
        $input['id_penghuni'] = $getKamar->id_penghuni;
        $input['id_kos'] = $getKamar->id_rumah_kos;


        $data = MainController::update(Pembayaran::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Pembayaran::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
