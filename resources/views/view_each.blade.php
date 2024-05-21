@extends('layouts.user')
@section('content')
<div class="bg-success py-2 px-4" style="display: flex; justify-content:space-between;">
    <div class="text-light">
        <p>Clocking
            <br>
           @if (session()->has('email'))
              {{session('email')}}
           @endif
        </p>
    </div>
    <div class="text-light" style="display: flex; list-style:none; gap:3rem;">
        <li>Report</li>
        <li>User</li>
        <li>Log Out</li>
    </div>
</div>
<div class="container">
    <div class="row mx-auto text-center">
        <div class="col-md-6">
            <h4 class="text-primary text-center mt-3">Edit User</h4>
            <table class="table table-hover" id="employee">
                <thead class="table-primary">
                    <tr>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($each_user as $user)
                    <tr>
                        <td>{{$user->date}}</td>
                        <td>{{$user->time}}</td>
                        <td>{{$user->out}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#employee").DataTable();
    })
</script>
@endsection
