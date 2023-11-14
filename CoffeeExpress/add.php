<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
</head>
<style>
    .form {
        margin: 0 50%;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        display: block;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="form">
        <form action="add.php" method="POST">
            <label for="barcode">Barcode</label>
            <input type="text" name="barcode" id="barcode">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="price">Price</label>
            <input type="text" name="price" id="price">
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
            <label for="image">Image</label>
            <input type="text" name="image" id="image">
            <input type="submit" value="Add">
        </form>
    </div>
</body>
<?php
    if(isset($_POST['barcode']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['image'])){
        $conn = mysqli_connect("localhost", "root", "", "coffeeexpress");
        $sql = "INSERT INTO Product (Barcode, Name, Price, Description, Image) VALUES ('" . $_POST['barcode'] . "', '" . $_POST['name'] . "', '" . $_POST['price'] . "', '" . $_POST['description'] . "', '" . $_POST['image'] . "')";
        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully";
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>

</html>