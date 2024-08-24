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
            <td><a href="singup.php"><b>Singup</b></a><td>
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