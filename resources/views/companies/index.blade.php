@extends('layouts.master')
@extends('layouts.menu')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="au-card recent-report">
                            <h3 class="title-5 m-b-35">{{ __('Companies') }}</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-right">
                                    <a class="au-btn au-btn-icon au-btn--green au-btn--small"
                                       href="{{route('companies.create')}}">
                                        <i class="zmdi zmdi-plus"></i>{{ __('Add Item') }}</a>
                                </div>
                            </div>

                            @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="table-responsive table-responsive-data2">
                                    <table id="list" class="table table-data2 dataTable compact display" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('js/datatables.bootstrap.js') !!}"></script>
    <script src="{!! asset('js/handlebars.js') !!}"></script>
    <script type="text/javascript" language="javascript" src="{!! asset('js/dataTables.buttons.min.js') !!}"></script>
    <script type="text/javascript" language="javascript" src="{!! asset('js/buttons.html5.min.js') !!}"></script>
    <script type="text/javascript" language="javascript" src="{!! asset('js/jszip.min.js') !!}"></script>
    <script type="text/javascript" language="javascript" src="{!! asset('js/pdfmake.min.js') !!}"></script>
    <script type="text/javascript" language="javascript" src="{!! asset('js/vfs_fonts.js') !!}"></script>
    <script>
       $('#list').DataTable({
           dom: 'Blfrtip',
           autoWidth: true,
           fixedColumns: true,
           processing: true,
           serverSide: true,
           pageLength: 10,
           lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
           ajax: '{{ route('companies.list') }}',
           columns: [
               { data: 'name', name:'name'},
               { data: 'email', name:'email'},
               { data: 'actions', name: 'actions', orderable: false, searchable: false }
           ],
            buttons:[
           ],
           initComplete: function () {
               this.api().columns().every(function () {
                   var column = this;
                   var input = document.createElement("input");
                   $(input).appendTo($(column.footer()).empty())
                       .on('change', function () {
                           var val = $.fn.dataTable.util.escapeRegex($(this).val());

                           column.search(val ? val : '', true, false).draw();
                       });
               });
           }
       });
     </script>
@endsection