<?php
  include('db.php');
  if(isset($_POST['update_update_btn'])){
    $update_value= $_POST['update_quantity'];
    $update_id= $_POST['update_quantity_id'];
    $update_quantity_query= mysqli_query($con,"UPDATE cart SET quantity ='$update_value' WHERE id='$update_id'");

    if($update_quantity_query){
      header('location:cart.php');
    };
  };
  if(isset($_GET['remove'])){
    $remove_id= $_GET['remove'];
    mysqli_query($con,"DELETE FROM cart WHERE id=$remove_id");
    
      header('location:cart.php');
    }
    if(isset($_GET['delete_all'])){
      mysqli_query($con,"DELETE FROM cart");
    
      header('location:cart.php');
    }
  
?>



<html>
    <head>
        <link href="add.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
.container{
  max-width: 1200px;
  margin: 0 auto;
}
section{
  padding: 2rem;
}
h1{
  text-align: center;
  font-size: 3.5rem;
  text-transform: uppercase;
  color: black;
  margin-bottom: 2rem;
}
.a{
 width: 1000px;
}
.checkout-btn a{
  text-decoration: none;
}

        </style>

      </head>

    <body>
    <?php
        include('header.php')
    ?>
<div class="container">
<section class="shopping-cart">
<h1 class="heading">shopping Cart</h1>
<table>
  <thead>
  
    <th>name</th>
    <th>price</th>
    <th>quantity</th>
    <th>total price</th>
    <th>action</th>

  </thead>
  <tbody>
    <?php
        $select_cart= mysqli_query($con,"SELECT * FROM cart");
        $grand_total=0;
        if(mysqli_num_rows($select_cart)>0)
        {
          while($fetch_cart= mysqli_fetch_assoc($select_cart)){

         ?>
         <tr>
          
         
          <td><?php echo $fetch_cart['name']; ?></td>
          <td>Rs.<?php echo number_format($fetch_cart['price']); ?>.00</td>
          <td>
            <form action="" method="post">
              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
              <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
              <input type="submit" value="update" name="update_update_btn">
            </form>
          </td>
            <td>Rs.<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']);?>.00</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id'];?>" onclick="return confirm('Remove item from cart? ')" class="delete-btn"><i class="fas fa-trash"></i>Remove</a></td>
          
          </tr>
         <?php
         $grand_total += $sub_total;
         };
        };

    ?>
    <tr class="table-bottom">
      <td><a href="food.php" class="option-btn" style="margin-top:0">Continue shopping</a></td>
        <td colspan="2">grand total</td>
        <td>Rs.<?php echo $grand_total; ?>.00</td>
        <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"><i class="fas fa-trash"></i>delete all</a></td>
    </tr>
</tbody>
</table>
<div class="checkout-btn">
  <a href="checkout.php" class="btn <?= ($grand_total>1)?'':'disabled';?>">Procced to checkout</a>
</div>
</section>
</div>
<script src="js/script.js"></script>
</body>
</html>