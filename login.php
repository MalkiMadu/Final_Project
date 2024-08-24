<?php
    session_start();

    include('db.php');

    
    if($_SERVER['REQUEST_METHOD']=="POST"){
      
      $userName = $_POST['name'];
    
      $password = $_POST['password'];
      
      if(!empty($userName) && !empty($password) && !is_numeric($userName))
      {
        
 
        $query = "select * from register where UserName='$userName' limit 1" ;
        $result= mysqli_query($con,$query);

        if($result){
          if($result && mysqli_num_rows($result)>0){
            $user_date= mysqli_fetch_assoc($result);

            if($user_date['Password']==$password){
            
             header("location:food.php");
             die;
            }
          }
          echo "<script type='text/javascript'> alert ('wrong password or login')</script>";
        
         
        }
      
        else 
        {
          echo "<script type='text/javascript'> alert('successfull login')</script>";
        }
      }
    }
     
      ?>
      
         
<html>
    <head>
    <link href="login.css" rel="stylesheet">
    <style>
            td a span{
              padding: .1rem .5rem;
              border-radius: .3rem;
              background-color: white;
              color: #a8690a;
              font-size: 1rem;
            }
            .a{
    width: 1000px;
  }
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
    <body style="background-image: url('fs.webp');">
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



<br><br><br><br>
<div class="login">
  <h1>Login</h1>
  <form action="" method="POST">
  
    <label>User Name</label>
    <input type="text" name="name" required placeholder="e.g.Robin">
    
    <label>Password</label>
    <input type="password" name="password" required placeholder=".....">
    
    <input type="submit" name="" required value="Submit" ><a href="food.php">
      
</form>
<p><a href="singup.php">Not have an account? SingUp here </a></p>
</div>
</body>
</html>