@extends('admin_template')
@push('styles')

@endpush

@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-default">
                    <div class="box-body">
                        <ul class="dash">
                            <li><a class="chan" href="/jobs/create"><b>Add a NEW Job</b></a><br>
                                This option allows you to add a new Job to your online Database.<br><br>
                            </li>
{{--                            <li><a class="chan" href="/jobs/create"><b>Add NEW LOCAL Job</b></a><br>--}}
{{--                                This option allows you to enter jobs and invoicing information for your local notaries.<br><br>--}}
{{--                            </li>--}}
                            <li><a class="chan" href="/jobs"><b>View/Edit/Delete/Search an Existing Job (No Completion Report Filed Yet)</b></a><br>
                                This option allows you to edit the details regarding an existing Job in your online Database, including the ability to change notaries if necessary. It IS NOT to be used to confirm or edit Completion Reports! Use the option below if you have already received a Completion Report on this job.<br><br>
                            </li><li><a class="chan" href="/reports"><b>View Status of All Jobs/Completion Report(s)</b></a><br>
                                This option allows you to view all current jobs and read Completion Reports submitted by your Notaries.<br><br>
                            </li><li><a class="chan" href="/cgi-bin/admin.cgi?auth=admin.674&amp;action=archive_job"><b>Archive Completed Jobs</b></a><br>
                                This option will find all jobs that are completed and fully paid and move them to an archive file that can be used to generate reports.<br><br>
                            </li><li><a class="chan" href="/cgi-bin/admin.cgi?auth=admin.674&amp;action=generate_report"><b>Generate Report from Archives</b></a><br>
                                This option will find all jobs that are archived and will return results for tax purposes, etc.<br><br>
                            </li>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!--/.box -->
            </div>
        </div>
    </div>

@endsection
@push('scripts')
@include('customers.partials.scripts')
    @endpush