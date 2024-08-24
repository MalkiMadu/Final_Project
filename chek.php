<?php
include('db.php');


if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'breakfast_img/'.$p_image;
    $p_items = $_POST['p_items'];

    $insert_query =mysqli_query($con,"INSERT INTO break(name,price,image,howItems) VALUES('$p_name','$p_price','$p_image','$p_items')")or die('query failed');

    if($insert_query){
        move_uploaded_file($p_image_tmp_name,$p_image_folder);
        echo '<script>alert("product add succesfully")</script>'; 

    }
    else{
    
        echo "<script>alert('could not add product')</script>";
    
    }
};


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($con,"DELETE FROM break WHERE id=$delete_id");
    if($delete_query ){
        header('location:admin.php');
        
        echo '<script>alert("product deleted")</script>'; 
    }else{
        header('location:admin.php');
        
        echo '<script>alert("product could not deleted")</script>';
    }
};


?>




<html>
    <head>
    <link href="add.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

.display-product-tab table{
    width: 100%;
    text-align: center;

}
.option-btn i,
.delete-btn i{
    padding-right: .5rem;
    text-align: center;
    border-radius: none;

}
.display-product-tab table thead th{
    padding: 1.5rem;
    font-size: 2rem;
    background-color: black;
    color: white;
}
.display-product-tab table tr td{
    padding: 1.5rem;
    font-size: 2rem;
    color:black;
}
.display-product-tab table tr:nth-child(even){
    background-color:rgb(233, 231, 231);
}
.display-product-tab .empty{
    margin-bottom:2rem;
    text-align: center;
    background-color:rgb(233, 231, 231);
    color:black;
    font-size: 2rem;
    padding: 1.5rem;
}
.edit-form-container{
    display:none;
}
.table{
              text-align: center;
              margin-left: auto;
              margin-right: auto;
              }
button{
  background-color: rgb(63, 2, 2);
  color: white;
  text-decoration: none;
  border: 2px solid transparent;
  font-weight: bold;
  padding: 10px 10px;
  border-radius: 5px;
  transition: .4s;
  width: 300px;
  height: 40px;
  font-size: 12px;
  
}

button[type='button']:hover{
  color: black;
  background: rgb(54, 103, 194);
}
    </style>
    </head>
    <body>
        
    <?php
        include('header.php')
    ?>
    <br><br>
    <table class="table">
    <div class="button">
        <td><a href="admin.php"><button>Breakfast Menu</button></a></td>
        <td><a href="adminl.php"><button>Lunch Menu</button></a></td>
        <td><a href="admins.php"><button>Snack Items</button></a></td>
    </div>
    </table>
        <div class="container">
            <section>
                <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                    <h3>Add Breakfast Menu</h3>
                    <input type="text" name="p_name" placeholder="Enter product name" class="box" required>
                    <input type="number" name="p_price" min="0" placeholder="Enter product price" class="box" required>
                    <input type="file" name="p_image"   class="box" required>
                    <input type="number" name="p_items" min="0" placeholder="How products add today" class="box" required>
                    <input type="submit" value="Add the product" name="add_product" class="btn">

                </form>
            </section>

            <section class="display-product-tab">

                <table>
                    <thead>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Items</th>
                    <th>Action</th>
                    
                    </thead>

                    <tbody>
                        <?php
                        $select_product=mysqli_query($con,"select * from break");
                        if(mysqli_num_rows($select_product)>0){
                            while($row= mysqli_fetch_assoc($select_product)){    
                        ?>
                        <tr>
                        <td><img src="breakfast_img/<?php echo $row['image']; ?>" height="100" width="200" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>Rs. <?php echo $row['price']; ?>.00</td>
                        <td> <?php echo $row['howItems']; ?></td>
                        <td><a href="chek.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"><i class="fas fa-trash"></i>Delete</a></td>
                        
                    </tr>
                        <?php
                        };
                    }else{
                        echo "<div class='empty'>no procuct added</div>";
                    }
                        ?>
                    </tbody>

                </table>

            </section>
            
        </div>


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

    $cart_query=mysqli_query($con,"SELECT * FROM `order` ");
    $product_total=0;
    if(mysqli_num_rows($cart_query)>0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[]= $product_item['name'].'('. $product_item['quantity'].')';
            $product_price=number_format($product_item['price']*$product_item['quantity']);
            $product_total += $product_price;
        };
    };
    $total_product= implode(',',$product_name);
    $detail_query=mysqli_query($con,"INSERT INTO order(name,D_id,d_name,numbe,email,method,post,eat,total_product,total_price)VALUES ('$name','$D_id','$d_name','$number','$email','$method','$post','$eat','$total_product','$total_price') ")or die('query failed');

    if($cart_query&&$detail_query){
        echo "<div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for your shopping</h3>
            <div class='order-detail'>
              <span>".$total_product."</span>
              <span class='total'>Total : Rs.".$product_price.".00 </span>
            </div>
            <div class='custom-detail'>
              <p>Your Name : <span>".$name."</span></p>
              <p>Your Id : <span>".$D_id."</span></p>
              <p>Your Department Name : <span>".$d_name."</span></p>
              <p>Your Department Number : <span>".$number."</span></p>
              <p>Your Email : <span>".$email."</span></p>
              <p>Your Payment Method : <span>".$method."</span></p>
              <p>The way of your eat : <span>".$eat."</span></p>
              <p>(Pay when product arrives!!!)</p>
    
            </div>
            <a href='food.php' class='btn'>continue shopping </a>
        </div>
      </div>";
    }
  }
  ?>
        
    <script src="js/script.js"></script>
    </body>
    </html>
    <?php
    session_start();

    include('db.php');

    if($_SERVER['REQUEST_METHOD']=="POST"){
      try {
      $userName = $_POST['UserName'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      

      if(!empty($userName) && !empty($password) && !is_numeric($userName))
      {
        throw new Exception("Please fill in all required fields.");

        $query = "insert into register(UserName,Email,Password) values('$userName','$email','$password')";

        mysqli_query($con,$query);
        
          echo "<script type='text/javascript'> alert('Successfully Register')</script>";
      }
        else 
        {
          
          echo "<script type='text/javascript'> alert('Please Enter valid information')</script>";
        }
      }
      catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }
  
      
    }
?>


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
            $hashedPassword = $user_data['Password'];

            if($user_date['Password']==$$hashedPassword)
            {
             header("location:food.php");
             die;
            }
          }
        }
        
          echo "<script type='text/javascript'> alert('successfull login')</script>";
      }
        else 
        {
          
          echo "<script type='text/javascript'> alert('Wrong user name or password')</script>";
        }
      } 
      ?>
         