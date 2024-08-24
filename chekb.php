<?php
include('db.php');
if(isset($_GET['add_to_cart'])){
    For($new_items=$p_items;$new_items>0;$new_items--){
    $update_Items=mysqli_query($con,"UPDATE break SET id=$new_items");
    } 
    if($new_items==0){
        echo '<script a href="chekb.php">alert("product is not available")</script>'; 
    }
    elseif($new_items==1){
        echo '<script a href="chekb.php">alert("Only one product is available")</script>'; 
    }
    
}
/*if(isset($_POST['add_to_cart'])){
    
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($con,"SELECT * FROM cart WHERE name='$product_name'");

    if(mysqli_num_rows($select_cart)>0){
        //$message[] = 'Product already added to cart';
        echo '<script>alert("product already added to cart")</script>'; 
    } 
    else{
        $insert_product = mysqli_query($con,"INSERT INTO cart (name,price,image,quantity)VALUES ('$product_name','$product_price','$product_image','$product_quantity')");
        //$message[] = 'Product added to cart succesfull'; 
        echo '<script>alert("product added to cart succesfull")</script>'; 

    }
}*/
    

?>
<html>
    <head>
    <link href="add.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <style>
        .heading{
  text-align: center;
  font-size: 3.5rem;
  text-transform: uppercase;
  color: black;
  margin-bottom: 2rem;
}
.product .box-container{
  display: grid;
  grid-template-columns: repeat(auto-fit,35rem);
  gap: 1.5rem;
  border-color: black;
}
.product .box-container .box{
  text-align: center;
  padding: 2rem;
  box-shadow: 
  
  35rem #00000022;
  border-radius: .5rem;
}


.product .box-container .box img{
  height: 150;
  width: 250;
}
.product .box-container .box h3{
  margin: 1rem 0;
  font-size: 2.5rem;
  color: black;

}
.product .box-container .box .price{
  font-size: 2.5rem;
  color: black;
  
}
    </style>
    <body>
    
    <?php
        include('header.php')
    ?>
    
    <div class="container">
<section class="product">
    <h1 class="heading">Breakfast Menu</h1>

<div class="box-container">
    <?php
    $select_product=mysqli_query($con,"select * from break");
    if(mysqli_num_rows($select_product)>0){
        while($fetch_product= mysqli_fetch_assoc($select_product)){ 
    ?>
    <form action="" method="post">
        <div class="box">
            <img src="breakfast_img/<?php echo $fetch_product['image']; ?> "   alt="">
            <h3><?php echo $fetch_product['name']; ?> </h3>
            <div class="price">Rs.<?php echo $fetch_product['price']; ?>.00 </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?> ">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?> ">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?> ">

            <input type="submit" class="btn" value="add to cart" name="add_to_cart">    

                        

        </div>
    </form>
    <?php
        } ;  
    };
    ?>

</div>
</section>

    </div>

    <script src="js/script.js"></script>

    </body>
    </html>