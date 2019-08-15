<div class="btn-group" role="group">
    <a class="btn table-btn btn-view" title="view" href="/jobs/{{ $job->id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/jobs/{{ $job->id }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/jobs/{{ $job->id }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="job-delete" data-id="{{$job->id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>