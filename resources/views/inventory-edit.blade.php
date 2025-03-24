@extends('layouts.app2')

@section('content')
<div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
            <div class="grid xl:grid-cols-12 grid-cols-1 gap-12">
                <div class="card">
                <div class="card-body flex flex-col p-12">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Form Edit Inventaris</div>
                    </div>
                    </header>
                    <div class="card-text h-full">
                    <form class="space-y-4" id="auditform" action="{{route('audit_action')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="id_inventory" name="id_inventory" type="hidden" value="{{$data->id}}">

                        <div class="input-area">
                            <label for="name" class="form-label">Nama Barang</label>
                            <div class="relative">
                                <input id="name" type="text" name="nama_inventaris" class="form-control pr-9" placeholder="Nama Barang" value="{{$data->nama_inventaris}}" readonly required>
                            </div>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">No. Assets</label>
                            <div class="relative">
                                @if($audit_before != NULL)
                                <input id="no_asset" type="text" name="no_assets" class="form-control pr-9" placeholder="Nama Barang" value="{{$audit_before->no_assets}}"  {{strlen($audit_before->no_assets) >= 2 ? "readonly" : ""}}>

                                @else 
                                <input id="no_asset" type="text" name="no_assets" class="form-control pr-9" placeholder="Nama Barang" value="{{$data->no_assets}}"  {{strlen($data->no_assets) >= 2 ? "readonly" : ""}}>

                                @endif
                            </div>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">User Pengguna</label>
                            <div class="relative">
                                @if($audit_before != NULL)
                                <input id="user_pengguna" type="text" name="user_pengguna" class="form-control pr-9" placeholder="Untuk elektronik berharga, tolong di isi nama dari pengguna. Jika office / Site kosongi saja" value="{{$audit_before->user_pengguna}}" >
                                @else 
                                <input id="user_pengguna" type="text" name="user_pengguna" class="form-control pr-9" placeholder="Untuk elektronik berharga, tolong di isi nama dari pengguna. Jika office / Site kosongi saja" value="" >
                                @endif
                            </div>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">Lokasi Sebelumnya</label>
                            <div class="relative">
                                @foreach($lokasi as $lok)
                                    @if($lok->id_lokasi == $data->id_lokasi)
                                        <input id="lokasi_before" type="hidden" name="lokasi_before"  placeholder="lokasi before" value="{{$lok->id_lokasi}}" readonly>
                                        <input id="nama_before" type="text" name="nama_before" class="form-control pr-9" placeholder="lokasi before" value="{{$lok->nama_sites}}" readonly>
                                    @else
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="input-area">
                          <label for="select" class="form-label">Lokasi Sekarang</label>
                          <select id="select" class="form-control" name="id_lokasi">
                            @foreach($lokasi as $lok)
                                @if($audit_before != NULL)
                                    @if($lok->id_lokasi == $audit_before->id_lokasi_audit)
                                    <option value="{{$lok->id_lokasi}}" class="dark:bg-slate-700" selected>{{$lok->nama_sites}}</option>
                                    @else
                                        <option value="{{$lok->id_lokasi}}" class="dark:bg-slate-700">{{$lok->nama_sites}}</option>
                                    @endif
                                @else 
                                    @if($lok->id_lokasi == $data->id_lokasi)
                                    <option value="{{$lok->id_lokasi}}" class="dark:bg-slate-700" selected>{{$lok->nama_sites}}</option>
                                    @else
                                        <option value="{{$lok->id_lokasi}}" class="dark:bg-slate-700">{{$lok->nama_sites}}</option>
                                    @endif
                                @endif
                                
                            @endforeach
                            
                          </select>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">Kondisi Sekarang</label>
                            <div class="relative">
                            @if($audit_before != NULL)
                                <input id="kondisi" type="text" name="kondisi_sekarang" class="form-control pr-9" placeholder="kondisi Sekarang" value="{{$audit_before->kondisi_audit}}">
                            @else
                                <input id="kondisi" type="text" name="kondisi_sekarang" class="form-control pr-9" placeholder="kondisi Sekarang" value="{{$data->kondisi_sekarang}}">
                            @endif
                            </div>

                        </div>
                        @if($data->no_assets == NULL OR $data->no_assets == "-")
                        <div class="input-area">
                            <label for="name" class="form-label">Jumlah Barang</label>
                            <div class="relative">
                            @if($audit_before != NULL)
                                <input id="jml_barang" type="text" name="jml_barang" class="form-control pr-9" placeholder="jml_barang" value="{{$audit_before->jumlah_barang}}">
                            @else
                                <input id="jml_barang" type="text" name="jml_barang" class="form-control pr-9" placeholder="jml_barang" value="{{$data->jumlah_barang}}">
                            @endif
                            </div>

                        </div>
                        @else 

                        @endif
                        
                        <div class="input-area">
                            <label for="keterangan" class="form-label">Tambahan Keterangan</label>
                            <div class="relative">
                            @if($audit_before != NULL)
                            <textarea id="keterangan"  name="keterangan" rows=5 class="form-control pr-9" placeholder="Tambahan keterangan">{!! $audit_before->keterangan !!}
                            </textarea>
                            @else 
                                <textarea id="keterangan" name="keterangan" rows=5 class="form-control pr-9" placeholder="Tambahan keterangan" >{!! $data->keterangan !!}
                                </textarea>
                            @endif
                            </div>

                        </div>
                        
                        

                        <button class="btn flex justify-center btn-dark ml-auto" type="submit">Submit</button>
                    </form>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

@section('css')

@endsection