<?php
include('connectdb.php');

$num_row = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_movie"));
$limit_page = 8;

//if don't have page
//if(isset($_GET["Page"])){
  //$page = $_GET["Page"];
//}else{
  //$page = 1;
//}
//easy method
$page = @$_GET["Page"] ? $_GET["Page"] : 1;

$num_page = $num_row/$limit_page;
//control page
if($page > $num_page) $page = $num_page;
if(!($num_page == (int)$num_page)) $num_page = (int)$num_page+1;
$limit_start = ($page*$limit_page)-$limit_page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header -->
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">K.O Movies</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>


<!-- Album body -->
<div class="album py-5 bg-light">
    <div class="container">

    <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./?Page=1">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
  <!-- Breadcrumb -->
  
  <!-- Using PHP Loop -->
      <div class="row">
    <?php 
    $query = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY id DESC LIMIT $limit_start,$limit_page");
    while($result = mysqli_fetch_array($query)){   
    ?>
    
        <div class="col-md-3">
        <div class="card md-4 shadow-sm ">
            <a href="./play.php?id=<?php echo $result['id']?>&title=<?php echo $result['title'];?>">
            <div id="thumbnail">
              <img src="images/<?php echo $result['img']?>" alt="" width="100%" height="380">
            </div>
            <div class="card-body">
              <p class="card-text text-center" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $result['title'];?></p>
                 </a>
            </div>
          </div>
        </div>
    <?php } ?>   
    </div>      
  <!-- Pagination -->
  <nav aria-label="...">
  <ul class="pagination justify-content-center" >
  <!---------------------------------- -->
  <?php
  if($page <= 1){
  ?>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
  <?php }else { ?>
    <li class="page-item">
      <a class="page-link" href="?Page=<?php echo $page-1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
    </li>

  <?php } ?>
  <!---------------------------------- -->
  <?php
  //show first page with commma
  if($page > 5){
  ?>
    <li class="page-item">
      <a class="page-link" href="?Page=1">1</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">..</a>
    </li>
  <?php } ?>  
  <!------------  ---------------------- -->
    <!-- Using PHP -->
    <?php 
    //show limit page
    if($page >= 9){//control total page
      if($page <= 5){
        $num_start = 1;
        $num_stop = 9;
      }elseif ($page > $num_page-4) {
        $num_start = $num_page-8;
        $num_stop = $num_page;
      }else{
        $num_start = $page-4;
        $num_stop = $page+4;
      }
    }else{
      $num_start = 1;
      $num_stop = $num_page;
    }
    for($i=$num_start;$i<$num_stop+1;$i++){ 
      if($page == $i){
    ?>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#"><?php echo $i; ?></a>
    </li>
    <?php 
    }else{   
    ?>
    <li class="page-item"><a class="page-link" href="?Page=<?php echo $i;?>"><?php echo $i; ?></a></li>

    <?php } ?>
    <?php } ?>

  <!---------------------------------- -->
  <?php
  //show last page with commma
  if($page < $num_page-4){
  ?>
    
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">..</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="?Page=<?=$num_page?>"><?=$num_page?></a>
    </li>
  <?php } ?>  
  <!---------------------------------- -->
  <?php
  if($page >= $num_page){
  ?>
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
    </li>
  <?php }else { ?>
    <li class="page-item">
      <a class="page-link" href="?Page=<?php echo $page+1; ?>" tabindex="-1" aria-disabled="true">Next</a>
    </li>

  <?php } ?>
  <!---------------------------------- -->
  </ul>
</nav>


<!-- Footer -->
<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
      <small class="d-block mb-3 text-muted">© 2017-2020</small>
      <p> Created by <a href="./">K.O Movies</a></p>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Cool stuff</a></li>
        <li><a class="link-secondary" href="#">Random feature</a></li>
        <li><a class="link-secondary" href="#">Team feature</a></li>
        <li><a class="link-secondary" href="#">Stuff for developers</a></li>
        <li><a class="link-secondary" href="#">Another one</a></li>
        <li><a class="link-secondary" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Resource name</a></li>
        <li><a class="link-secondary" href="#">Resource</a></li>
        <li><a class="link-secondary" href="#">Another resource</a></li>
        <li><a class="link-secondary" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Business</a></li>
        <li><a class="link-secondary" href="#">Education</a></li>
        <li><a class="link-secondary" href="#">Government</a></li>
        <li><a class="link-secondary" href="#">Gaming</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Team</a></li>
        <li><a class="link-secondary" href="#">Locations</a></li>
        <li><a class="link-secondary" href="#">Privacy</a></li>
        <li><a class="link-secondary" href="#">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>
</body>
</html>