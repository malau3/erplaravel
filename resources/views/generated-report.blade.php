@extends('layouts.app2')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Report Request
                    </h4>
                    <div class="flex sm:space-x-4 space-x-2 sm:justify-end items-center rtl:space-x-reverse">
                        <button class="btn leading-0 inline-flex justify-center bg-white text-slate-700 dark:bg-slate-800 dark:text-slate-300 !font-normal">
                            <span class="flex items-center">
                            <a href="{{route('action_request_report')}}" class="toolTip onTop rounded-md bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xl py-3 px-4" data-tippy-content="heroicons:document-arrow-down">
                                <iconify-icon icon="heroicons:document-arrow-down"></iconify-icon> <span>Request Generate</span>
                            </a>
                            
                            </span>
                        </button>
                    </div>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full ">
                            <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="table-report">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class=" table-th ">
                                        User
                                        </th>                    
                                                                        
                                        <th scope="col" class=" table-th ">
                                        Waktu Request
                                        </th>                                    
                                        <th scope="col" class=" table-th ">
                                        Waktu Generated
                                        </th>  
                                        <th scope="col" class=" table-th ">
                                        Report
                                        </th>                                    
                                        
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @foreach($datas as $data )
                                    <tr>
                                        <td >{{$data->name}}</td>
                                        
                                        <td >{{$data->requested_at}}</td>
                                        <td >{{$data->generated_at}}</td>
                                        <td >{{$data->report}}</td>
                                        
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
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<script>
    // data table validation
  var tablemain = $("#table-report").DataTable({
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

</script>
@endsection