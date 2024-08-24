<?php
include('db.php');

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'breakfast_img/'.$p_image;

    $insert_query =mysqli_query($con,"INSERT INTO product(name,price,image) VALUES('$p_name','$p_price','$p_image')")or die('query failed');

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
    $delete_query = mysqli_query($con,"DELETE FROM product WHERE id=$delete_id");
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
        .a{
    width: 1000px;
  }

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
                    <input type="submit" value="Add the product" name="add_product" class="btn">

                </form>
            </section>

            <section class="display-product-tab">

                <table>
                    <thead>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                    </thead>

                    <tbody>
                        <?php
                        $select_product=mysqli_query($con,"select * from product");
                        if(mysqli_num_rows($select_product)>0){
                            while($row= mysqli_fetch_assoc($select_product)){    
                        ?>
                        <tr>
                        <td><img src="breakfast_img/<?php echo $row['image']; ?>" height="100" width="200" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>Rs. <?php echo $row['price']; ?>.00</td>
                        <td><a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"><i class="fas fa-trash"></i>Delete</a></td>

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
        
    <script src="js/script.js"></script>
    </body>
    </html>
