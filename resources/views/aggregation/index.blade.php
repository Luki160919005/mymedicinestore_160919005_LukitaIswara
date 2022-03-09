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
  <h2>no 1</h2>
  <p>Display of the number of categories that have data on medicines</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Number of Categories</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo1 as $li)
        <tr>
            <td>{{$li->	FilteredActs}}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

<div class="container">
  <h2>no 2</h2>
  <p>Show the name of the category that does not have any medicines data</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Categories</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo2 as $li)
        <tr>
            <td>{{$li->	catname}}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

<div class="container">
  <h2>no 3</h2>
  <p>Show the average price of each drug category. If there is no medicine then give 0</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Categories Name</th>
        <th>Average Price</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo3 as $li)
        <tr>
            <td>{{$li->categoryName}}</td>
            <td>{{$li->averagePrice }}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div> 

<div class="container">
  <h2>no 4</h2>
  <p>Show drug categories that have only 1 medicine product</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Number of Medicine</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo4 as $li)
        <tr>
            <td>{{$li->	categoryName}}</td>
            <td>{{$li->	numberOFMedicines}}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

<div class="container">
  <h2>no 5</h2>
  <p>Show drugs that have one form</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Form</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo5 as $li)
        <tr>
            <td>{{$li->	generic_name}}</td>
            <td>{{$li->	form}}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

<div class="container">
  <h2>no 6</h2>
  <p>Display the category and name of the drug that has the highest price</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Max Price</th>
    
      </tr>
    </thead>
    <tbody>
        @foreach($listdataNo6 as $li)
        <tr>
            <td>{{$li->	categoryName}}</td>
            <td>{{$li->	maxPrice}}</td>
 
        </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

</body>
</html>