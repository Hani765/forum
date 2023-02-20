<?php
include '_partials/_dbconnect.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT `cetegory_name` FROM `catogries` WHERE `cetegory_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $category_name = $row['cetegory_name'];

    // Add a confirmation message using JavaScript
    echo "<script>
            if (confirm('Are you sure you want to delete the category \"$category_name\"?')) {
                window.location = 'delete_category.php?id=$id';
            } else {
                window.location = 'index.php';
            }
          </script>";
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `catogries` WHERE `cetegory_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result) { 
        header ('location: index.php');
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }
}
?>
