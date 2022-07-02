@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Products</h2>
  <p>Category Table</p>    
  
  @if(session("status"))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Logo</th>
        <th>
              <a href="{{route('products.create')}}" class="btn btn-info" type="button ">+ Products</a>
        </th>

      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>

            <td class='editable' id="td_product_name_{{$d->id}}">{{$d->product_name}}</td>
            <td class='editable' id="td_product_price_{{$d->id}}">{{$d->product_price}}</td>
            <td class='editable' id="td_created_at_{{$d->id}}">{{$d->created_at}}</td>
            <td class='editable' id="td_updated_at_{{$d->id}}">{{$d->updated_at}}</td>
            <td><img src="{{ asset('/images/'.$d->logo)}}" height='30'>
            <div class="modal fade" id="modalChange_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" >
                        <div class="modal-header">
                          <button type="button" class="close" 
                            data-dismiss="modal" aria-hidden="true"></button>
                          <h4 class="modal-title">Edit the logo of {{$d->name}}</h4>
                        </div>
                        <div class="modal-body">
                        <form role = "form" method ='Post' action="{{route('products.changeLogo')}}" 
                         enctype='multipart/form-data'>
                          @csrf 
                          <div class="form-body">
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">

                                <input type='hidden' id='id' name='id' value='{{$d->id}}'/>
                            </div>
                           
                          </div>
                          <div class="form-actions">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{url('products')}}" class="btn btn-default">Cancel</a>
                          </div>

                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <a href='#modalChange_{{$d->id}}' data-toggle='modal' class='btn btn-xs btn-default'>change </a>
          
          </td>
            <td >{{$d->category_id}}</td>
            <td>
              <a href="{{url ('products/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>
              @can('delete-permission')
              <form  method="POST" action="{{url('products/'.$d->id)}}">
                @csrf;
                @method("DELETE")
                <input type="submit" value="Delete" class="btn btn-danger"
                onclick="if(!confirm('Are you sure you want to delete {{$d->name}} ?')) return false;" />
              </form>
              @endcan
           
            </td>
            
 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection


@section('initialscript')
<script>
  $('.editable').editable({
    closeOnEnter:true,
    callback:function(data){
      var $s_id = data.$el[0].id
      var $fname = $s_id.split('_')[1]
      var $id = $s_id.split('_')[2]
      $.ajax({
        type:'POST',
        url:'{{route("products.saveDataField")}}',
        data{'_token':'<?php echo csrf_token()?>',
          'id': $id,
          'fname': $fname,
          'value': data.content
        },
        success: function(data){
          alert(data.msg)
        }
      });
      
    }
  });
</script>
@endsection