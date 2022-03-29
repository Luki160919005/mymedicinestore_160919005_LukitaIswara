@extends('layout.conquer')

@section('content')

<div class="container">
  <h2>Detail of Medicine</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)

      <tr>
        <td>Name</td>
        <td>{{$d->generic_name}}</td>
     </tr>
     <tr>
        <td>Form</td>
        <td>{{$d->form}}</td>
    </tr>
     <tr>
        <td>Formula</td>
        <td>{{$d->restriction_formula}}</td>
    </tr>
    
        
     <tr>
        <td>Description</td>
        <td>{{$d->description}}</td>
        </tr>
     <tr>
         <td>Photo</td>
        <td>
            <img src="{{ asset('images/'.$d->image) }}" 
            height="100px" />
        </td>
    </tr>
     <tr>
        <td>price</td>
        <td>{{$d->price}}</td> 
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>

@endsection