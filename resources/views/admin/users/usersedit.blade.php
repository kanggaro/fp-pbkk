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
              <a class="nav-link" aria-current="page" href="/admin/users">User List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/admin/borrows">Manage Borrow</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/admin/books">Manage Book</a>
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

    <div class="container mt-4">
    <!-- content -->
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <a class="btn btn-outline-success opacity-75" href="/admin/users"> < </a>
          </div>
            <div class="pull-right">
                <hr>
                    <h4>Edit User</h4>
                <hr>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="" method="POST">
    	@csrf
        @method('PUT')
    
		    <div class="mb-3 row">
		        <strong class="col-sm-2 col-form-label">First Name:</strong>
            <div class="col-sm-10">
                <input type="text" name="firstname" value="User" class="form-control" placeholder="firstname">
		        </div>
		    </div>
		    <div class="mb-3 row">
		        <strong class="col-sm-2 col-form-label">Last Name:</strong>
            <div class="col-sm-10">
                <input type="text" name="lastname" value="User" class="form-control" placeholder="lastname">
		        </div>
		    </div>
		    <div class="mb-3 row">
		        <strong class="col-sm-2 col-form-label">Email:</strong>
            <div class="col-sm-10">
                <input type="email" name="email" value="user@example" class="form-control" placeholder="email">
		        </div>
		    </div>
		    <div class="mb-3 row">
		        <strong class="col-sm-2 col-form-label">Phone Number:</strong>
            <div class="col-sm-10">
                <input type="number" name="phonenumber" value="081111111111" class="form-control" placeholder="phonenumber">
		        </div>
		    </div>
		    <div class="row ms-1 mt-5">
		      <button type="submit" class="btn btn-success opacity-75">Update</button>
		    </div>

    </form>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>