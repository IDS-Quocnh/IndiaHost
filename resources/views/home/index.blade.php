@extends('layouts.atllayout', ['title' => 'Dashboard', 'menukey' => ''])

@section('content')
<div class="row" style="margin-bottom : 15px">
        <div class="col-sm-12 col-lg-6">
            <div class="card shadow-sm" style="min-height: 130px;">
                <h5 class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col">Device Location</div>
                    </div>
                </h5>
                <div class="card-body">
                    <center>
                        <div>
                            <canvas id="viewport" style="height:40vh; width:40vw"></canvas>
                        </div>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6">
            <div class="card shadow-sm" style="min-height: 130px;">
                <h5 class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col">User Location</div>
                    </div>
                </h5>
                <div class="card-body">
                    <center>
                        <div >
                            <canvas id="viewport-user" style="height:40vh; width:40vw"></canvas>
                        </div>
                    </center>
                </div>
            </div>
        </div>
</div>

<div class="row" style="margin-bottom : 15px">
        <div class="col-sm-6 col-lg-3 col-6">
            <div class="card shadow-sm" style="min-height: 130px;">
                <h5 class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col">Infrastructure Stats</div>
                    </div>
                </h5>
                <div class="card-body">
                    <center>
                        <div>
                            <table class="table table-hover m-0">
                                <tbody>
                                <tr>
                                    <th scope="row">Datacenter</th>
                                    <td class="text-right">{{$noDataCenter}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Physical Host</th>
                                    <td class="text-right">{{$noPhysicalHost}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Rack</th>
                                    <td class="text-right">{{$noRack}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>

</div>



<script>
var canvas = document.getElementById("viewport");
var ctx = canvas.getContext("2d");
var labels = [<?php echo htmlspecialchars_decode($labelString); ?>]
var dataList =  [<?php echo htmlspecialchars_decode($dataString); ?>];
var data= {
      labels: labels,
      datasets: [{
          label: false,
          data: dataList,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
      }]
  };
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: "rgb(0,0,0,0.7)",
                }
            }],
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: "rgb(0,0,0,0.7)",
                }
            }]
        }
    }
});


var canvasUser = document.getElementById("viewport-user");
var ctxUser = canvasUser.getContext("2d");
var labelsUser = [<?php echo htmlspecialchars_decode($labelUserString); ?>]
var dataListUser =  [<?php echo htmlspecialchars_decode($dataUserString); ?>];
var dataUser= {
      labels: labelsUser,
      datasets: [{
          label: false,
          data: dataListUser,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
      }]
  };
var myChartUser = new Chart(ctxUser, {
    type: 'doughnut',
    data: dataUser,
    options: {
        legend: {
            labels: {
                fontColor: "rgb(0,0,0,0.7)"
            }

        },
    }
});

</script>
@endsection
