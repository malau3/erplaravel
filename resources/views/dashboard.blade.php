@extends('layouts.app2')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Statistics Audit
                    </h4>
                    <div class="flex sm:space-x-4 space-x-2 sm:justify-end items-center rtl:space-x-reverse">
                      
                      <button class="btn leading-0 inline-flex justify-center bg-white text-slate-700 dark:bg-slate-800 dark:text-slate-300 !font-normal"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light" icon="heroicons-outline:filter"></iconify-icon>
                        <span>Select Regional</span>
                        </span>
                      </button>
                      <ul class=" dropdown-menu min-w-max absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow
                                    z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                            <li>
                                <button class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white" id="jateng-filter">
                                Jawa Tengah</button>
                            </li>
                            <li>
                                <button class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white" id="jabar-filter">
                                Jawa Barat</button>
                            </li>
                            
                        </ul>
                    </div>
                </header>
                <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table" id="statistics">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class=" table-th ">
                                    Lokasi
                                    </th>                    
                                    <th scope="col" class=" table-th ">
                                    Audit Done
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Mutasi Masuk
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Mutasi Luar
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Asset Done
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Asset Belum
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Non-Asset Belum
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                
                            </tbody>
                            <tfoot class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class=" table-th ">
                                    Lokasi
                                    </th>                    
                                    <th scope="col" class=" table-th ">
                                    Audit Done
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Mutasi Masuk
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Mutasi Luar
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Asset Done
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Asset Belum
                                    </th>                                    
                                    <th scope="col" class=" table-th ">
                                    Non-Asset Belum
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<script>
    var tablemain = $("#statistics").DataTable({
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

    $('#jateng-filter').on('click', function(){
        let var_regional = "jateng";
        refresh_audit_regional(var_regional);
    });

    $('#jabar-filter').on('click', function(){
        let var_regional = "jabar";
        refresh_audit_regional(var_regional);
    });

    // function for ajax call and next action
    function refresh_audit_regional(var_regional){

        $.ajaxSetup({ // Laravel CSRF Token Setup
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        
    }

    // function for add each elements to table body and create datatable
    function refresh_table_inv(results){
        
        $.each(results, function(index, item) {
            let newRow = $('<tr></tr>');
            
            newRow.append($('<td class="table-td">'+index+'</td>'));
            newRow.append($('<td class="table-td">'+td_normal(item.ASSET_DONE)+'</td>'));
            newRow.append($('<td class="table-td">'+td_normal(item.ASSET_MUTASI_COME)+'</td>'));
            newRow.append($('<td class="table-td">'+td_normal(item.ASSET_MUTASI_GO)+'</td>'));
            newRow.append($('<td class="table-td">'+td_normal(item.INVENTARIS_DONE)+'</td>'));

            newRow.append($('<td class="table-td">'+td_warning(item.ASSET_NOT_DONE)+'</td>'));            
            newRow.append($('<td class="table-td">'+td_warning(item.NOT_ASSET_NOT_DONE)+'</td>'));
            
            $('#statistics tbody').append(newRow);
        });    

        $("#statistics").DataTable({
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
    }

    // function for custom td 
    function td_normal(items){
        return '<div class="px-3 text-center mx-auto rounded-[999px]  bg-opacity-25 text-success-500 bg-success-500">'+
        '<span class="text-sm text-slate-600 dark:text-slate-300 capitalize">'+items+'</span>'+
        '</div>';
    }

    // function for custom td 
    function td_warning(items){
        return '<div class="px-3 text-center mx-auto rounded-[999px]  bg-opacity-25 text-warning-500 bg-warning-500">'+
        '<span class="text-sm text-slate-600 dark:text-slate-300 capitalize">'+items+'</span>'+
        '</div>';
    }
</script>


@endsection

@section('css')

@endsection