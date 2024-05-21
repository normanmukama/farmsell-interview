@extends('layouts.admin')
@section('content')
<div class="" >
    <div class="container col-md-5 mt-4 card py-md-3" style="border-top: 4px solid green;border-bottom: 4px solid green;border-radius: 4px;">
        <div class="">
            <h4 class="text-success text-center mt-3 card-header">Edit User</h4>
            <form action="/edit-employee" method="POST">
                @csrf
                <input class="" type="hidden" value="{{$users->user_id}}" name="user_id">

                <div class="form-group row mt-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input type="text" id="name" value="{{$users->name}}" class="form-control" name="name" required />
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input type="text" id="name" value="{{$users->email}}" class="form-control" name="email" required />
                    </div>
                </div>

                <div class="form-group row mt-2">
                    {{-- <label for="name" class="col-md-4 col-form-label text-md-right">Password</label> --}}
                    <div class="col-md-6">
                        <input type="hidden" id="name" value="{{$users->password}}" class="form-control" name="password" required />
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Role</label>
                    <div class="col-md-6">
                        <input type="text" id="name" value="{{$users->role}}" class="form-control" name="role" required />
                    </div>
                </div>
                <div class="d-flex justify-content-evenly">
                    <button class="btn btn-success mt-2" type="submit">Update</button>
                    {{-- <button class="btn btn-primary mt-2">Back</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
