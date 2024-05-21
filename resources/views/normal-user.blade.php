@extends('layouts.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-primary">Users</h3>
            <table>
                <tbody>
                    @foreach ($single_users as $single_user)
                    <tr>
                        <td>
                            {{$single_user->name}}
                            <p>
                                {{$single_user->email}}
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <p class="text-center text-primary">All logs</p>
            <table class="table table-hover table-striped table-bordered" id="employee">
                <thead>
                    <tr class="table-primary">
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
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