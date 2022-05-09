@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Transaction</h2>
  <p>Transaction Table</p>    
  
  @if(session("status"))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <table class ='table table-bordered'>
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
   
    <tr>
    @foreach($medicines as $m)
        <td>
            {{$m->generic_name}}
        </td>
        <td>
            Rp{{$m->pivot->price}}
        </td>
        <td>
            {{$m->pivot->quantity}}
        </td>
        <td>
            {{$m->pivot->quantity * $m->pivot->price}}
        </td>

    <br>
    @endforeach

<table>
</div>
@endsection