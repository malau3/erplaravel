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
                        <div class="card-title text-slate-900 dark:text-white">Form Tambah Inventaris</div>
                    </div>
                    </header>
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    <div class="card-text h-full">
                    <form class="space-y-4" id="auditform" action="{{route('new_inventaris')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="id_inventory" name="id_inventory" type="hidden" >

                        <div class="input-area">
                            <label for="name" class="form-label">Nama Barang</label>
                            <div class="relative">
                                <input id="name" type="text" name="nama_inventaris" class="form-control pr-9" placeholder="Nama Barang" required>
                            </div>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">No. Assets</label>
                            <div class="relative">
                                <input id="no_asset" type="text" name="no_assets" class="form-control pr-9" placeholder="No Assets, Jika Kosong, biarkan saja" >
                            </div>
                        </div>

                        <div class="input-area">
                            <label for="name" class="form-label">Audit 2024</label>
                            <select id="select" class="form-control" name="audit_yes" required>
                                <option value="no" class="dark:bg-slate-700" >NO</option>
                                <option value="yes" class="dark:bg-slate-700" >YES</option>                                
                          </select>
                        </div>
                        
                        <div class="input-area">
                          <label for="select" class="form-label">Lokasi Sekarang</label>
                          <select id="select" class="form-control" name="id_lokasi" required>
                            <option value="" class="dark:bg-slate-700" >Pilih Lokasi</option>
                            @foreach($lokasi as $lok)
                                <option value="{{$lok->id_lokasi}}" class="dark:bg-slate-700">{{$lok->nama_sites}}</option>
                            @endforeach
                            
                          </select>
                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">Harga</label>
                            <div class="relative">
                                <input id="kondisi" type="text" name="harga_single" class="form-control pr-9" placeholder="Ex. Rp 200.000"  >
                            </div>

                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">Harga Borongan</label>
                            <div class="relative">
                                <input id="kondisi" type="text" name="harga_group" class="form-control pr-9" placeholder="Jika harga termasuk dengan harga assets lain, isi harga di Borongan"  >
                            </div>

                        </div>
                        <div class="input-area">
                            <label for="name" class="form-label">Jumlah Barang</label>
                            <div class="relative">
                                <input id="jml_barang" type="text" name="jml_barang" class="form-control pr-9" placeholder="Jika harga termasuk dengan harga assets lain, isi harga di Borongan"  >
                            </div>

                        </div>
                        <div class="input-area">
                            <label for="tanggal-beli" class=" form-label">Tanggal Beli</label>
                            <input class="form-control py-2 flatpickr flatpickr-input active" id="tanggal-beli" name="tanggal_beli" value="" type="text"  >
                        </div>
                        
                        <div class="input-area">
                            <label for="name" class="form-label">Kondisi Sekarang</label>
                            <div class="relative">
                                <input id="kondisi" type="text" name="kondisi_sekarang" class="form-control pr-9" placeholder="kondisi Sekarang"  >
                            </div>

                        </div>
                        <div class="input-area">
                            <label for="keterangan" class="form-label">Tambahan Keterangan</label>
                            <div class="relative">
                                <textarea id="keterangan" type="text" name="keterangan" class="form-control pr-9" rows="5"  ></textarea>
                                
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

@section('javascript')
<script>
    $(".flatpickr").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d"
    });
  </script>
@endsection

@section('css')

@endsection