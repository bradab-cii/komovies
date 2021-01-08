<?php
include('connectdb.php');
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM data_movie WHERE id= $id");
$result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result['title'];?></title>
    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body style="color:#fff">

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
<div class="album py-4 bg-dark">
    <div class="container row">

    <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
  <!-- Breadcrumb -->
  
  <!-- Using PHP Loop -->
      <div class="main-content col-md-8">
        <div class="movie-info col-xs-8 row ">
            <div class="movie-poster col-md-4">
                    <img src="images/<?php echo $result['img'];?>" alt="" width="100%" height="auto">
            </div>
            <div class="movie-detail col-md-8">
                  <div class="detail">
                    <h2 class="card-text"><?php echo $result['title'];?></h2>
                    <p>Time : <?php echo $result['minute'];?></p>
                    <p class="category">Genres : 
                      <a href="#" rel="category tag">Action</a>, 
                      <a href="#" rel="category tag">Romantic</a>, 
                      <a href="#" rel="category tag">Comedy</a>, 
                      <a href="#" rel="category tag">Fantasy</a>, 
                      <a href="#" rel="category tag">Romance</a>, 
                      <a href="#" rel="category tag">Magic</a>, 
                      <a href="#" rel="category tag">ตอนแรก</a>, 
                      <a href="#" rel="category tag">ซับไทย</a>
                    </p>
                    <p class="category">Trailer : <a href="https://www.youtube.com/embed/iYX6EHYhl2M" rel="" target="_blank">ดูตัวอย่าง </a>
                    </p>
                </div>
            </div>
        </div> <!-- movie-info -->
        <div class="entry-content">
          <h3>About</h3>
          <article>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum tenetur nam earum, officiis illo veritatis?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat consequuntur totam quod! Obcaecati, saepe expedita.</p>
          </article>
        </div>
        <!-- full videos -->
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="card shadow-sm text-center">
                        <h3>Player</h3>
                </div>
                <div class="card md-4 shadow-sm">
                    <iframe width="100%" height="380px" src="https://www.youtube.com/embed/<?php echo $result['vdo_main'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
      </div> <!-- main-content -->
      <!-- Sidebar -->
      <div class="sidebar col-md-4">
        <div class="fb-page">
            <iframe width="300" height="320" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com/ดูหนังออนไลน์-123HD-100217911434283%2F&amp;tabs=messages&amp;width=300&amp;height=320&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1200986986682567" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="">
            </iframe>
        </div>
        <div class="popular-post col-md-12">
          <h5>Popular Post</h5>
          <div class="pop-detail row">
            <div class="img col-md-5">
              <img src="images/05.jpg" alt="" width="100%" height="auto">
            </div>
            <div class="title col-md-7 ">
              <h6>True Beauty(2020)</h6>
              <p>29.9K view</p>
            </div>
          </div>
          <div class="pop-detail row">
            <div class="img col-md-5">
              <img src="images/05.jpg" alt="" width="100%" height="auto">
            </div>
            <div class="title col-md-7 ">
              <h6>True Beauty(2020)</h6>
              <p>29.9K view</p>
            </div>
          </div>
          <div class="pop-detail row">
            <div class="img col-md-5">
              <img src="images/05.jpg" alt="" width="100%" height="auto">
            </div>
            <div class="title col-md-7 ">
              <h6>True Beauty(2020)</h6>
              <p>29.9K view</p>
            </div>
          </div>
        </div>
      </div>
      
    </div> <!-- container row -->
</div>


<!-- Footer -->
<footer class="bg-dark">
  <div class="container py-5">
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
  </div>
</footer>
</body>
</html>