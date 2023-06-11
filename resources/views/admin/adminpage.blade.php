<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>LMS</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-success bg-opacity-50">
  <div class="container container-fluid">
    <a class="navbar-brand" href="/admin">Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex">
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin/users">User List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin/borrows">Manage Borrow</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin/books">Manage Book</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin/profile">My Profile</a></li>
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
      <h4 class="text-center mb-5">Welcome, Admin</h4>
      <div class="card m-3 col-4">
        <div class="card-body">
          <h5 class="card-title">User List</h5>
          <p class="card-text">Manage our user here.</p>
          <a href="admin/users" class="btn btn-success opacity-75">More</a>
        </div>
      </div>
      <div class="card m-3 col-4">
        <div class="card-body">
          <h5 class="card-title">Manage Borrow</h5>
          <p class="card-text">Manage borrowing book here.</p>
          <a href="admin/borrows" class="btn btn-success opacity-75">More</a>
        </div>
      </div>
      <div class="card m-3 col-4">
        <div class="card-body">
          <h5 class="card-title">Manage Book</h5>
          <p class="card-text">Manage collection book here.</p>
          <a href="admin/books" class="btn btn-success opacity-75">More</a>
        </div>
      </div>

    </div>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>