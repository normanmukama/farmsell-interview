@extends('layouts.admin')
@section('content')
<div class="mt-2">
    <table class="table table-striped table-bordered" id="tabledata">
        <thead>
            <tr class="table-primary">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date hire</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td><?= $result->user_id ?></td>
                    <td>
                        <a href="show-logs/{{ $result->user_id }}"><?= $result->name ?></a>
                    </td>
                    <td><?= $result->email ?></td>
                    <td><?= $result->role ?></td>
                    <td><?= $result->datehire ?></td>
                    {{-- <td>
                        <a class="btn btn-danger" href="delete/{{$result->user_id}}">Delete</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function()
    {
        $("#tabledata").DataTable();
    })
</script>
@endsection