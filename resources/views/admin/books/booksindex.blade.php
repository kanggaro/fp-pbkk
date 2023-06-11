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
        <div class="mb-3">
        <div class="row margin-tb" style="1px solid red">
                <div class="pull-left col-4 ">
                    <h4>Book List</h4>
                </div>
                <div class="col-4"></div>
                <div class="pull-right col-4 justify-content-end">
                   <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
            </div>
            <div class="row mt-3">
                  <a class="btn btn-outline-success" href="books/create"> + Add Book</a>
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
                <th>ISBN</th>
                <th>Name</th>
                <th>Author</th>
                <th>Release</th>
                <th width="280px">Action</th>
            </tr>
        <!-- isi database -->
            <tr>
                <td>1</td>
                <td>9781501180989</td>
                <td>The Outsider: A Novel</td>
                <td>Stephen King</td>
                <td>2018</td>
                <td>
                    <form action="" method="POST">
                        <!-- show -->
                        <a class="btn btn-info" href="books/show">Detail</a>
                        <a class="btn btn-primary" href="books/edit">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                        <!-- <a class="btn btn-primary" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a> -->
                        <!-- edit -->
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