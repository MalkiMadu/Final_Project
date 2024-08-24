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
            .p{
  color: white;
  font-size: 24;
  text-align: center;
}
.img {
  width: 60px;
  height: 50px;
  padding: 3px 2px;
}
.a{
 width: 1000px;
}
.butt{
    margin-top: 500px;
    padding: 2px 600px;
   }
   button{
    width:300px
  background-color: rgb(219, 108, 33);
  text-align:center;
  border-radius: 30px;
  font-size: 24px;
  font-weight: 300;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
button:hover{
      
  cursor: pointer;
  transform: scale(1.1);
}
   
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

    <body>
    <div>
        <nav>
        <table>
          <tr>
            <td></td>
            <td class="a"><img src="canteen1.jpg" alt="Logo" class="img"></td>
            <td><a href="home.php"><b>Home</b></a></td>
            <td><a href="food.php"><b>Food</b></a></td>
            <td><a href="about.php"><b>About</b></a></td>
            <td><a href="contact.php"><b>Contact</b></a></td>
            <td><a href="singup.php"><b>Singup</b></a></td>
            <td><a href="adminlog.php"><b>Admin</b></a></td>
            <?php
            $select_row = mysqli_query($con,"SELECT * FROM cart ") or die('query failed');
            $row_count = mysqli_num_rows($select_row);
            ?>
            <td><a href="cart.php"><b>Cart</b><span><?php echo $row_count; ?></span></a></td>
          </tr>
</table>
</nav>
</div>

<table>
  <tr><td>
<h4>The process consists of a customer choosing an item, and finally choosing for pick-up or delivery. Payment is then administered by paying with a credit card or debit card through the app or website or in cash at the canteen when going to pickup.</h4>
</td></td>
</table>

</div>
<div class="container">
  <div class="wrapper">
    
    <img src="burger.jpg">
    <img src="food1.jpg">
    <img src="food.avif">
    <img src="food3.webp">

  </div> 
</div >

<div class="butt">
<a href="singup.php"><button><i>Order Now</i></button></a>
</div>
<p>You can have order your Breackfast,Lunch and Other Snacks.Click <u>Order Now.</u></p>
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