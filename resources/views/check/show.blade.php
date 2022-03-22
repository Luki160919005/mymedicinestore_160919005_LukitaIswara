<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Detail of Medicine</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)

      <tr>
        <td>Name</td>
        <td>{{$d->generic_name}}</td>
     </tr>
     <tr>
        <td>Form</td>
        <td>{{$d->form}}</td>
    </tr>
     <tr>
        <td>Formula</td>
        <td>{{$d->restriction_formula}}</td>
    </tr>
    
     <tr>
        <td>Category</td>
        
     <tr>
        <td>Description</td>
        <td>{{$d->description}}</td>
        </tr>
     <tr>
         <td>Photo</td>
        <td>
            <img src="{{ asset('images/'.$d->image) }}" 
            height="100px" />
        </td>
    </tr>
     <tr>
        <td>price</td>
        <td>{{$d->price}}</td> 
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>


</body>
</html>