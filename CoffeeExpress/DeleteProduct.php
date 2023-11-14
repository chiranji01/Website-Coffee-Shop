<?php
    session_start();
        $conn = mysqli_connect("localhost", "root", "", "coffeeexpress");
        $sql = "DELETE FROM Product WHERE Barcode = '" . $_GET['barcode'] . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        header("Location: admin.php");
?>