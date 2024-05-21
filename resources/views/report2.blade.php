@extends('layouts.admin')

@section('content')
 <div class="container mt-2">
    <div class="row">
        <div class="col-md-4 pt-5" style="height:;">
          <div class="bg-">
            <p class="">
                <img src="{{ asset('./images/user.png') }}" alt="" style="width: 10rem; height:10rem; border-radius:50%;">
            </p>
            <div class="">
                <?php
                date_default_timezone_set('Africa/Kampala');
                $time = date('H:i', strtotime('+0 HOURS'));
                $date = date('D, d/M/y');
                echo "<h1> $time Hrs </h1>";
                echo "<p>Date :$date </p>";
                ?>
            </div>
          </div>
        </div>
        <div class="col-md-8">
            <table class="table table-striped" id="report">
                <thead>
                    <tr class="table-primary">
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataDisplay)
                    <tr>
                       </div><td><?= $dataDisplay->date ?></td>
                       </div><td><?= $dataDisplay->time ?></td>
                       </div><td><?= $dataDisplay->out ?></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
 </div>

 <script>
    $(document).ready(function()
    {
        $("#report").DataTable();
    })
</script>
@endsection