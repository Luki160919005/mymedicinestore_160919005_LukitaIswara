@extends('layout.star')

@section('content')
<div class="container">
    <h2>List of Categories</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Add Categories
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                <a href="" class="reload"></a>
                <a href="" class="remove"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" method="POST" action="{{url('category')}}">
                @csrf;
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Categories</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter text">
                        <span class="help-block">
                        Categories Name </span>
                    </div>
            
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
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