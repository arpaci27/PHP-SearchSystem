<?php
include 'conf/dbconfig.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search-PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class=".bg-secondary"><div class="text-bg-secondary p-3"><div class="container">

<div class="row height d-flex justify-content-center align-items-center">

  <div class="col-md-6">
<form method="POST">
  <div class="form">
    <i class="fa fa-search"></i>
    <input type="text"name="search" class="form-control form-input my-5" placeholder="Search anything...">
    <button type="submit" name="submit" class="btn btn-dark">Search</button>
</div>
</form>
  </div>
  
</div>

</div>
<div class="container">
    <table class="table table-bordered">
    <?php 
        if(isset($_POST['submit'])){
            $search = $baglanti->real_escape_string($_POST['search']);
            $sql = "SELECT * FROM users WHERE ID=? OR Name=? OR Surname=?";
            $stmt = $baglanti->prepare($sql);
            $stmt->bind_param("sss", $search, $search, $search); // 'sss' means three strings
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>{$row['ID']}</td><td>{$row['Name']}</td><td>{$row['Surname']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
        }
        ?><td></td>
        <td></td>
        <td></td>
    </table>
</div>

</div>
  
    




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>