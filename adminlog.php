<?php
session_start();
include('db.php');
$admin_username = 'admin';
$admin_password = 'Shaff1'; 

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $admin_username && password_verify($password, $admin_password)) {
        $_SESSION['is_admin'] = true;
        echo "<script type='text/javascript'> alert('Invalid username or password')</script>";
        exit();
    } else {
      header("Location: admin.php");
    
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="login.css" rel="stylesheet">
    <style>
    .p{
  color: white;
  font-size: 24;
  text-align: center;
            }
            .form{
                padding: 2rem;
        width: 500px;
        height: 350px;
        margin: auto;
        background: rgb(211, 190, 190);
        border-radius: 3px; 
    }
            </style>

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
            <td><a href="cart.php"><b>Cart</b><span class="span">0</span></a></td>
          </tr>
</table>
</nav>
</div>

<br><br><br>
    <h1>Admin Login</h1>
    <form method="post" action="" class="form">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <br><br><br>
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