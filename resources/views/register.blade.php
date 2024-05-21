<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clocking/Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <div class="container">
      <form action="save-employee" method="POST">
        {{-- @if (session()->has('success'))
          <h4>{{session('success')}}</h4>
        @endif --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        @csrf
        <h2 class="text-center">Add User</h2>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input name="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Role (choose admin or user)</label>
          <input name="role" type="role"  class="form-control" id="exampleFormControlInput1">
        </div>
        <button name="submit" class="btn btn-primary">Add user</button>
      </form>
   </div>
</body>
</html>
