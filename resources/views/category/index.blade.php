@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List Categories</h2>
  <p>Category Table</p>            
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr>
            <td>{{$li->	id}}</td>
            <td>{{$li->name}}</td>
            <td>{{$li->description}}</td>
            <td>{{$li->created_at}}</td>
            <td>{{$li->updated_at}}</td>
            <td>
              <ul>
                @foreach($li->medicines as $lim)
                  <li>{{$lim->generic_name}}</li>
                @endforeach
              </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection

