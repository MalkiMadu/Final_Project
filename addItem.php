<html>
    <head>
        <link href="add.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

    <body>
    <?php
        include('header.php')
    ?>
<div class="container">
<section>
<h1>Add Items</h1>
<form action="" class="add_product">
    <input type="text" placeholder="Enter Item name" class="input_fields" required>
    <input type="number" min="0" placeholder="Enter Item price" class="input_fields" required>
    <input type="file"  class="input_fields" required>
    <input type="submit" class="submit_btn" value="Add Item">
</form>
</section>
</div>
<script src="js/script.js"></script>
</body>
</html>