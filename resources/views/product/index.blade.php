@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Products</h2>
  <p>Category Table</p>    
  
  @if(session("status"))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>
              <a href="{{route('products.create')}}" class="btn btn-info" type="button ">+ Products</a>
        </th>

      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>

            <td>{{$d->product_name}}</td>
            <td>{{$d->product_price}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
            <td>{{$d->category_id}}</td>
            <td>
              <a href="{{url ('products/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>
              @can('delete-permission')
              <form  method="POST" action="{{url('products/'.$d->id)}}">
                @csrf;
                @method("DELETE")
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="if(!confirm('Are you sure you want to delete {{$d->name}} ?')) return false;" />
              </form>
              @endcan
           
            </td>
            
 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection

