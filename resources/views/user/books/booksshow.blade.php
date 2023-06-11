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
                <li><a class="dropdown-item" href="/user/profile">My Profile</a></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button class="dropdown-item" type="submit">Logout</button>
                  </form>
                  <!-- <a class="dropdown-item" href="#">Logout</a> -->
                </li>
              </ul>
            </li>
          </ul>
        </div>

    </div>
  </div>
</nav>


    <div class="container mt-4">
    <!-- content -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <a class="btn btn-outline-primary" href="../books"> < </a>
          </div>
            <div class="pull-right">
                <hr>
                <h4>Detail Book</h4>
                <hr>
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <Strong for="name" class="col-sm-2 col-form-label">Name</Strong>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="name" value="The Outsider: A Novel">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="isbn" class="col-sm-2 col-form-label">ISBN</Strong>
        <div class="col-sm-10">
            <input type="number" readonly class="form-control-plaintext" id="isbn" value="9781501180989">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="release" class="col-sm-2 col-form-label">Release</Strong>
        <div class="col-sm-10">
            <input type="number" readonly class="form-control-plaintext" id="release" value="2018">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="pages" class="col-sm-2 col-form-label">Pages</Strong>
        <div class="col-sm-10">
            <input type="number" readonly class="form-control-plaintext" id="pages" value="576">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="quantity" class="col-sm-2 col-form-label">Quantity</Strong>
        <div class="col-sm-10">
            <input type="number" readonly class="form-control-plaintext" id="quantity" value="10">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="author" class="col-sm-2 col-form-label">Author</Strong>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="author" value="Stephen King">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="category" class="col-sm-2 col-form-label">Category</Strong>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="category" value="Mistery">
        </div>
    </div>
    <div class="mb-3 row">
        <Strong for="description" class="col-sm-2 col-form-label">Description</Strong>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="description" value="An unspeakable crime. A confounding investigation. At a time when the King brand has never been stronger, he has delivered one of his most unsettling and compulsively readable stories.">
        </div>
    </div>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>