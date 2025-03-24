@extends('layouts.app2')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
            <div class="dashcode-calender">
                <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0 mb-6">
                Hasil Audit
                </h4>
                <div class="grid grid-cols-12 gap-2">
                    <div class="lg:col-span-3 col-span-12 card p-6">
                        <div class="block py-4 text-slate-800 dark:text-slate-400 font-semibold text-xs uppercase mt-4">
                        FILTER
                        <input type="hidden" id="id_lokasi_tmp" value="01">
                        </div>
                        <ul class="space-y-2">
                          
                            @foreach($lokasi as $lok_id => $lok_name)
                            <li>
                                
                                <div class="secondary-radio">
                                  <label class="flex items-center cursor-pointer  ">
                                    <input type="radio" class="hidden lokasi_ck" {{($lok_id == "01") ? "checked" : ""}} name="area_lokasi[]" value="{{$lok_id}}" data-nama="{{$lok_name}}">
                                    <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                  duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                    <span class="text-slate-900 font-Inter font-normal text-sm leading-6 capitalize dark:text-slate-300">  {{$lok_name}}</span>
                                  </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="lg:col-span-9 col-span-12 card p-6">
                    <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title" id="nama_area_inv">Office Semarang
                      </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                          <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                              <thead class=" border-t border-slate-100 dark:border-slate-800">
                                <tr>
                                  <th scope="col" class=" table-th ">
                                    No. Asset
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Nama
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    User
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Lokasi Asal
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Lokasi Audit
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Jumlah
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Jumlah Audit
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Kondisi Awal
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Kondisi Audit
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Tahun Audit
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Keterangan Master
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Keterangan Audit
                                  </th>                                 
                                  
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                @foreach($master as $mas_idx => $mas)
                                <tr>
                                  <td class="table-td">{{$mas->no_assets_update}}</td>
                                  <td class="table-td ">{{$mas->nama_inventaris}}</td>
                                  <td class="table-td ">{{$mas->user_pengguna}}</td>
                                  <td class="table-td ">{{$mas->lokasi_asal}}</td>
                                  <td class="table-td ">{{$mas->lokasi_audit}}</td>
                                  <td class="table-td ">{{$mas->jumlah_barang}}</td>
                                  <td class="table-td ">{{$mas->jml_audit}}</td>
                                  <td class="table-td ">{{$mas->kondisi_sekarang}}</td>
                                  <td class="table-td ">{{$mas->kondisi_audit}}</td>
                                  <td class="table-td ">{{$mas->tahun_audit}}</td>
                                  <td class="table-td ">{{$mas->keterangan}}</td>
                                  <td class="table-td ">{{$mas->tambahan_informasi}}</td>
                                                      
                                  
                                  
                                </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden">
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<script>
    // data table validation
  var tablemain = $("#data-table").DataTable({
    dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
    paging: true,
    ordering: true,
    info: false,
    searching: true,
    lengthChange: true,
    lengthMenu: [10, 25, 50, 100],
    language: {
      lengthMenu: "Show _MENU_ entries",
      paginate: {
        previous: "<iconify-icon icon=\"ic:round-keyboard-arrow-left\"></iconify-icon>",
        next: "<iconify-icon icon=\"ic:round-keyboard-arrow-right\"></iconify-icon>"
      },
      search: "Search:"
    }
  });

  let tagToDups = $('#td-action-0').clone();  

  $('.lokasi_ck').on('click', function(){
    console.log($(this).val());

    let id_lokasi = $(this).val();

    $('#id_lokasi_tmp').val(id_lokasi);

    $('#nama_area_inv').text($(this).data('nama'));

    let base_url_edit = "{{route('audit_form', ['id_inv' => ':id_inv']) }}";

    if($(this).is(':checked')){
        
        $("#data-table").DataTable().destroy();

        $('#data-table tbody').empty();

        refresh_table_inv(id_lokasi);
    }
    else{
        $("#data-table").DataTable().destroy();

        $('#data-table tbody').empty();
    }
    
  });

  function refresh_table_inv(id_lokasi){

      $.ajaxSetup({ // Laravel CSRF Token Setup
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      let base_url_edit = "{{route('audit_form', ['id_inv' => ':id_inv']) }}";

      $.ajax({
          url: '{{route("api/audit_with_lokasi")}}', // Replace with your API endpoint
          type: 'POST',
          data: { // Data to send in the POST request
              id_lokasi: id_lokasi
          },
          success: function(data) {
              // 3. Add new data to the table
              if (data && data.length > 0) { // Check if data exists and is not empty
                  $.each(data, function(index, item) {
                      let newRow = $('<tr></tr>');
                      if(item.no_assets == null){
                          item.no_assets = "-";
                      }
                      if(item.no_assets_update == null){
                          item.no_assets_update = "-";
                      }
                      newRow.append($('<td class="table-td">'+item.no_assets_update+'</td>'));
                      newRow.append($('<td class="table-td">'+item.nama_inventaris+'</td>'));
                      newRow.append($('<td class="table-td">'+item.user_pengguna+'</td>'));
                      
                      newRow.append($('<td class="table-td">'+item.lokasi_asal+'</td>'));
                      newRow.append($('<td class="table-td">'+item.lokasi_audit+'</td>'));
                      newRow.append($('<td class="table-td">'+item.jumlah_barang+'</td>'));
                      newRow.append($('<td class="table-td">'+item.jml_audit+'</td>'));
                      newRow.append($('<td class="table-td">'+item.kondisi_sekarang+'</td>'));
                      newRow.append($('<td class="table-td">'+item.kondisi_audit+'</td>'));
                      newRow.append($('<td class="table-td">'+item.tahun_audit+'</td>'));
                      newRow.append($('<td class="table-td">'+item.keterangan+'</td>'));
                      newRow.append($('<td class="table-td">'+item.tambahan_informasi+'</td>'));

                      $('#data-table tbody').append(newRow);
                  });
              } else {
                // Handle cases where no data is returned
                console.log("No data returned from the API.");
                // Optionally display a message to the user
                // alert("No data available.");
              }

              $("#data-table").DataTable({
                  dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                  paging: true,
                  ordering: true,
                  info: false,
                  searching: true,
                  lengthChange: true,
                  lengthMenu: [10, 25, 50, 100],
                  language: {
                  lengthMenu: "Show _MENU_ entries",
                  paginate: {
                      previous: "<iconify-icon icon=\"ic:round-keyboard-arrow-left\"></iconify-icon>",
                      next: "<iconify-icon icon=\"ic:round-keyboard-arrow-right\"></iconify-icon>"
                  },
                  search: "Search:"
                  }
              });                
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error("AJAX Error:", textStatus, errorThrown);
              // Handle the error appropriately, e.g., display an error message to the user.
              alert("Error loading data. Please try again.");
          }
      });
  }

  $('#konfirm_quick').on('click', function(){
    let quick_id_inv = $('#quick_id_inv').val();
    console.log("Quick update ID inventory "+quick_id_inv);
  });

  $(document).ready(function() { // Ensure DOM is ready
      $(document).on('click', '#edit_inv_button', function(){
        
          let inv_no = $(this).data('inv_no');
          $('#title_modal_edit').text(inv_no);
      });

      $(document).on('click', '#quick_inv_button', function(){
        let inv_id = $(this).data('inv_id');
        let inv_no = $(this).data('inv_no');

        $('#title_modal_quick_no_asset').text(inv_no);        
        $('#quick_id_inv').val(inv_id);
    });

    $(document).on('click', '#konfirm_quick', function(){
        let id_inv = $('#quick_id_inv').val();

        let id_lokasi = $('#id_lokasi_tmp').val();

        console.log(id_lokasi);

        $.ajaxSetup({ // Laravel CSRF Token Setup
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            url: '{{route("quick_audit")}}', // Replace with your API endpoint
            type: 'POST',
            data: { // Data to send in the POST request
              id_inventory: id_inv
            },
            success: function(data) {
                // 3. Add new data to the table
                $("#data-table").DataTable().destroy();

                $('#data-table tbody').empty();

                refresh_table_inv(id_lokasi);     
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
                // Handle the error appropriately, e.g., display an error message to the user.
                alert("Error loading data. Please try again.");
            }
        });
    });

  });
  
</script>

@endsection

@section('css')
<style>
  #data-table td{
    font-size: 12px;
  }

  
</style>
@endsection

@section('modal')
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="blackModal_edit" tabindex="-1" aria-labelledby="blackModalLabel" >
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                  rounded-md outline-none text-current">
      <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
          <h3 class="text-base font-medium text-white dark:text-white capitalize">
            Audit No. <span id="title_modal_edit"></span>
            <input type="hidden" name="quick_id_inv" id="quick_id_inv"> 
          </h3>
          <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                              dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
            <svg class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                      11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-4">
          <h6 class="text-base text-slate-900 dark:text-white leading-6">
            Audit Instan inventory NO <span id="title_modal_quick_no_asset"></span>
          </h6>
          <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
            Oat cake ice cream candy chocolate cake apple pie. Brownie carrot cake candy canes. Cake sweet roll cake cheesecake cookie chocolate cake liquorice.
          </p>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
          <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500">Accept</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="blackModal_quick" tabindex="-1" aria-labelledby="blackModalLabel" >
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                  rounded-md outline-none text-current">
      <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
          <h3 class="text-base font-medium text-white dark:text-white capitalize">
           Quick Audit <span id="title_modal_quick"></span>
           <input type="hidden" name="quick_id_inv" id="quick_id_inv"> 
          </h3>
          <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                              dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
            <svg class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                      11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-4">
          <h6 class="text-base text-slate-900 dark:text-white leading-6">
            Audit Instan inventory NO <span id="title_modal_quick_no_asset"></span>
          </h6>
          <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
            Note: Tidak ada perubahan data, semua data sama seperti sebelum audit.
          </p>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
          <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" id="konfirm_quick">Konfirmasi</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection