<div class="btn-group" role="group">
    <a class="btn table-btn" title="view" href="/items/{{ $item->hash_id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/items/{{ $item->hash_id }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/items/{{ $item->hash_id }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="item-delete" data-id="{{$item->hash_id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>