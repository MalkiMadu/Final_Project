<?php
session_start();

include('db.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
  
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];
  $pemail=md5($email);
  
  
    $query = "INSERT INTO contact (firstName,lastName,email,mobile,message) VALUES('$firstName','$lastName','$pemail','$mobile','$message')";

    mysqli_query($con,$query);
if($query){
    echo "<script type='text/javascript'> alert('Sent to message')</script>";
  }
    else 
    {
      echo "<script type='text/javascript'> alert('Can not sent to message')</script>";
    }
     }


?>


<html>
    <head>
        <link href="contact.css" rel="stylesheet">
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
            .a{
 width: 1000px;
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

<div class="container" style="background-image: url('contactimage.jpg');">

  <form method="POST" action="">
    <h1>Contact Us</h1>
    <input type="text" name="firstName" required placeholder="First Name" id="firstName">
    <input type="text" name="lastName" required placeholder="Last Name" id="lastName">
    <input type="email" name="email" required placeholder="Email" id="email">
    <input type="text" name="mobile" required placeholder="Mobile" id="mobile">
    <h4>Type your message here</h4>
    <textarea required name="message"></textarea>
    <input type="submit" value="Send" id="button">
</form>
</div>
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