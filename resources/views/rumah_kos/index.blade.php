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
                                <h4 class="card-title">Data Rumah Kos</h4>
                                <div class="basic-form">
                                    
                                    <form data-action="{{ route('rumah_kos.store') }}" data-id="" data-type="post" method="POST" id="modal-tambah-data">
                                        @csrf
                                         
                                        {{-- <input type="hidden" name="id_pengelola" value="1"> --}}
                                        <input type="hidden" name="id_fs_ks" value="1">
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Rumah Kos</label>
                                            <div class="col-sm-10">
                                                <input id="nama_kos" type="text" name="nama_kos" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-nama_kos-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jenis Kos</label>
                                                <div class="col-sm-10">

                                                    <select id="jenis_kos" name="jenis_kos" class="form-control" >
                                                        <option value="" selected disabled>Pilih Jenis Kos</option>
                                                        <option value="pria">Pria</option>
                                                        <option value="wanita">Wanita</option>
                                                        <option value="campur">Campur</option>
                                                    </select>
                                                    <div style="display: none" id="val-jenis_kos-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                                            <div class="col-sm-10">
                                                <input id="jlh_kamar" type="text" name="jlh_kamar" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-jlh_kamar-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Gedung</label>
                                            <div class="col-sm-10">
                                                <input id="jlh_gedung" type="text" name="jlh_gedung" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-jlh_gedung-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-10">
                                                <input id="no_telp" type="text" name="no_telp" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-no_telp-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Provinsi</label>
                                            <div class="col-sm-10">
                                                <input id="provinsi" type="text" name="provinsi" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-provinsi-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kabupaten Kota</label>
                                            <div class="col-sm-10">
                                                <input id="kab_kota" type="text" name="kab_kota" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-kab_kota-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-10">
                                                <input id="kec" type="text" name="kec" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-kec-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Pos</label>
                                            <div class="col-sm-10">
                                                <input id="kode_pos" type="text" name="kode_pos" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-kode_pos-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                            <div class="col-sm-10">
                                                <textarea id="alamat"  name="alamat" class="form-control" placeholder="Deskripsi Tipe Kamar..."></textarea>
                                                <div style="display: none" id="val-alamat-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea id="deskripsi"  name="deskripsi" class="form-control" placeholder="Deskripsi Tipe Kamar..."></textarea>
                                                <div style="display: none" id="val-deskripsi-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
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
                          <h4 class="card-title">Data Rumah Kos</h4>
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
                                        <th>Nama Kos</th>
                                        <th>Jenis Kos</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Jumlah Gedung</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Deskripsi</th>
                                        @if (!Auth::user()->tipe == 'admin')
                                        <th>Opsi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kos }}</td>
                                        <td>{{ $item->jenis_kos }}</td>
                                        <td>{{ $item->jlh_kamar }}</td>
                                        <td>{{ $item->jlh_gedung }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>
                                            Provinsi : {{ $item->provinsi }} <br>
                                            Kab/Kota : {{ $item->kab_kota }} <br>
                                            Kecamatan : {{ $item->kec }} <br>
                                            Kode Pos : {{ $item->kode_pos }} <br>
                                            Alamat : {{ $item->alamat }}

                                        <td>{{ $item->deskripsi }}</td>
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
                                        <th>Nama Kos</th>
                                        <th>Jenis Kos</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Jumlah Gedung</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Deskripsi</th>
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
                        url: `/rumah_kos/${id}`,
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
        var output = document.getElementById('showFoto');
        // fungsi update foto
        function loadFile(event) {
            console.log('EVENT', event.target);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        function closeModal(){
            form.setAttribute('data-type', 'post');
            $('#nama_kos').val('');
            $('#jenis_kos').val('');
            $('#jlh_kamar').val('');
            $('#jlh_gedung').val('');
            $('#no_telp').val('');
            $('#provinsi').val('');
            $('#kab_kota').val('');
            $('#kec').val('');
            $('#alamat').val('');
            $('#kode_pos').val('');
            $('#deskripsi').val('');
            output.src = '';
            console.log('FORMCLOSE', form.getAttribute('data-type'));
        }
        
        function edit(id){
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/rumah_kos/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#modal').modal('show');
                $('#nama_kos').val(data.nama_kos);
                $('#jenis_kos').val(data.jenis_kos);
                $('#jlh_kamar').val(data.jlh_kamar);
                $('#jlh_gedung').val(data.jlh_gedung);
                $('#no_telp').val(data.no_telp);
                $('#provinsi').val(data.provinsi);
                $('#kab_kota').val(data.kab_kota);
                $('#kec').val(data.kec);
                $('#alamat').val(data.alamat);
                $('#kode_pos').val(data.kode_pos);
                $('#deskripsi').val(data.deskripsi);

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
                url: "rumah_kos/"+id,
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