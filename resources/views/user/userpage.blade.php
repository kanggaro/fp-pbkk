<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>LMS</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-info">
  <div class="container container-fluid">
    <a class="navbar-brand" href="/user">Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex">
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/user/books">Book List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/user/borrows">Borrow History</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                User
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>

    </div>
  </div>
</nav>

    <div class="container mt-4 pt-5">
    <!-- content -->
    <div class="row justify-content-around">
      <h4 class="text-center mb-5">Enjoy Our Collection Books</h4>
      <div class="card m-3 col-4">
        <div class="card-body">
          <h5 class="card-title">Book List</h5>
          <p class="card-text">Search your favorite book here.</p>
          <a href="user/books" class="btn btn-primary opacity-75">More</a>
        </div>
      </div>
      <div class="card m-3 col-4">
        <div class="card-body">
          <h5 class="card-title">Borrow History</h5>
          <p class="card-text">Check your loans book here.</p>
          <a href="user/borrows" class="btn btn-primary opacity-75">More</a>
        </div>
      </div>

    </div>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>