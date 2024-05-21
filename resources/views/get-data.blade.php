@extends('layouts.admin')
@section('content')
<div class="">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{session('success')}}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   @endif
    <div class="d-flex justify-content-between mt-2 px-3">
      <h5>Logged in as Admin</h5>
      <p><button class="btn btn-success add-user" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add User</button></p>
    </div>
    <table class="table table-striped table-bordered" id="employee">
      <thead>
          <tr class="table-primary">
              {{-- <th>Id</th> --}}
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Date hire</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($results as $result)
              <tr>
                  {{-- <td><//?= $result->user_id ?></td> --}}
                  <td><a href="view-employee/{{$result->user_id}}" style="text-decoration:none;">{{$result->name}}</a></td>
                  <td><?= $result->email ?></td>
                  <td><?= $result->role ?></td>
                  <td><?= $result->datehire ?></td>
  
                  <td>
                      <!-- Modal -->
                      <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-<link>{{$result->user_id}}</link>">Delete</a>
                      <div class="modal fade" id="exampleModal-<link>{{$result->user_id}}</link>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="">
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to delete the user?
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <a class="btn btn-danger" href="delete/{{$result->user_id}}">ok</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="add-employee" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <input  name="name" value="{{ old('name') }}" class="form-control text-danger" id="exampleFormControlInput1">
                  @error("name")
                   <span style="color: red">{{ $message }}</span>
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
                  <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="exampleFormControlInput1">
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