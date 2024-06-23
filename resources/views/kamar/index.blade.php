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
                                <h4 class="card-title">Data Kamar</h4>
                                <div class="basic-form">
                                    
                                    <form data-action="{{ route('kamar.store') }}" data-id="" data-type="post" method="POST" id="modal-tambah-data">
                                        @csrf
                                         
                                        
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kamar</label>
                                            <div class="col-sm-10">
                                                <input id="nama_kamar" type="text" name="nama_kamar" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-nama_kamar-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status Kamar</label>
                                                <div class="col-sm-10">

                                                    <select id="status_kamar" name="status_kamar" class="form-control" onchange="handleOnChangeStatus()" >
                                                        <option value="" selected disabled>Pilih Status Kamar</option>
                                                        <option value="tersedia">Tersedia</option>
                                                        <option value="tidak tersedia">Tidak Tersedia</option>
                                                    </select>
                                                    <div style="display: none" id="val-status_kamar-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                                </div>
                                        </div>
                                        <div class="form-group row" id='input-penghuni' style="display: none" >
                                            <label class="col-sm-2 col-form-label">Penghuni</label>
                                            <div class="col-sm-10">

                                                <select id="id_penghuni" onchange="handlePemilik()" name="id_penghuni" class="form-control" >
                                                    <option value="" selected  disabled>Pilih Penghuni</option>
                                                    @foreach ($ph as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_penghuni }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_penghuni-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipe Kamar</label>
                                            <div class="col-sm-10">

                                                <select id="id_tipe_kamar" onchange="handlePemilik()" name="id_tipe_kamar" class="form-control" >
                                                    <option value="" selected  disabled>Pilih Tipe Kamar</option>
                                                    @foreach ($tk as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_tipe }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_tipe_kamar-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kos</label>
                                            <div class="col-sm-10">

                                                <select id="id_rumah_kos" onchange="handlePemilik()" name="id_rumah_kos" class="form-control" >
                                                    <option value="" selected  disabled>Pilih Rumah Kos</option>
                                                    @foreach ($rk as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_kos }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_rumah_kos-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
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
                          <h4 class="card-title">Data Kamar</h4>
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
                                        <th>Rumah Kos</th>
                                        <th>Tipe Kamar</th>
                                        <th>Nama Kamar</th>
                                        <th>Status Kamar</th>
                                        <th>Penghuni</th>
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
                                        <td>{{ $item->nama_tipe }}</td>
                                        <td>{{ $item->nama_kamar }}</td>
                                        <td>{{ $item->status_kamar }}</td>
                                        <td>{{ $item->nama_penghuni }}</td>
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
                                        <th>Rumah Kos</th>
                                        <th>Tipe Kamar</th>
                                        <th>Nama Kamar</th>
                                        <th>Status Kamar</th>
                                        <th>Penghuni</th>
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

    <script>
        function handleOnChangeStatus() {
            let status = document.getElementById('status_kamar').value;
            console.log('STATUS', status);
            if(status === 'tidak tersedia'){
                document.getElementById('input-penghuni').style.display = 'flex';
            }else{
                document.getElementById('input-penghuni').style.display = 'none';
            }

        }

    </script>

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
                        url: `/kamar/${id}`,
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
            $('#nama_kamar').val('');
            $('#status_kamar').val('');
            $('#id_tipe_kamar').val('');
            $('#id_rumah_kos').val('');
            output.src = '';
            console.log('FORMCLOSE', form.getAttribute('data-type'));
        }
        
        function edit(id){
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/kamar/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#modal').modal('show');
                $('#nama_kamar').val(data.nama_kamar);
                $('#status_kamar').val(data.status_kamar);
                $('#id_tipe_kamar').val(data.id_tipe_kamar);
                $('#id_rumah_kos').val(data.id_rumah_kos);


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
                url: "kamar/"+id,
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