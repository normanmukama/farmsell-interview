<!DOCTYPE html>
<html>
<head>
    <title>Custom Login And Registration in Laravel 8</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- //link for DataTable .js  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
    </style>
</head>
<body>
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
            <li>Users</li>
            <li>Log Out</li>
        </div>
       </div>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

{{-- //link for DataTable.js  --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</body>
</html>
