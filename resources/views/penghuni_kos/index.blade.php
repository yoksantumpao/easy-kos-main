@extends('partials.layout')

@section('content')
      <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Form Tambah Data</h5>
                      <button type="button" onclick="closeModal()" class="close" data-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Penghuni Kos</h4>
                                <div class="basic-form">
                                    
                                    <form data-action="{{ route('penghuni_kos.store') }}" data-id="" data-type="post" method="POST" id="modal-tambah-data">
                                        @csrf
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Penghuni Kos</label>
                                            <div class="col-sm-10">
                                                <input id="nama_penghuni" type="text" name="nama_penghuni" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-nama_penghuni-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email Penghuni Kos</label>
                                            <div class="col-sm-10">
                                                <input id="email_penghuni" type="text" name="email_penghuni" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-email_penghuni-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password Penghuni Kos</label>
                                            <div class="col-sm-10">
                                                <input id="password" type="password" name="password" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-password-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">

                                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" >
                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                    <div style="display: none" id="val-jenis_kelamin-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor Telephone</label>
                                            <div class="col-sm-10">
                                                <input id="no_telp" type="number" name="no_telp" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-no_telp-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                                            <div class="col-sm-10">
                                                <input id="no_wa" type="number" name="no_wa" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-no_wa-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <input id="pekerjaan" type="text" name="pekerjaan" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-pekerjaan-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input id="nik" type="number" name="nik" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-nik-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">    
                                            <label class="col-sm-2 col-form-label">Foto KTP</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <input onchange="loadFile(event, 'ktp')" id="foto_ktp" name="ktp" accept="image/*" type="file"  class="form-control-file">
                                                    
                                                <img id="showFotoKTP" src="" alt="" style="
                                                    width: 100%;
                                                    height: 300px;
                                                    object-fit: contain;
                                                    object-position: bottom;

                                                ">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">    
                                            <label class="col-sm-2 col-form-label">Foto Profile</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <input onchange="loadFile(event,'profile')" id="foto_profile" name="foto_profile" accept="image/*" type="file"  class="form-control-file">
                                                    
                                                <img id="showFotoProfile" src="" alt="" style="
                                                    width: 100%;
                                                    height: 300px;
                                                    object-fit: contain;
                                                    object-position: bottom;

                                                ">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                    <div class="modal-footer">
                        <button type="button" onclick="closeModal()" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button id="button-simpan" type="submit" class="btn btn-success button" onclick="this.classList.toggle('button--loading')">
                            <span class="button__text">Simpan</span>
                        </button>
                    </div>    
                  </form>
              </div>
          </div>
      </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;justify-items: center;justify-content: space-between;align-items: center;">
                          <h4 class="card-title">Data Penghuni Kos</h4>
                          @if (!Auth::user()->tipe == 'admin')
                          <button class="btn btn-success font-weight-bold" style="color:white" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                            TAMBAH DATA <i class="fa fa-plus-circle" aria-hidden="true"></i>
                          </button>
                              
                          @endif
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        @if (!Auth::user()->tipe == 'admin')
                                        <th>Opsi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_penghuni }}</td>
                                        <td>{{ $item->email_penghuni }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->pekerjaan }}</td>
                                        @if (!Auth::user()->tipe == 'admin')
                                        <td>
                                          
                                            <button type="button" id="btnEdit" 
                                                onclick="edit('{{ $item->id }}')"
                                                  
                                             style="color: white" class="btn btn-warning">
                                              <i class="fa fa-pencil"></i>

                                            </button>
                                            <button class="btn btn-danger deleteRecord" data-id="{{ $item->id }}" type="submit">
                                              <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                  @endforeach
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        @if (!Auth::user()->tipe == 'admin')
                                        <th>Opsi</th>
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('addScript')
    {{-- POST DATA --}}
    <script >
        // $('#modal').modal({backdrop: 'static', keyboard: false})
        $(document).ready(function(){
        // $('#modal').modal('hide')
        // const form = document.getElementById('modal-tambah-data');
        var form = '#modal-tambah-data';

            $(form).on('submit', function(event){
                event.preventDefault();
                // spinner.style.display = 'block';
                
                var url = $(this).attr('data-action');
                let type = $(this).attr('data-type');
                let id = $(this).attr('data-id');
                let form = new FormData(this)
                console.log('GETATTRIBUTE', $(this).attr('data-id'), ...form);

                if (type == 'post') {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: form,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(response)
                        {
                            console.log('RESPONSE ', response.message);
                            $(form).trigger("reset");
                            $('#modal').modal('hide');
                            // alert(response.success)
                            toastr.success(`${response.message}`, "Success", {
                                timeOut: 3e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1,
                            });
                            setTimeout(() => {
                                
                                location.reload()
                            }, 3000);
                        },
                        error: function(response) {
                            $('#button-simpan').removeClass('button--loading')
                            console.log('RESPONSE ERROR', response.responseJSON);
                            const errorMessage = response.responseJSON;
                            if(errorMessage.error){
                                for (const erMsg in errorMessage.errors) {
                                    console.log('OBJ', errorMessage.errors[erMsg][0])
                                    const element = document.getElementById(`val-${erMsg}-error`);
                                    element.style.display = "block";
                                    element.innerText = `${errorMessage.errors[erMsg][0]}`
                                    element.classList.add("mystyle");
                                    
                                }
                            }
                        }
                    });
                }else{
                    // console.log('GETATTRIBUTE', $(this).attr('data-id'););
                    // form.setAttribute('data-type', 'edit');
                    // var token = $("meta[name='csrf-token']").attr("content");
                    form.set("_method", "PUT");
                    // form.set("_token", token)
                    // $(this).attr('method', 'PUT')
                    $.ajax({
                        url: `/penghuni_kos/${id}`,
                        method: 'POST',
                        data: form,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(response)
                        {
                            console.log('RESPONSE ', response.message);
                            $(form).trigger("reset");
                            $('#modal').modal('hide');
                            // alert(response.success)
                            toastr.success(`${response.message}`, "Success", {
                                timeOut: 3e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1,
                            });
                            setTimeout(() => {
                                
                                location.reload()
                            }, 3000);
                        },
                        error: function(response) {
                            $('#button-simpan').removeClass('button--loading')
                            console.log('RESPONSE ERROR', response.responseJSON);
                            const errorMessage = response.responseJSON;
                            if(errorMessage.error){
                                for (const erMsg in errorMessage.errors) {
                                    console.log('OBJ', errorMessage.errors[erMsg][0])
                                    const element = document.getElementById(`val-${erMsg}-error`);
                                    element.style.display = "block";
                                    element.innerText = `${errorMessage.errors[erMsg][0]}`
                                    element.classList.add("mystyle");
                                    
                                }
                            }
                        }
                    });
                }
                
                
            });
        });
    </script>
    {{-- EDIT DATA --}}
    <script>
        const form = document.getElementById('modal-tambah-data');
        const btnEdit = document.getElementById('btnEdit');
        var outputKTP = document.getElementById('showFotoKTP');
        var outputProfile = document.getElementById('showFotoProfile');
        // fungsi update foto
        function loadFile(event, tipe) {
            if(tipe === 'ktp'){
                console.log('EVENT', event.target, tipe);
                outputKTP.src = URL.createObjectURL(event.target.files[0]);
                outputKTP.onload = function() {
                    URL.revokeObjectURL(outputKTP.src) // free memory
                }
            }
            if(tipe === 'profile'){
                console.log('EVENT', event.target, tipe);
                outputProfile.src = URL.createObjectURL(event.target.files[0]);
                outputProfile.onload = function() {
                    URL.revokeObjectURL(outputProfile.src) // free memory
                }
            }
        };
        

        function closeModal(){
            form.setAttribute('data-type', 'post');
            $('#nama_penghuni').val('');
            $('#email_penghuni').val('');
            $('#jenis_kelamin').val('');
            $('#password').val('');
            $('#no_telp').val('');
            $('#no_wa').val('');
            $('#pekerjaan').val('');
            $('#nik').val('');
            $('#ktp').val('');
            $('#foto_profile').val('');
            outputKTP.src = '';
            outputProfile.src = '';
            console.log('FORMCLOSE', form.getAttribute('data-type'));
        }
        
        function edit(id){
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/penghuni_kos/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#nama_penghuni').val(data.nama_penghuni);
                $('#email_penghuni').val(data.email_penghuni);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#password').val(data.password);
                $('#no_telp').val(data.no_telp);
                $('#no_wa').val(data.no_wa);
                $('#pekerjaan').val(data.pekerjaan);
                $('#nik').val(data.nik);
                $('#ktp').val(data.ktp);
                $('#foto_profile').val('');
                outputKTP.src = `{{ asset('fotoPenghuniKos')}}/${data.ktp}`
                outputProfile.src = `{{ asset('fotoPenghuniKos')}}/${data.foto_profile}`

                form.setAttribute('data-id', data.id);

            })
        }


    </script>
    {{-- HAPUS DATA --}}
    <script>
        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
        
            $.ajax(
            {
                url: "penghuni_kos/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (response){
                    console.log("it Works");
                        toastr.success(`${response.message}`, "Success", {
                            timeOut: 2e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        setTimeout(() => {
                            location.reload()
                        }, 3000);
                }
            });
        
        });
    </script>

@endpush