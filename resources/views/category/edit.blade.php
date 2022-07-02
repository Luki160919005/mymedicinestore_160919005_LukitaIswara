@extends('layout.conquer')

@section('content')
<div class="container">
    <h2>Form Edit Categories</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Edit Data Categories
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                <a href="" class="reload"></a>
                <a href="" class="remove"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" method="POST" action="{{url('category/'.$data->id)}}">
                @csrf;
                @method("PUT")
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Categories</label>
                        <input name="name" type="text" class="form-control" 
                        id="exampleInputEmail1" placeholder="Enter text"
                        value="{{$data->name}}">
                        <span class="help-block">
                        Fill in categories Name </span>
                    </div>
            
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5">{{$data->description}}</textarea>
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