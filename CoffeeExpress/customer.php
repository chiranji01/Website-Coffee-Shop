<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product-card.css">

    <title>Customer</title>
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
    if (isset($_SESSION['user'])) {
        echo "Welcome " . $_SESSION['user'];
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
                echo "<img src='" . $row['Image'] . "' alt='Avatar' style='width:100%'>";
                echo "<div class='container'>";
                echo "<h4><b>" . $row['Barcode'] . "</b></h4>";
                echo "<p>" . $row['Name'] . "</p>";
                echo "<p>LKR." . $row['Price'] . "</p>";
                echo "<p>" . $row['Description'] . "</p>";
                //Add Button
                echo "<a href='customer.php?id=".$row['Id']."&Price=".$row['Price'] ."' ><button type='button' class='btn btn-add' style='color:green;' name='add'>Add To Cart</button></a>";
                echo "</div>";
                echo "</div>";
            }
        } ?>
    </div>
</body>
<?php
    session_start();
    $con = mysqli_connect("localhost:8080","root","","coffeeexpress");
    if(isset($_GET['id']) && isset($_GET['Price'])){
        $ID = $_GET['id'];
        $Price = $_GET['Price'];
        $name = $_SESSION['user'];
        echo $name;
        echo $ID;
        echo $Price;
        $sql = "INSERT INTO `Cart`(`user_id`, `product_id`, `quantity`, `price` ) VALUES ('$name','$ID','1','$Price')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "Added to cart";
        }else{
            echo "Error";
        }
    }

?>

</html>