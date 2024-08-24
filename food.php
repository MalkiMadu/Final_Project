<?php
  include('db.php');
?>

<html>
    <head>
    <link href="main.css" rel="stylesheet">
    <style>
            td a span{
              padding: .1rem .5rem;
              border-radius: .3rem;
              background-color: white;
              color: #a8690a;
              font-size: 1rem;
            }
            .table{
              text-align: center;
              margin-left: auto;
              margin-right: auto;
              }
              .p{
  color: white;
  font-size: 24;
  text-align: center;
            }
            
            .a{
 width: 1000px;
}
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
              
          
</head>
    <body class="b">

    <?php
        include('header.php')
    ?>
<table class="table"><tr>
<td>
<div class="row">

  <div class="column">
  <div class="center">
  <a href="productb.php"><img src="fb1.jpg" alt="Breakfast" ></a>
    <br><h3>Breackfast Item</h3>
</div>
  </div>
</td>
    <td>
  <div class="column">
  <div class="center">
  <a href="productl.php"><img src="fl2.jpg" alt="Lunch" style="height:200px" ></a>
    <br><h3>Lunch Item</h3>
</div>
  </div>
</td>
<td>
  <div class="column">
  <div class="center">
  <a href="products.php"><img src="fs.webp" alt="Snacks" ></a>
  <br><h3>Other Snacks</h3>
  </div>
</div>
</div>
</td>
</tr>
</table>

<h1 style="text-align:center" >Choose Your Food Item you can click food item picture.</h1>
<footer>
<div class="foot">
<p class="p">Social Media</p>
  <div class="icon">
  <a href="https://web.facebook.com/?_rdc=1&_rdr"><i class="fa-brands fa-facebook"></i></a>
  <a href="https://web.whatsapp.com"><i class="fa-brands fa-whatsapp"></i></a>
  <a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a>
  <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
  <a href="https://x.com/i/flow/login"><i class="fa-brands fa-twitter"></i></a>
  </div>
  <div class="footnav">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="food.php">Food</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="singup.php">SingUp</a></li>
    </ul>
</div>
<div class="footnav">
<ul>
      <li class="font"><i class="fa fa-envelope" aria-hidden="true"></i> Email : info@gmail.com</li>
      <li class="font" ><i class="fa fa-phone" aria-hidden="true"></i> Phone : +9471 1111 111</li>
      <li class="font"><i class="fa fa-map-marker" aria-hidden="true"></i> Address : Provincial Council Office ,<br>Ratnapura</li>
    </ul>
  </div>
</div>
</footer>

  </body>
</html>

