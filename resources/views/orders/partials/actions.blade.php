<div class="btn-group" role="group">
    <a class="btn table-btn btn-view" title="view" href="/orders/{{ $order->id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/orders/{{ $order->id }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/orders/{{ $order->id }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="order-delete" data-id="{{$order->id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>