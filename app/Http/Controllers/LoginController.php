<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, File;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\{Pengelola, PenghuniKos};
use App\Http\Controllers\MainController;



class LoginController extends Controller
{


    public function index(){
        // dd('login view');
        if(Auth::user()){
            return Redirect::to(url()->previous());
        }

        return view('login');
    }
    public function indexPengelola(){
        // dd(Auth::guard('pengelola')->user());
        if(Auth::guard('pengelola')->user()){
            return Redirect::to(url()->previous());
        }
        // if(Auth::user()){
        //     return Redirect::to(url()->previous());
        // }

        return view('login-pengelola');
    }
    public function post(Request $request){
        // dd($request);
        $request->validate([
            'email_penghuni' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email_penghuni', 'password');
        // dd($credentials);
        if(Auth::guard('penghuni')->attempt($credentials)){
            // dd(Auth::guard('pengelola')->user());
            // $redirect = 'pengelola/'.Auth::guard('pengelola')->user()->id;
            return redirect('profil/penghuni_kos/'.Auth::guard('penghuni')->user()->id);

        }
        return redirect("login-pengelola")->with('deleted', 'Login Failed');
    }
    public function postPengelola(Request $request){
        // dd($request);
        // dd($credentials);
        if($request->tipe == 'Pengelola'){
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $credentials = $request->only('email', 'password');
            if(Auth::guard('pengelola')->attempt($credentials)){
                // dd(Auth::guard('pengelola')->user());
                // $redirect = 'pengelola/'.Auth::guard('pengelola')->user()->id;
                return redirect('rumah_kos');

            }
            
        }else{
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){
            // dd('test');
                return redirect('pengelola');
            }

        }
        return redirect("login-pengelola")->with('deleted', 'Login Failed');
    }
    public function validateFormPengelola($req){
        $validator = $req->validate([ 
            'nama' => 'required|unique:pengelolas,nama',
            'email' => 'required|unique:pengelolas,email',
            'password' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required', 
            // 'role' => 'required', 
        ]);
        return $validator;
    }
    public function validateFormUser($req){
        $validator = $req->validate([ 
            'nama_penghuni' => 'required',
            'email_penghuni' => 'required|unique:penghuni_kos,email_penghuni',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'no_wa' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'ktp' => 'required',
        ]);
        return $validator;
    }
    public function registerUser(){
        return view('register-user');
    }
    public function registerPengelola(){
        return view('register-pengelola');
    }
    public function storeRegisterUser (Request $request){
        $validate = $this->validateFormUser($request);

        // if($validate->fails()){
        //     return view('register-pengelola', [
        //         'error' => $validate->errors()
        //     ]);
        // }

        $input = $request->except(['_token']);
        $input['password'] = bcrypt($request->password);

        if($request->file('ktp')){
            $fileName = MainController::storeFile($request,'ktp','fotoPenghuniKos');
            $input['ktp'] = $fileName;
        }
        if($request->file('foto_profile')){
            $fileName = MainController::storeFile($request,'foto_profile','fotoPenghuniKos');
            $input['foto_profile'] = $fileName;
        }
        $data = MainController::store(PenghuniKos::class, $input);

        return redirect()->route('login.index');
    }
    public function storeRegisterPengelola (Request $request){
        $validate = $this->validateFormPengelola($request);

        // if($validate->fails()){
        //     return view('register-pengelola', [
        //         'error' => $validate->errors()
        //     ]);
        // }

        $input = $request->except(['_token']);
        $input['role'] = 'pengelola';
        $input['password'] = bcrypt($request->password);
        $data = MainController::store(Pengelola::class, $input);

        return redirect()->route('login.pengelola');
    }


    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
        $guards = array_keys(config('auth.guards'));

        // Loop through each guard and logout.
        foreach ($guards as $guard) {
            $guard = app('auth')->guard($guard);

            // Not all guard types have a logout method. The SessionGuard (web) does,
            // the TokenGuard (api) does not. Only call the method if it exists
            // on the guard.
            if (method_exists($guard, 'logout')) {
                $guard->logout();
            }
        }
 
        return redirect('/login');
    }
}
