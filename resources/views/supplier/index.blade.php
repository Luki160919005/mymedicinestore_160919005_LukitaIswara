@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Supplier</h2>
  <p>Category Table</p>    
  
  @if(session("status"))
    <div class="note note-success">
      {{session('status')}}
    </div>
  @endif
  <div class="note note-success" id='pesan' style="display:none">

    </div>

  @if(session("error"))
    <div class="note note-danger">
      {{session('error')}}
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Logo</th>
        <th>
              <a href="{{route('suppliers.create')}}" class="btn btn-info" type="button ">+ Supplier</a>
        </th>

        <a href="#modalcreate" data-toggle="modal" class='btn btn-info'>
          +Supplier with Modal
        </a>

      </tr>
    </thead>
        <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Add New Supplier</h4>
                </div>
                <div class="modal-body">
  		          <form role = "form" method ='Post' action="{{url('suppliers')}}" >
                  @csrf 
                  <div class="form-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea type="text" class="form-control" id="address" name="address">
                        </textarea>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{url('suppliers')}}" class="btn btn-default">Cancel</a>
                  </div>

                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="modelContent">
                  <div style = "text-align:center">
                    <img src="{{asset('assets/img/loading.gif')}}">
                  </div>
                
              </div>
            </div>
          </div>




    <tbody>
        @foreach($data as $d)
        <tr id='tr_{{$d->id}}'>
            <td  class='editable'>{{$d->id}}</td>
            <td class='editable' id="td_name_{{$d->id}}">{{$d->name}}</td>
            <td class='editable' id="td_address_{{$d->id}}">{{$d->address}}</td>
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
                        <form role = "form" method ='Post' action="{{route('suppliers.changeLogo')}}" 
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
                            <a href="{{url('suppliers')}}" class="btn btn-default">Cancel</a>
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
            <td>
              <a href="{{url ('suppliers/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>

              <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs"
              onclick="getEditForm({{$d->id}})">+ Edit A</a>
              <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs"
              onclick="getEditForm2({{$d->id}})">+ Edit B</a>
           
            </td>
            <td>
              @can('delete-permission')
              <form  method="POST" action="{{url('suppliers/'.$d->id)}}">
                  @csrf;
                  @method("DELETE")
                  <input type="submit" value="Delete" class="btn btn-danger"
                  onclick=
                  "if(!confirm('Are you sure you want to delete {{$d->name}} ?')) 
                  {
                    return false;
                  }else{
                    if(!confirm('Are You really sure?')) 
                    {
                      return false;
                    }
                  }" />
                </form>
                @endcan
                
                <a class="btn btn-xs btn-danger"
                onclick="if('Are you really sure?')
                { deleteDataRemoveTR({{$d->id}})
                }">
                delete 2</a>

            </td>
            
 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection


@section('javascript')
<script>
function getEditForm(id){
  $.ajax({
    type:'POST',
    url:'{{route("supplier.getEditForm")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id},
    success: function(data){
      $('#modalContent').html(data.msg)
    }

  });

}

function getEditForm2(id){
  $.ajax({
    type:'POST',
    url:'{{route("supplier.getEditForm2")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id},
    success: function(data){
      $('#modalContent').html(data.msg)
    }

  });

}

function saveDataUpdateTD(id){
var eName = $('#eName').val();
var eAddress = $('#eAddress').val();


  $.ajax({
    type:'POST',
    url:'{{route("supplier.saveData")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id,
          'name':eName,
          'address':eAddress},
    success: function(data){
      if(data.status == "ok"){
       
        $("#td_name_"+id).html(eName);
        $("#td_address_"+id).html(eAddress);
        $("#pesan").show();
        $("#pesan").html(data.msg)
      }
    }

  });

}

function deleteDataRemoveTR(id){

  $.ajax({
    type:'POST',
    url:'{{route("supplier.deleteData")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
        },
    success: function(data){
      if(data.status == "ok"){
        alert(data.msg)
        $("#tr_"+id).remove();
       
      }
      else{
        alert(data.msg)
      }
    }

  });

}

</script>
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
        url:'{{route("supplier.saveDataField")}}',
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