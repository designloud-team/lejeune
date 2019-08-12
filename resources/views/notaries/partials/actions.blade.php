<div class="btn-group" role="group">
    <a class="btn table-btn btn-view" title="view" href="/notaries/{{ $notary->id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/notaries/{{ $notary->id }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/notaries/{{ $notary->id }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="notary-delete" data-id="{{$notary->id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>