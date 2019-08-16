<div class="btn-group" role="group">
    <a class="btn table-btn btn-view" title="view" href="/reports/{{ $report->id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/reports/{{ $report->id }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/reports/{{ $report->id }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="report-delete" data-id="{{$report->id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>