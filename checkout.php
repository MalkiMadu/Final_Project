<?php
  include('db.php');
  if(isset($_POST['order_btn'])){
    $name=$_POST['name'];
    $D_id=$_POST['D_id'];
    $d_name=$_POST['d_name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $method=$_POST['method'];
    $post=$_POST['post'];
    $eat=$_POST['eat'];
    $demail=md5($email);

    $cart_query=mysqli_query($con,"SELECT * FROM `cart` ");
    $product_total=0;
    if(mysqli_num_rows($cart_query)>0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[]= $product_item['name'].'('. $product_item['quantity'].')';
            $product_price=number_format($product_item['price']*$product_item['quantity']);
            $product_total += $product_price;
        };
    };
    $total_product= implode(",",$product_name);
    $detail_query=mysqli_query($con,"INSERT INTO `order`(name,D_id,d_name,numbe,email,method,post,eat,total_product,total_price)VALUE
     ('$name','$D_id','$d_name','$number','$demail','$method','$post','$eat','$total_product','$product_total') ") or die('query failed');

    if($cart_query && $detail_query){
        echo "<div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for your shopping</h3>
            <div class='order-detail'>
              <span>".$total_product."</span>
              <span class='total'>Total : Rs.".$product_total.".00 </span>
            </div>
            <div class='custom-detail'>
              <p>Your Name : <span>".$name."</span></p>
              <p>Your Id : <span>".$D_id."</span></p>
              <p>Your Email Address : <span>".$demail."</span></p>
              
              <p>(Pay when product arrives!!!)</p>
            </div>
            <button><a href='food.php' class='btnn'>continue shopping </a></button>
        </div>
      </div>";
    }
  }
  ?>
  

<html>
    <head>
    <link href="add.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
          button{
  color: white;
  background-color: gold;
  height: 50px;
  width: 100%;
  font-size: 2rem;
  
}
button a{
  text-decoration: none;
}
            body{
    /*background-color: antiquewhite;*/
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
  .a{
    width: 1000px;
  }
  /*.checkout-form form{
  padding: 4rem;
  border-radius: .5rem;
  background-color: lightslategray;
}
.checkout-form form .flex{
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
}
.checkout-form form .flex .inputbox{
  flex: 1 1 40rem;
}
.checkout-form form .flex .inputbox input
.checkout-form form .flex .inputbox select{
  width: 100%;
  background-color: white;
  font-size: 2rem;
  color: blue;
  border-radius: .5rem;
  margin: 1rem 0;
  padding: 1.2rem 1.4rem;
  text-transform: none;
  border: black ;
}
*/
.checkout-form form .flex .inputbox select{
  width: 100%;
  border-radius: .5rem;
  height: 40px;
}
  
footer{
  background-color: rgb(63, 2, 2);
}
.font {
  color: white;
  font-size:14px;
  padding: 0px 20px;
  
}
.foot{
  width: 100%;
  padding: 70px 30px 20px;
}
.icon{
  display: flex;
  justify-content: center;
}
.icon a{
  text-decoration: none;
  padding: 10px;
  background-color: white;
  margin: 10px;
  border-radius: 50%;
}

.icon a i{
  font-size: 2em;
  color: black;
  opacity: 0.9;
}
.icon a.hover{
  background-color: #111;
  transition: 0.5s;
}
.icon a:hover i{
  color: white;
  transition: 0.5s;
}
.footnav{
  margin: 30px 0;
}

.footnav ul{
  display: flex;
  justify-content: center;
  list-style-type: none;
}
.footnav ul li a{
  color: white;
  margin: 20px;
  text-decoration: none;
  font-size: 1.3em;
  opacity: 0.7;
  transition: 0.5s;
}
.footnav ul li a:hover{
  opacity: 1;
}
.p{
  color: white;
  font-size: 24;
  text-align: center;
}
.heading{
  text-align: center;
  font-size: 30;
  color: black;
}


        </style>
    </head>
    <body style="background-image: url('pay2.avif');">
    <?php
        include('header.php')
    ?>
    <div class="container">
        <h1 class="heading">Complete your order</h1>

        <section class="checkout-form">
            
            <form action="" method="post">

            <div class="display-order">
                <?php
                $select_cart=mysqli_query($con,"SELECT * FROM cart ");
                $total= 0;
                $grand_total= 0;
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                        $total_price=number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total = $total +=$total_price ;
                        ?>
                        <span><?=$fetch_cart['name'] ;?>(<?=$fetch_cart['quantity'] ;?>)</span>
                        <?php
                        }
                    }
                    else
                        {
                            echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                        }
                    
                
                ?>
                <span class="grand-total">Grand total :<?= $grand_total; ?> </span>
            </div>

                <div class="flex">
                    <div class="inputbox">
                        <span>Your Name</span>
                        <input type="text" placeholder="Enter Your Name" name="name" required>
                    </div>
                    <div class="inputbox">
                        <span>Your Id</span>
                        <input type="number" placeholder="Enter Id" name="D_id" required>
                    </div>
                    <div class="inputbox">
                        <span>Your Department Name</span>
                        <input type="text" placeholder="Enter Your Department Name" name="d_name" required>
                    </div>
                    <div class="inputbox">
                        <span>Your Department number</span>
                        <input type="number" placeholder="Enter Your Department Number" name="number" required>
                    </div>
                    <div class="inputbox">
                        <span>Your Email</span>
                        <input type="email" placeholder="Enter Your Email" name="email" required>
                    </div>
                    <div class="inputbox">
                        <span>Your Payment Method</span>
                        <select name="method" id="">
                            <option value="Cash on delivery" selected>Cash on delivery</option>
                            <option value="Credit card">Credit card</option>
                        </select>
                    </div>
                    <div class="inputbox">
                        <span>Your Post</span>
                        <input type="text" placeholder="Enter Your Post" name="post" required>
                    </div>
                    <div class="inputbox">
                        <span>The way of your eat </span>
                        <select name="eat" id="">
                            <option value="In the canteen" selected>In the canteen</option>
                            <option value="Carried away">Carried away</option>
                        </select>
                    </div>
                </div><br><br>
                <input type="submit" value="Order Now" name="order_btn" class="btn">
            </form>

        </section>
    </div>
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
<script src="js/script.js"></script>

    </body>
</html>