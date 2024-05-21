@extends('layouts.layout')
@section('content')
<div class="container">
    <h3 class="text-center text-secondary">Single User Logs</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="table-primary">
                <th>Id</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td><?= $result->id ?></td>
                    <td><?= $result->name ?></td>
                    <td><?= $result->role ?></td>
                    <td><?= $result->email ?></td>
                    <td><?= $result->time ?></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection