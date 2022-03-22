@extends('layout.conquer')

@section('content')

<div class="container">
  <h2>List of Medicine</h2>
  <div class="row">
  @foreach($data as $d)
        <div class="col-md-3" 
        style="text-align:center; border:1px solid #888 ; margin:5px; 
        padding:5px;border-radius:15px"
        >
            <img src="{{ asset('images/'.$d->image) }}" 
            height="100px" /><br>
            <b>{{$d->generic_name}}</b><br>
            {{$d->form}}
        </div>
    @endforeach
    </div>
</div>
<tbody>
    @foreach($data as $d)
      <tr>
        <td>{{$d->generic_name}}</td>
        <td>{{$d->description}}</td>
      </tr>
      <tr>
        <td colspan='2'>
            <div class="row">
            @foreach($d->medicines as $m)
                <div class="col-md-3" 
                style="text-align:center; border:1px solid #888 ; margin:5px; 
                padding:5px;border-radius:15px"
                >
                    <img src="{{ asset('images/'.$m->image) }}" 
                    height="100px" /><br>
                    <b>{{$m->generic_name}}</b><br>
                    {{$m->form}}
                </div>
            @endforeach
            </div>
        </td>
      </tr>
    @endforeach
    
    </tbody>


@endsection