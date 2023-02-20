<?php include'_partials/_dbconnect.php';?>
<?php
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Catogries
    </a>
    <ul class="dropdown-menu">';?>
<?php
            $sql = "SELECT * FROM `catogries`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['cetegory_id'];
                $cat = $row['cetegory_name'];
                echo '<li><a class="dropdown-item" href="threadslist.php?catid=' . $id . '">' . $cat . '</a></li>';
            }
        ?>


<?php echo'</ul>
</li>

<li>
    <a class="nav-link" href="contact.php">Contact US</a>
</li>
</ul>
<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="search">Search</button>
</form>
<div class="mx-2">
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">login</button>
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">SIGNUP</button>
</div>
</div>
</div>
</nav>';
include '_partials/_loginModale.php';
include '_partials/_signupModale.php';
?>