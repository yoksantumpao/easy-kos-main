<?php

namespace App\Http\Controllers;

use App\Models\{PenghuniKos, Pembayaran};
use Illuminate\Http\Request;
use Validator, File;
use App\Http\Controllers\MainController;

class PenghuniKosController extends Controller
{
    
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_penghuni' => 'required',
            'email_penghuni' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'no_wa' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'ktp' => 'required',
            'foto_profile' => 'required', 
        ]);
        return $validator;
    }

    public function index()
    {
        //
        return view('penghuni_kos.index', [
            'data' => PenghuniKos::all(),
        ]);
    }

    public function profilPenghuni($id)
    {
        //
        $checkPengelola = MainController::checkPengelola();
        return view('penghuni_kos.profil-penghuni', [
            'data' => PenghuniKos::find($id),
        ]);
    }
    public function riwayatPembayaranPenghuni($id)
    {
        //
        $data = Pembayaran::leftJoin('penghuni_kos','penghuni_kos.id', 'pembayarans.id_penghuni')
                        ->leftJoin('rumah_kos','rumah_kos.id', 'pembayarans.id_kos')
                        ->leftJoin('kamars','kamars.id', 'pembayarans.id_kamar')
                        ->where('pembayarans.id_penghuni', $id )
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
                        ->get();
        return view('penghuni_kos.riwayat-pembayaran', [
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
        if($request->file('ktp')){
            $fileName = MainController::storeFile($request,'ktp','fotoPenghuniKos');
            $input['ktp'] = $fileName;
        }
        if($request->file('foto_profile')){
            $fileName = MainController::storeFile($request,'foto_profile','fotoPenghuniKos');
            $input['foto_profile'] = $fileName;
        }

        $data = MainController::store(PenghuniKos::class, $input);

        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
        // dd(  $request);
    }

   
    public function show(PenghuniKos $fasilitas_kos)
    {
        //
    }

    
    public function edit($id)
    {
        return MainController::findId(PenghuniKos::class, $id);
    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validateForm($request);
        $oldData = MainController::findId(PenghuniKos::class, $id);
        $input = $request->except(['_token', '_method']);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('ktp')){
            $fileName = MainController::storeFile($request,'ktp', 'fotoPenghuniKos');
            File::delete('fotoPenghuniKos/'.$oldData->ktp);
            $input['ktp'] = $fileName;
        }
        if($request->file('foto_profile')){
            $fileName = MainController::storeFile($request,'foto_profile', 'fotoPenghuniKos');
            File::delete('fotoPenghuniKos/'.$oldData->foto_profile);
            $input['foto_profile'] = $fileName;
        }

        $data = MainController::update(PenghuniKos::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(PenghuniKos::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
