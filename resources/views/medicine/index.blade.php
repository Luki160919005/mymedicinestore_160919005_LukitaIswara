@extends('layout.conquer')

@section('content')
<h3 class="page-title">
        List Medicines 
        <small>List of Medicines in ApotikZ!</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Medicine</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
        <div class="page-toolbar">
      
            <!-- tempat action button -->
        </div>
    </div>
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
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr>
            <td>{{$li->generic_name}}</td>
            <td>{{$li->form}}</td>
            <td>{{$li->restriction_formula}}</td>
      
            
            <td>
              <a href="#detail_{{$li->id}}" data-toggle="modal">
              <img src="{{ asset('images/'.$li->image) }}" 
              height="100px" /></a>

              <div class="modal fade" id="detail_{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">{{$li->generic_name}} {{$li->form}}</h4>
                      </div>
                      <div class="modal-body">
                              <img src="{{ asset('images/'.$li->image) }}" height='200px' />
                              <br>{{$li->restriction_formula}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
              </div>

              <td>{{$li->price}}</td>
              <td>
                <a class='btn btn-info' href="{{route('medicines.show',$li->id)}}"
                  data-target="#show{{$li->id}}" data-toggle='modal'>detail</a>        
                <div class="modal fade" id="show{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <img src="{{ asset('assets/img/ajax-modal-loading.gif')}}" alt="" class="loading">
                    <!-- put animated gif here -->
                  </div>
                  </div>
                </div>
              </td>

       

            </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

<div class="container">
  <h2>List of Medicine2</h2>
  <div class="row">
    @foreach($listdata as $d)
    <div class="col-md-3"style="text-align:center; border:1px solid #888 ; margin:5px;padding:5px;border-radius:15px">
      <img src="{{ asset('images/'.$d->image) }}"height="100px" />
      <br>
      <b>{{$d->generic_name}}</b>
      <br>
      {{$d->form}}
    </div>
    @endforeach
  </div>
</div>


@endsection