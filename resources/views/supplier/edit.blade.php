@extends('layout.conquer')

@section('content')
<div class="container">
    <h2>Form Edit SUpplier</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Edit Data Supplier
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                <a href="" class="reload"></a>
                <a href="" class="remove"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" method="POST" action="{{url('suppliers/'.$data->id)}}">
                @csrf;
                @method("PUT")
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier</label>
                        <input name="name" type="text" class="form-control" 
                        id="exampleInputEmail1" placeholder="Enter text"
                        value="{{$data->name}}">
                        <span class="help-block">
                        Isikan Nama supplier </span>
                    </div>
            
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="5">{{$data->address}}</textarea>
                    </div>
             
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection