<?php
include('db.php');
?>

<html>
    <head>
        <link href="about.css" rel="stylesheet">
        <style>
            td a span{
              padding: .2rem .5rem;
              border-radius: .3rem;
              background-color: white;
              color: chocolate;
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

<section class="about">
  <div class="main">
    <img src="canteen2.webp">
    <div class="text">
    <h1>About Us</h1>
    <p><tab>Welcome to the Provincial Council Office's web-based canteen management system! Our platform is designed to revolutionize the dining experience for employees and visitors alike. Here, you'll find everything you need to know about our canteen operations, from menus and meal schedules to payment options and nutritional information.<br>
    Benefit: - The canteen management system streamlines operations, ensuring efficient service and a seamless dining experience. It enhances employee satisfaction and productivity while promoting healthy eating habits.
  <br>Penalty:  - Without an effective management system, canteen operations may suffer from inefficiencies, leading to long wait times, food shortages, and dissatisfaction among patrons.
<br>Cost: - Costs associated with developing and maintaining the web-based system, including software development, hardware, and staff training, are reasonable investments considering the long-term benefits.
<br>Risk:- Risks include technical challenges during implementation, user adoption issues, and the need for ongoing updates and maintenance to ensure optimal performance and security.</p>
    <a href="contact.php"><button type="button">Let's Talk</button></a>

  </div>
</div>
</section>
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