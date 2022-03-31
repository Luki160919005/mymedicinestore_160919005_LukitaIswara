

<div class="modal-header">
    <h4 class="modal-title">Details of Medicines</h4>
</div>
<div class="modal-body">
     

 
         
  <table class="table">
    <thead>
      <tr>
        <th>Field</th>
        <th>Value</th>

      </tr>
    </thead>
    <tbody>
  
            <tr>
                <td>Name</td>
                <td>{{$data->generic_name}}</td>
            </tr>
            <tr>
                <td>Form</td>
                <td>{{$data->form}}</td>
            </tr>
            <tr>
                <td>Formula</td>
                <td>{{$data->restriction_formula}}</td>
            </tr>
          
            <tr>
                <td>Description</td>
                <td>{{$data->description}}</td>
            </tr>
           
            <tr>
                <td>Photo</td>
                <td>
                    <img src="{{ asset('images/'.$data->image) }}" 
                    height="100px" />

                </td>
            </tr>
            <tr>
                <td>price</td>
                <td>{{$data->price}}</td> 
            </tr>
 
    </tbody>
  </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

