<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pendaftaran User</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('../theme/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100" style="align-content: center;align-items: center">
                {{-- <img src="{{ asset('logokk.png') }}" width="240" height="300" alt=""> --}}
                <div class="col-xl-8">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="index.html"> <h4 style="color: #1853fe">Pendaftaran User</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('register-user.post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="nama_penghuni" type="text" name="nama_penghuni" class="form-control  @error('nama_penghuni') is-invalid @enderror" placeholder="Nama Penghuni">
                                        @error('nama_penghuni')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email_penghuni" type="text" name="email_penghuni" class="form-control  @error('email_penghuni') is-invalid @enderror" placeholder="Email Penghuni">
                                        @error('email_penghuni')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi Penghuni" required>
                                        @error('password')
                                           <div  class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                    </div>  
                                    
                                    <div class="form-group row">
                                                {{-- <label class="col-sm-2 col-form-label">Jenis Kelamin</label> --}}
                                                <div class="col-sm-10">

                                                    
                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" >
                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                    <div style="display: none" id="val-jenis_kelamin-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"  placeholder="Nomor Telp Pengelola" required>
                                        
                                       @error('no_telp')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                       
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"  placeholder="Nomor Whatsapp" required>
                                        
                                       @error('no_wa')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                       
                                    </div>
                                    <div class="form-group">
                                        <input id="pekerjaan" type="text" name="pekerjaan" class="form-control  @error('pekerjaan') is-invalid @enderror" placeholder="Pekerjaan Penghuni">
                                        @error('pekerjaan')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror"  placeholder="NIK" required>
                                        
                                       @error('nik')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Foto KTP</label>
                                        <input id="foto_ktp" name="ktp" accept="image/*" type="file"  class="form-control-file" required>
                                        
                                       @error('nik')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                       
                                    </div>
                                    
                                      @error('error')
                                           <div id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                                {{ $message }}
                                            </div>
                                       @enderror
                                    <button type="submit" class="btn login-form__btn submit w-100">Daftar</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Sudah punya akun pengelola <a href="{{ route('login.pengelola') }}" class="text-primary">Login Pemilik</a></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset ('theme/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('theme/js/custom.min.js') }}"></script>
    <script src="{{ asset('theme/js/settings.js') }}"></script>
    <script src="{{ asset('theme/js/gleek.js') }}"></script>
    <script src="{{ asset('theme/js/styleSwitcher.js') }}"></script>
</body>
</html>





