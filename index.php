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

  <div class="form">
    <i class="fa fa-search"></i>
    <input type="text"name="search" class="form-control form-input my-5" placeholder="Search anything...">
    <button type="submit" name="submit" class="btn btn-dark">Search</button>
</div>
    
  </div>
  
</div>

</div>
<div class="container">
    <table class="table table-bordered">
        <?php 
        $search="";
        

        if(isset($_POST['submit'])){ $search = $_POST['search'];
            $sorgu = $baglanti->prepare("SELECT * FROM users Where ID='$search' or Name='$search' or Surname='$search' or Email='$search'");
            $sorgu -> execute();
            $sonuc = $sorgu->fetch();
           
            
        if($sonuc){
            echo "Arama sonuçları: "
            ;
        echo "<tr><td>".$sonuc['ID']."</td><td>".$sonuc['Name']."</td><td>".$sonuc['Surname']."</td><td>".$sonuc['Email']."</td></tr>";}
        else{
                echo "Arama sonucu bulunamadı...";
            }
        }
        
        ?>
    </table>
</div>

</div>
  
    




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>