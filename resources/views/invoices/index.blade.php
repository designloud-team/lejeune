@extends('admin_template')

@push('styles')

<link href="{{ asset('css/DT_bootstrap.css') }}" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" />
<style>
    .table-btn {
        padding: 6px 5px;
        font-size: 12px;
        color: #ccc;
    }
table.dataTable thead .sorting:after , table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after{
      content: none  !important;
    }
    .table-btn button {
        border: 0;
        background-color: transparent;
        padding: 0;
    }
    table.dataTable thead .sorting:after , table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after{
      content: none  !important;
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
                      action="{{ URL::to('items/importExcel') }}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">

                    <input type="file" name="import_file"/>
                    {{ csrf_field() }}
                    <br/>

                    <button class="btn btn-primary">Import CSV or Excel File</button>

                </form>

                <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
                    <a href="{{ url('items/downloadExcel/xls') }}">
                        <button class="btn btn-success btn-lg">Download Excel xls</button>
                    </a>
                    <a href="{{ url('items/downloadExcel/xlsx') }}">
                        <button class="btn btn-success btn-lg">Download Excel xlsx</button>
                    </a>
                    <a href="{{ url('items/downloadExcel/csv') }}">
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
                    <a href="/items/create" class="btn btn-danger">Add Line Item</a>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
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
            <div role="tabpanel" class="tab-pane active" id="all">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="col-md-2 row" style="margin-bottom: 15px;">
                            <label for="" class="control-label">View</label>
                            <select name="display" id="display" class="form-control">
                                <option value="" disabled>Select records to display</option>
                                @if(Auth::user()->can('view-others-line-items'))
                                    <option value="all" selected>View all</option>
                                    <option value="mine">view mine</option>
                                @else
                                    <option value="mine" selected>view mine</option>
                                @endif
                            </select>
                        </div>
                    <div class="responsive-tables">
                        <table class="table table-bordered display responsive tbl-items" width="100%">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Quantity</th>
                                <th>Taxable</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    </div><!-- /.box-body -->
                </div><!--/.box -->
            </div>
        </div>

        

@endsection

@include('items.partials.scripts')