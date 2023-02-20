<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // connect to the database
    $host = 'localhost'; // replace with your database host
    $username = 'root'; // replace with your database username
    $password = ''; // replace with your database password
    $dbname = 'idiscuss'; // replace with your database name
    $conn = new mysqli($host, $username, $password, $dbname);

    // check if the connection was successful
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // prepare the query
    $stmt = $conn->prepare("INSERT INTO `catogries` (`cetegory_id`, `cetegory_name`, `cetegory_discription`, `background_image`, `created`) VALUES (NULL, ?, ?, ?, current_timestamp())");

    // get the filename and contents of the uploaded file
    $filename = $_FILES['background_image']['name'];
    $filetype = $_FILES['background_image']['type'];
    $filetmp = $_FILES['background_image']['tmp_name'];
    $filesize = $_FILES['background_image']['size'];

    // check if the file was uploaded successfully
    if ($filetmp) {

        // read the file contents
        $filedata = file_get_contents($filetmp);

        // bind the parameters
        $stmt->bind_param("sss", $category_name, $category_description, $filedata);

    } else {

        // bind the parameters without the file
        $stmt->bind_param("sss", $category_name, $category_description, '');

    }

    // set the parameters
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    // execute the query
    $max_input_length = 100;
    if (strlen($category_name) > $max_input_length) {
        echo "Category Name cannot exceed $max_input_length characters";
        exit;
    }

    $max_textarea_length = 500;
    if (strlen($category_description) > $max_textarea_length) {
        echo "Category Description cannot exceed $max_textarea_length characters";
        exit;
    }

    if ($stmt->execute()) {
        header('location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // close the statement and the connection
    $stmt->close();
    $conn->close();
} 
?>

<div class="container my-3">
    <h2>Make New Department</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_name" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" maxlength="100"
                required>
        </div>
        <div class="mb-3">
            <label for="category_description" class="form-label">Department Description</label>
            <textarea class="form-control" id="category_description" name="category_description" required
                maxlength="500" onkeyup="countChars(this)"></textarea>
        </div>
        <div id="char-count"></div>
        <div class="mb-3">
            <label for="background_image" class="form-label">Background Image</label>
            <input type="file" class="form-control" id="background_image" name="background_image">
            </div>
            <div class="mb-3">
                <img id="image-preview" src="#" alt="Preview" style="display:none;max-width:200px;">
            </div>
            <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#background_image").change(function() {
                readURL(this);
            });
            </script>
            <button type="submit" class="btn btn-primary">Create Dipartment</button>
        </form>

        <script>
        function countChars(textarea) {
            var charCount = textarea.value.replace(/\s/g, '').length;
            document.getElementById("char-count").innerHTML = charCount + " characters";
        } <
        script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin = "anonymous" >
        </script>
</body>