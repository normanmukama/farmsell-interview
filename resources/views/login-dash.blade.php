@extends('layouts.layout')
@section('content')
   <div class="container" style="height: 15vh;">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
   </div>
   <div class="container" >
     <div class="row mx-auto text-center col-sm-4">
        <?php
            date_default_timezone_set('Africa/Kampala');
            $time = date('H:i', strtotime('+0 HOURS'));
            $date = date('D, d/M/y');
            echo "<h1> $time Hrs </h1>";
            echo "<p>$date </p>";
        ?>
         {{-- <button class=" col-sm-2 btn btn-success justify-content-center align-items-center">Time In</button> --}}
     </div>
   </div>
   <div class="container d-flex justify-content-center">
    <form action="login-user2" method="POST">
        @csrf
            <input type="hidden" name="email" value="{{$login_user->email}}">
            <input type="hidden" name="password" value="{{$login_user->password}}">
        <div class="row d-flex justify-content-center align-items-center" style="max-width: 6rem;">
            <button type="submit" name="submit" class="btn btn-success">{{ $time_btn }}</button>
         </div>
    </form>
   </div>

   @if(isset($redirectTo))
    <script>window.location = "{{ url($redirectTo) }}";</script>
   @endif

@endsection
