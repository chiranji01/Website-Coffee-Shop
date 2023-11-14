<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product-card.css">
    <title>Admin</title>
</head>
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }
</style>

<body>
    <?php
    session_start();
    if (isset($_SESSION['admin'])) {
        echo "Welcome " . $_SESSION['admin'];
    } else {
        header("Location: login.php");
    }
    ?>
    <div style="margin-bottom: 4%;">

        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#news">Product</a></li>
            <li><a href="#contact"></a></li>
            <li><a href="#about">About</a></li>
        </ul>
    </div>
    <div class="">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "coffeeexpress");
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card' style='margin-bottom:3%;'>";
                echo "<img src='". $row['Image'] . "' alt='Avatar' style='width:100%'>";
                echo "<div class='container'>";
                echo "<h4><b>" . $row['Barcode'] . "</b></h4>";
                echo "<p>" . $row['Name'] . "</p>";
                echo "<p>LKR." . $row['Price'] . "</p>";
                echo "<p>" . $row['Description'] . "</p>";
                //Update button
                echo "<a href='update.php?barcode=" . $row['Barcode'] . "'  ><button type='button' class='btn btn-update' style='margin-bottom:2%;'>Update</button></a>";
                //Delete button
                echo "<a href='DeleteProduct.php?barcode=" . $row['Barcode'] . "' ><button type='button'  class='btn btn-delete' style='color:red;margin-bottom:2%;;' name='delete'>Delete</button></a>";
                //Add Button
                echo "<a href='add.php' ><button type='button' class='btn btn-add' style='color:green;' name='add'>Add</button></a>";
                echo "</div>";
                echo "</div>";
            }
        }?>
    </div>
</body>

</html>