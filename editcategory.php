<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category - iDiscuss Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    a {
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>

    <?php
    ob_start();
    include '_partials/_header.php';
    include '_partials/_dbconnect.php';
    $showAlert = false;
  if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `catogries` WHERE `cetegory_id` = '$catid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cat = $row['cetegory_name'];
    $desc = $row['cetegory_discription'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Update the category in the database
        $cat = $_POST['cat'];
        $desc = $_POST['desc'];

        $sql = "UPDATE `catogries` SET `cetegory_name` = '$cat', `cetegory_discription` = '$desc' WHERE `cetegory_id` = '$catid'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
        } else {
            header ('location: index.php');

        }
    }
} else {
    echo "Category ID not provided in the URL";
}


    ?>

    <div class="container my-3">
        <h2>Edit Dipartment</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="mb-3">
                <label for="cat" class="form-label">Dipartment Name</label>
                <input type="text" class="form-control" id="cat" name="cat" value="<?php echo $cat; ?>" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Dipartment Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required><?php echo $desc; ?></textarea>
            </div>  
            <input type="hidden" name="catid" value="<?php echo $catid; ?>">
            <button type="submit" class="btn btn-primary">Update Dipartment</button>
        </form>
    </div>
    <?php include'_partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>