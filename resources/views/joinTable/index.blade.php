@extends('layout.conquer')

@section('content')

<div class="container">
  <h2>List Medicines Join Categories</h2>
  <p>Medicines Join Categories Table</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Restriction Formula</th>
        <th>Category Name</th>

      </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr>
            <td>{{$li->generic_name}}</td>
            <td>{{$li->restriction_formula}}</td>
            <td>{{$li->category_name}}</td>

        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

@endsection