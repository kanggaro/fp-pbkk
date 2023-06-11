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

    <div class="container mt-2">
    <!-- content -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left row">
              <hr>
                  <a class="btn btn-outline-success opacity-75 col-1" href="/admin/books"> < </a>
                  <h4 class="col">Edit Book</h4>
              <hr class="mt-2">
          </div>
            <!-- <div class="pull-right">
                <hr>
                  <h4>Edit Book</h4>
                <hr>
            </div> -->
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
          <strong class="col-sm-2 col-form-label">Name:</strong>
          <div class="col-sm-10">
              <input type="text" name="name" value="The Outsider: A Novel" class="form-control" placeholder="Name">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">ISBN:</strong>
          <div class="col-sm-10">
              <input type="number" name="isbn" value="9781501180989" class="form-control" placeholder="isbn">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Release:</strong>
          <div class="col-sm-10">
              <input type="number" name="release" value="2018" class="form-control" placeholder="release">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Pages:</strong>
          <div class="col-sm-10">
              <input type="number" name="pages" value="576" class="form-control" placeholder="pages">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Quantity:</strong>
          <div class="col-sm-10">
              <input type="number" name="quantity" value="10" class="form-control" placeholder="quantity">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Author:</strong>
          <div class="col-sm-10">
              <input type="text" name="author" value="Stephen King" class="form-control" placeholder="author">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Category:</strong>
          <div class="col-sm-10">
              <input type="text" name="category" value="Mystery" class="form-control" placeholder="category">
          </div>
      </div>
      <div class="mb-3 row">
          <strong class="col-sm-2 col-form-label">Detail:</strong>
          <div class="col-sm-10">
              <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">An unspeakable crime. A confounding investigation. At a time when the King brand has never been stronger, he has delivered one of his most unsettling and compulsively readable stories.</textarea>
          </div>
      </div>
      <div class="row ms-1 mt-3">
        <button type="submit" class="btn btn-success opacity-75">Update</button>
      </div>
		


    </form>
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>