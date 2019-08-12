@extends('admin_template')
@push('styles')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{{ asset('/css/DT_bootstrap.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" />
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <style>
        .table-btn {
            padding: 6px 5px;
            font-size: 12px;
            color: #ccc;
        }

        .table-btn button {
            border: 0;
            background-color: transparent;
            padding: 0;
        }


        div.top .dataTables_filter label {
            float: right!important;
        }

    </style>
@endpush

@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop

@section('content')
    <div class="toggle-body" style="display:none;">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Import CSV</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;"
                      action="{{ URL::to('notaries/importExcel') }}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">

                    <input type="file" name="import_file"/>
                    {{ csrf_field() }}
                    <br/>

                    <button class="btn btn-primary">Import CSV or Excel File</button>

                </form>

                <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
                    <a href="{{ url('notaries/downloadExcel/xls') }}">
                        <button class="btn btn-success btn-lg">Download Excel xls</button>
                    </a>
                    <a href="{{ url('notaries/downloadExcel/xlsx') }}">
                        <button class="btn btn-success btn-lg">Download Excel xlsx</button>
                    </a>
                    <a href="{{ url('notaries/downloadExcel/csv') }}">
                        <button class="btn btn-success btn-lg">Download CSV</button>
                    </a>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right">
                <div class="btn-group">
                    <a href="/notaries/create" class="btn btn-danger">Add Notary</a>
                    <button type="button" class="btn btn-danger dropdown-toggle caret-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" class="toggle-trigger">Import from CSV</a></li>
                    </ul>
                </div>
                <br><br>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active">
            <div class="box box-default">
                <div class="box-body">
                    <div class="col-md-2 margin-bottom-5">
                        <div class="row">
                            <div class="col-xs-10">
                                <select name="actions" id="actions" class="form-control">
                                    <option selected disabled>Actions</option>
                                    <option value="delete">Delete all</option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="pull-left btn btn-primary" id="btn-apply">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="responsive-tables">
                        <table class="table table-bordered display responsive tbl-notaries" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Notary</th>
                                <th>State</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!--/.box -->
        </div>
    </div>
@endsection
@include('notaries.partials.scripts')