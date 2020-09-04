<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Davidson resturent</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<style>
  .order-details{
    font-size:18px;
    border: 1px solid black;
    padding: 10px;
    margin: 10px;
    font-family: 'Open Sans', sans-serif;
  }
  span{
    font-size:20px;
    font-family: 'Open Sans', sans-serif;
  }
  .navbar{
border-radius:0px;
}
h1{
  font-family: 'Lobster', cursive;
  padding: 0px 25px 0px 25px;
  font-size: 40px;
}
h2,.menu-1{
  padding: 20px;
}

label{
  font-size: 20px;
}
body{
  background-color: rgb(190, 235, 243);
}
</style>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Davids Restaurant</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Other branches</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Davids Restaurant</h1>
    <h2>Order your favorite dish from our menu</h2>
   <div class="menu-1">
     <label>Choose Your Favorite Dish :- </label>&nbsp;
    <select id="menu" onchange="showorder()"> 
      <!-- <option>Food Item</option> -->
    </select>
   </div>

   <div class="order-details"id="order" style="display:none">
     <h3>
       Details of your Favorite Dish :
     </h3>
     <div class="details">
      Short Name : <span id="shortname"></span><br><br>
      Name : <span id="name"></span><br><br>
      Description: <span id="Description"></span><br><br>
      Price for small: <span id="price_s"></span><br><br>
      Price for large: <span id="price_l"></span><br><br>
      Name of small portion: <span id="name_s"></span><br><br>
      Name of large portion: <span id="name_l"></span><br>
     </div>
   </div>
  </div>
  &nbsp;&nbsp;&nbsp; 
   <script>
    let base_url = "http://localhost/WTassignment4/request.php";
    $("document").ready(function(){
        dishnamelist();
        showorder();
        // showorder("Vegetable Egg Roll (1)");

    });
    var q = document.getElementById('order');
    var a = document.getElementById('menu');
    function dishnamelist(){
        let url = base_url + "?req=dishname";
        $.get(url,function(data,success){
            // console.log("done");
            console.log(data[13]);
            // console.log(data);
            for(var i = 0;i < data.length ;i++){
                a.innerHTML = a.innerHTML + "<option value= ' "+i+ " '>"+data[i].name+"</option>";
            }
        });
        
    }
      function showorder(){
			var z=a.options[a.selectedIndex];
			console.log(z);
			var name=z.text;	
			console.log(name);
            let url1 = base_url + "?req=dishinfo&name="+name;
            $.get(url1,function(info,success){
                console.log(info);
                document.getElementById('shortname').innerHTML= info.short_name ;
      document.getElementById('name').innerHTML= info.name ;
      document.getElementById('Description').innerHTML= info.description;
      document.getElementById('price_s').innerHTML= info.price_small ;
      document.getElementById('price_l').innerHTML= info.price_large ;
      document.getElementById('name_s').innerHTML= info.small_portion_name ;
      document.getElementById('name_l').innerHTML= info.large_portion_name ;
				q.style.display="block";

				});

			}
    </script>
</body>
</html>