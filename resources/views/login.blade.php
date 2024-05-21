<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clocking/Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     {{-- Ajax cdn link --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        /* body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        } */
    </style>
</head>
<body  style="background-color: rgb(226, 221, 221);">

    <div class="bg-success py-2 px-4 text-center">
            <h1 class="text-center" style="color: rgb(226, 221, 221);">
                WEB CLOCKING APPLICATION
            </h1>
    </div>


   <div class="container col-md-5 mt-4 card py-md-3"  style="border 2px solid black;border-radius: 4px;">
      @if (session()->has('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style=" font-style: italic">
        <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
     <form action="login-user" method="POST" style="background-color: rgb(226, 221, 221);" class="m-4 p-2">
        @csrf
        <h4 class="text-center px-0 card-header">Sign In</h4>
        <div class="mb-3 px-3">
            {{-- <label for="exampleFormControlInput1" class="form-label">Email</label> --}}
            <input placeholder=" Email" name="email" type="email" class="py-2 my-4 form-control" id="exampleFormControlInput1" autocomplete="off" required>
        </div>
        <div class="mb-3 px-3">
            {{-- <label for="exampleFormControlInput1" class="form-label">Password</label> --}}
            <input id='test-input' placeholder="Password" name="password" type="password" class="py-2  my-4 form-control" />
            <input type='checkbox' id='check' /> show password
        </div>
        <div class="d-flex justify-content-end mr-4">
            <button class="btn btn-success pr-4 mr-4" name="submit" style="color: rgb(226, 221, 221);">Login to Clocking</button>
        </div>
     </form>
   </div>

   <script type='text/javascript'>
        $(document).ready(function(){
            $("p").click(function(){
            $(this).hide();
            });

            $('#check').click(function(){
            $(this).is(':checked');
                $(this).is(':checked') ? $('#test-input').attr('type', 'text') : $('#test-input').attr('type', 'password');
            });
        });
   </script>
</body>
</html>
