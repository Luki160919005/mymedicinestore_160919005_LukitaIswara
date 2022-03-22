@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List Medicines</h2>
  <p>Medicines Table</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr>
            <td>{{$li->generic_name}}</td>
            <td>{{$li->form}}</td>
            <td>{{$li->restriction_formula}}</td>
            <td>{{$li->price}}</td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>


@endsection