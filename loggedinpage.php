<?php include_once("project2.php") ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    <?php include 'design.css'; ?>
  </style>
  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light text=light bg-secondary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="project.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sipCalculator.php">SIP Calculator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="taxCalculator.php">Tax Calculator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="diary.php" tabindex="-1">Diary</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
          <form class="d-flex">
            <button class="btn btn-success" type="submit"><a href='index.php?logout=1'>Log out</a></button>
          </form>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="bg-image p-5 hei text-center shadow-1-strong rounded mb-5 text-white" style="
        background-image: url('https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
    <!-- <h1 class="mb-3">Jumbotron</h1> -->

    <p class="para">
      If You Are Born Poor It’s Not Your Mistake, But If You Die Poor It’s Your Mistake
    </p>



  </div>

  <div class="container">
    <h2 class="text-center">Invest Today for Better Tomorrow</h2>
  </div>


  <div class="container">
    <div class="card-group my-2">
      <div class="card m-1">
        <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card m-1">
        <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card m-1">
        <img src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid mt-5 mb-5">
    <div class="d-flex flex-row align-items-center text-center"> <Span class="integration ms-1 fs-5">Great Investor's Word </Span> </div>
    <div class="row mt-2 g-2">
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Warren Buffet</span> <span class="text mt-2">Someone's sitting in the shade today because someone planted a tree a long time ago.</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Peter Lynch</span> <span class="text mt-2">Find something you enjoy doing and give it everything you've got, and the money will take care of itself.</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Benjamin Graham</span> <span class="text mt-2">The intelligent investor is a realist who sells to optimists and buys from pessimists. </span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Robert Kiyosaki</span> <span class="text mt-2">In the real world, the smartest people are people who make mistakes and learn. In school, the smartest don’t make mistakes.</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Rakesh Jhunjhunwala</span> <span class="text mt-2">When opportunities come, they can come through technology, marketing, brands, value protections, capital, etc. You need to be able to spot those.</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center"> </div> <span class="google mt-3">Vijay Kedia</span> <span class="text mt-2">Investing is like Yoga. Body, mind and soul have to be aligned.</span>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Jumbotron -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>