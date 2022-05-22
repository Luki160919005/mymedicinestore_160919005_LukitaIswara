@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Supplier</h2>
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
        <th>
              <a href="{{route('suppliers.create')}}" class="btn btn-info" type="button ">+ Supplier</a>
        </th>

      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>

            <td>{{$d->name}}</td>
            <td>{{$d->address}}</td>
            <td>
              <a href="{{url ('suppliers/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>

              <form  method="POST" action="{{url('suppliers/'.$d->id)}}">
                @csrf;
                @method("DELETE")
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="if(!confirm('Are you sure you want to delete {{$d->name}} ?')) return false;" />
              </form>
           
            </td>
            
 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection

