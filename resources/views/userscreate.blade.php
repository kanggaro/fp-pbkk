<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>LMS</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container container-fluid">
    <a class="navbar-brand" href="#">Library Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex">
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">User List</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
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

    <div class="container mt-4">
    <!-- content -->
      <div class="row">
          <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-outline-primary" href=""> < </a>
            </div>
              <div class="pull-right">
                  <hr>
                    <h4>Detail User</h4>
                  <hr>
              </div>
          </div>
      </div>

      <div class="mb-3 row">
              <strong for="firstname" class="col-sm-2 col-form-label">First Name:</strong>
              <div class="col-sm-10">
                <input type="text" name="firstname" value="User" class="form-control" placeholder="firstname">
              </div>
      </div>
      <div class="mb-3 row">
              <strong for="lastname" class="col-sm-2 col-form-label">Last Name:</strong>
              <div class="col-sm-10">
                <input type="text" name="lastname" value="User" class="form-control" placeholder="lastname">
              </div>
      </div>
      <div class="mb-3 row">
              <strong for="email" class="col-sm-2 col-form-label">Email:</strong>
              <div class="col-sm-10">
                <input type="email" name="email" value="user@example" class="form-control" placeholder="email">
              </div>
      </div>
      <div class="mb-3 row">
              <strong for="phonenumber" class="col-sm-2 col-form-label">Phone Number:</strong>
              <div class="col-sm-10">
                <input type="number" name="phonenumber" value="081111111111" class="form-control" placeholder="phonenumber">
              </div>
      </div>
      <div class="row ms-1 mt-3">
		      <button type="submit" class="btn btn-primary">Update</button>
		  </div>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>