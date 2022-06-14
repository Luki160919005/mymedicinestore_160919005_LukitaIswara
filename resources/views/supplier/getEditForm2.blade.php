<form role = "form" method ='Post' action="{{url('suppliers/'.$data->id)}}" >
        <div class="modal-header">
            <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add New Supplier</h4>
        </div>
        <div class="modal-body">       
        @csrf 
        @method('PUT')
        <div class="form-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="eName" name="name"
            value ="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea type="text" class="form-control" id="eAddress" name="address">
            {{$data->address}}
            </textarea>
        </div>

        </div>
        <div class="modal-footer">
        <button type="button"
        onclick="saveDataUpdateTD({{$data->id}})"
        data-dismiss='modal'
        class="btn btn-info">Submit</button>

        <button type="button"
        class="btn btn-default"
        data-dismiss='modal'
        >Cancel</button>
        
        </div>

</form>