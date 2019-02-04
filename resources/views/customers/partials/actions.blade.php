<div class="btn-group" role="group">
    <a class="btn table-btn" title="view" href="/customers/{{ $customer->id }}"><i class="text-info fa fa-search"></i></a>
    <a class="btn table-btn" title="edit" href="/customers/{{ $customer->id  }}/edit"><i class="text-info fa fa-pencil"></i>
    </a><form action="/customers/{{ $customer->id  }}" method="POST" class="table-btn btn">
        {{ csrf_field() }}{{ method_field('DELETE') }}
        <button  class="customer-delete" data-id="{{$customer->id}}"><i class="text-danger fa fa-trash"></i></button></form>
</div>