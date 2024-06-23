
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LOGIN PENGELOLA - EASY KOS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset ('theme/css/style.css') }}" rel="stylesheet">
    
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
                                <a class="text-center" href="index.html"> <h4 style="color: #1853fe">EASY KOS - Pengelola</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="{{ route('login-pengelola.post') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Email Pengelola">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Kata sandi">
                                    </div>
                                    <div class="form-group row">
                                                {{-- <label class="col-sm-2 col-form-label">Jenis Kelamin</label> --}}
                                                <div class="col-sm-12">

                                                    <select id="tipe" name="tipe" class="form-control" >
                                                        <option value="" selected disabled>Pilih Tipe</option>
                                                        <option value="Pengelola">Pengelola</option>
                                                        <option value="Admin">Super Admin</option>
                                                    </select>
                                                    <div style="display: none" id="val-tipe-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                                </div>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Login pengguna? <a href="{{ route('login.index') }}" class="text-primary">Klik disini</a></p>
                                <p class="mt-5 login-form__footer">Belum punya akun pengelola? Silahkan daftar <a href="{{ route('register.pengelola') }}" class="text-primary">disini</a></p>
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
    <script src="{{ asset('theme/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('theme/js/custom.min.js') }}"></script>
    <script src="{{ asset('theme/js/settings.js') }}"></script>
    <script src="{{ asset('theme/js/gleek.js') }}"></script>
    <script src="{{ asset('theme/js/styleSwitcher.js') }}"></script>
</body>
</html>





