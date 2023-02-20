<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error){
    die("connection faild:" . $conn->connect_error);
}
$username = $_POST['user_name'];
$useremail = $_POST['user_email'];
$userphone = $_POST['user_phone'];
$userpassword = $_POST['user_password'];

$stmt = $conn->prepare("INSERT INTO `users` (`user_name`, `user_email`, `user_phone`, `user_password`, `created_time`) VALUES (?, ?, ?, ?, current_timestamp())");
$stmt->bind_param("ssss", $username, $useremail, $userphone, $userpassword);

if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();


  ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category - iDiscuss Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="comtainer">
        <form method="POST" action="signup.php">


            <div class="form-group">
                <label for="user_name">Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="user_email">Email address</label>
                <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="user_phone">Phone Number</label>
                <input type="tel" class="form-control" name="user_phone" id="user_phone" aria-describedby="emailHelp"
                    placeholder="Enter Number">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password"
                    placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>