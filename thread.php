<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    #ques {
        min-height: 430px;
        border: 1px solid rgba(0, 0, 0, 0.1)
        
    }
    </style>
</head>

<body>
    <?php include'_partials/_header.php';?>
    <?php include'_partials/_dbconnect.php';?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `catogries` WHERE cetegory_id = $id";
    $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $catname = $row['cetegory_name'];
                $catdesc = $row['cetegory_discription'];
                
            }
    ?>

    <div class="container my-3">
        <div class="jumbotron bg-light p-5">
            <h1 class="display-4">Welcome to <?php echo' ' . $catname . ' '?> Forums</h1>
            <p class="lead"><?php echo' ' . $catdesc . ' '?></p>
            <hr class="my-4">
            <p>
                Keep it friendly.<br>
                Share your knowledge.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.
                Stay on topic.<br>
            </p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <div class="container p-3" id="ques">
        <h1 class="my-2">Browse Question</h1>
        <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
    $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['thread_id'];
                $tittle = $row['thread_tittle'];
                $desc = $row['thread_discription'];
                
       echo '<div class="media my-3">
            <img class="mr-3" src="img/pngwing.com.png" width="34px" alt="">
            <div class="media-body">
                <h5 class="mt-0"><a class="text-dark"href="thread.php">' . $tittle . ' </a></h5>
                <p>' . $desc . ' </p>
            </div>
        </div>';
    }
        
    ?>
    </div>
    <?php include'_partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>