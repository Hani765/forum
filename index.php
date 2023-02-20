<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        min-height: 100vh;
        border: 1px solid rgba(0, 0, 0, 0.1)
    }



    .delete, .fa-trash {
        cursor: pointer;
        border: none;
        background: transparent;
        position: absolute;
        z-index: 1;
        top: 10px;
        right: 10px;
    }.my-3 {
    margin-top: 1rem!important;
    margin-bottom: 1rem!important;
    display: flex;
    text-align: center;
    align-items:center;
    flex-direction:column;
}   
    </style>
</head>

<body>
    <?php include'_partials/_header.php';?>
    <?php include'_partials/_dbconnect.php';?>

    <?php include'_partials/_corusel.php';?>
    <div class="container my-3" id="ques">
        <h2 class="text-center">Surveys</h2>
        <div class="row">

            <?php 
$sql = "SELECT * FROM `catogries`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $id = $row['cetegory_id'];
    $cat = $row['cetegory_name'];
    $desc = $row['cetegory_discription'];
    $date = $row['created'];
    echo '<div class="col-md-4 my-3">
        <div class="card my-2" style="width: 18rem;">
            <div class="position-relative">
                <a href="threadslist.php?catid=' . $id . '">
                    <img src="https://source.unsplash.com/500x400/?' . $cat . ',college" class="card-img-top" alt="...">
                </a>
                <div class="position-absolute bottom-0 end-0 p-2 text-white" style="background: rgba(0, 0, 0, 0.7)">
                    <span><i class="fa fa-clock"></i> ' . date("F j, Y", strtotime($date)) . '</span>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"><a href="threadslist.php?catid=' . $id . '">' . $cat . '</a><a href="editcategory.php?catid=' . $id . '&action=editdesc">
                    <i class="fa fa-pencil"></i>
                </a>
                <form method="POST" action="delete_category.php">
                    <input type="hidden" name="id" value="' . $id . '">
                    <button class="delete"><i class="fa fa-trash-o"style="color:white"></i></button>
                </form>
                </h5>
                <p>' . substr($desc, 0, 80) . '...</p>
                <a href="threadslist.php?catid=' . $id . '" class="btn btn-primary">See Problems</a>
            </div>
        </div>
    </div>';
} 
?>
            <div class="col-md-4 my-3">

                <div class="card-body">
                    <a href="makes new category.php"><i class="fa fa-plus" style="font-size:36px;color:black"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php include'_partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>