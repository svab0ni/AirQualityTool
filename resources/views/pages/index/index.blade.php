@extends('layouts.app')

@section('overview')
    @include('pages.table.table')
@stop

@section('content')

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Chart for the last 8 hours
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body " style="width:70%">
        <canvas id="myChart" width="400" height="280"></canvas>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Chart for the average index of past 8 days
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body" style="width:70%">
        <canvas id="myChartDays" width="400" height="280"></canvas>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Chart for the past 8 weeks
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body" style="width:70%">
            <canvas id="myChartWeek" width="400" height="280"></canvas>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Chart for the average index of last 8 months
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body" style="width:70%">
        <canvas id="myChart1" width="400" height="280">
        </div>
    </div>
  </div>
</div>





<script>

var ctxmon = document.getElementById("myChartWeek").getContext('2d');
var myChartWeek = new Chart(ctxmon, {
    type: 'bar',
    data: {
        labels: [<?php foreach($weeklyData as $v)  echo '"'.substr($v->taken_at,0,11).'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 weeks',
            data: [<?php foreach($weeklyData as $v) echo '"'.$v->air_quality_index_average.'",';?>],
            backgroundColor: [
                'rgba(249, 186, 50, 0.7)',
                'rgba(66, 110, 134, 0.7)',
                'rgba(47, 49, 49, 0.7)',
                'rgba(91, 112, 101, 0.7)',
                'rgba(249, 186, 50, 0.7)',
                'rgba(66, 110, 134, 0.7)',
                'rgba(47, 49, 49, 0.7)',
                'rgba(91, 112, 101, 0.7)',
            ],
            borderColor: [
                'rgba(249, 186, 50, 1)',
                'rgba(66, 110, 134, 1)',
                'rgba(47, 49, 49, 1)',
                'rgba(91, 112, 101, 1)',
                'rgba(249, 186, 50, 1)',
                'rgba(66, 110, 134, 1)',
                'rgba(47, 49, 49, 1)',
                'rgba(91, 112, 101, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php foreach($dailyData as $v) echo '"'.substr($v->taken_at, 11,15).'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 hours',
            data: [<?php foreach($dailyData as $v) echo '"'.$v->air_quality_index.'",';?>],
            backgroundColor: [
                'rgba(249, 186, 50, 0.7)',
                'rgba(66, 110, 134, 0.7)',
                'rgba(47, 49, 49, 0.7)',
                'rgba(91, 112, 101, 0.7)',
                'rgba(249, 186, 50, 0.7)',
                'rgba(66, 110, 134, 0.7)',
                'rgba(47, 49, 49, 0.7)',
                'rgba(91, 112, 101, 0.7)',
            ],
            borderColor: [
                'rgba(249, 186, 50, 1)',
                'rgba(66, 110, 134, 1)',
                'rgba(47, 49, 49, 1)',
                'rgba(91, 112, 101, 1)',
                'rgba(249, 186, 50, 1)',
                'rgba(66, 110, 134, 1)',
                'rgba(47, 49, 49, 1)',
                'rgba(91, 112, 101, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx1 = document.getElementById("myChart1").getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: [<?php foreach($monthlyData as $v) echo '"'.$v->taken_at.'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 months',
            data: [<?php foreach($monthlyData as $v) echo '"'.$v->air_quality_index_average.'",';?>],
            
            borderColor: [
                'rgba(66, 110, 134, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes:[{display:false}],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctxDays = document.getElementById("myChartDays").getContext('2d');
var myChartDays = new Chart(ctxDays, {
    type: 'line',
    data: {
        labels: [<?php foreach($dailyData as $v) echo '"'.$v->taken_at.'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 days',
            data: [<?php foreach($dailyData as $v) echo '"'.$v->air_quality_index.'",';?>],
            
            borderColor: [
                'rgba(66, 110, 134, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes:[{display:false}],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


</script>

<br>
<br>
@stop