@extends('partials.layout')

@section('content')
     
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;justify-items: center;justify-content: space-between;align-items: center;">
                          <h4 class="card-title">Data Riwayat Pembayaran Kos</h4>
                          
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
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Jlh Bln</th>
                                        <th>Kamar</th>
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
                                        <td>{{ $item->no_hp ? $item->no_hp.',<br>' : '' }}
                                            wa {{ $item->no_wa }}</td>
                                        <td>{{ $item->status_pembayaran }}</td>
                                        <td>Rp.{{ number_format($item->total_pembayaran, 0)  }}</td>
                                        <td>{{ $item->jlh_bln }}</td>
                                        <td>
                                            {{ $item->nama_kamar }},    
                                            {{ $item->nama_kos }}    
                                        </td>
                                       
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
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Jlh Bln</th>
                                        <th>Kamar</th>
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
