<!DOCTYPE html>
<html>
<head>
    <title>Custom Login And Registration in Laravel 8</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
        .a-tag{
            text-align: none;
            color: white;
            /* text-decoration: underline dashed red; */
            text-decoration: none;
        }
        .a-tag:hover{
            text-align: none;
            color: paleturquoise;
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
            <li><a class="a-tag" href="{{route( 'view-user-info')}}">Report</a></li>
            <li><a class="a-tag" href="{{route( 'login')}}">Log Out</a></li>
        </div>
       </div>

@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</body>
</html>

