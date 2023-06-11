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
        <div class="mb-3">
            <div class="row margin-tb">
                <div class="pull-left col-6">
                    <h4>User List</h4>
                </div>
                <div class="pull-right col-6 text-end">
                    <a class="btn btn-success" href=""> + Add User</a>
                </div>
            </div>
        </div>
    
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
    
        <table class="table">
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th width="280px">Action</th>
            </tr>
        <!-- isi database -->
            <tr>
                <td>1</td>
                <td>user</td>
                <td>user</td>
                <td>user@example.com</td>
                <td>081111111111</td>
                <td>
                    <form action="" method="POST">
                        <!-- show -->
                        <!-- <a class="btn btn-info" href="">Detail</a> -->
                        <a class="btn btn-primary" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                        <!-- edit
                        @can('book-edit')
                        <a class="btn btn-primary" href="">Edit</a>
                        @endcan
                        <!-- delete -->
                        @csrf
                        @method('DELETE')
                        @can('book-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        <!-- akhir database -->
        </table>
    
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>