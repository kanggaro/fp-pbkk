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
        <div class="mb-3">
            <div class="row margin-tb">
                <div class="pull-left col-6">
                    <h4>Borrow List</h4>
                </div>
                <div class="pull-right col-6 text-end">
                    <!-- <a class="btn btn-success" href=""> + Add User</a> -->
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
                <th>ISBN</th>
                <th>Book Name</th>
                <th>Lease Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        <!-- isi database -->
            <!-- data 1  -->
            <tr>
                <td>1</td>
                <td>9781501180989</td>
                <td>The Outsider: A Novel</td>
                <td>2023-06-10 10:00:00</td>
                <td>2023-06-17 10:00:00</td>
                <td>
                  <span class="btn btn-warning">Menunggu Konfirmasi</span>
                </td>
            </tr>
            <!-- data 2  -->
            <tr>
                <td>2</td>
                <td>9780131429246</td>
                <td>Calculus</td>
                <td>2023-06-10 10:00:00</td>
                <td> - </td>
                <td>
                  <span class="btn btn-danger">Di Tolak</span>
                </td>
            </tr>
            <!-- data 3  -->
            <tr>
                <td>3</td>
                <td>9781473537804</td>
                <td>Atomic Habits</td>
                <td>2023-06-10 10:00:00</td>
                <td> - </td>
                <td>
                  <span class="btn btn-primary">Penuh</span>
                </td>
            </tr>
        <!-- akhir database -->
        </table>
    
    <!-- endsection content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>