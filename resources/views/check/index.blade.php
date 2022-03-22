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



</body>
</html>