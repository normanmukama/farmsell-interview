@extends('layouts.admin')
@section('content')

<div class="contain mx-4 mt-3">
      @if (session()->has('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
         <p>{{session('success')}}</p>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
      @endif
      <div class="d-flex justify-content-between">
        <p class="text-primary"><strong>Logged in as Admin</strong></p>
        <p><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add User</button></p>
      </div>
    <table class="table table-hover" id="employee">
       <thead>
           <tr class="table-primary">
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Role</th>
               <th>Created</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($users as $user)
           <tr>
               <td>{{$user->user_id}}</td>
               <td><a href="view-employee/{{$user->user_id}}">{{$user->name}}</a></td>
               <td>{{$user->email}}</td>
               <td>{{$user->role}}</td>
               <td>{{$user->datehire}}</td>
               <td>{{$user->id}}</td>
               <td>
                 <a class="btn btn-danger" href="delete/{{$user->user_id}}">Delete</a>
                </td>
           </tr>
           @endforeach
       </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">save-employee
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input name="name" value="{{ old('name') }}" class="form-control" id="exampleFormControlInput1">
              @error("name")
               <span>{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleFormControlInput1">
              @error("email")
              <span>{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Password</label>
              <input name="password" value="{{ old('password') }}" type="password" class="form-control " id="exampleFormControlInput1">
              @error("password")
              <span>{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <p class="form-label">Role</p>
              <input type="radio" value="admin" name="role"> admin
              <input type="radio" value="user" name="role"> user
              <p>
                @error("role")
                <span>{{ $message }}</span>
                @enderror
              </p>
            </div>
            <button name="submit" class="btn btn-primary">Add user</button>
          </form>
    </div>
  </div>
</div>
</div>
<script>
    $(document).ready(function()
{
    $("#employee").DataTable();
})
</script>
@endsection
