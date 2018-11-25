@extends('layouts.app')

@section('content')


<div class="card w-45" style="margin:2px">
    <div class="card-body">
        <div class="col md-6"><canvas id="myChart" width="400" height="280"></canvas></div>
    </div>
</div>
<div class="card w-45"style="margin:2px">
    <div class="card-body">
        <div class="col md-6"><canvas id="myChart2" width="400" height="280"></canvas></div>
    </div>
</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php foreach($data8 as $v) echo '"'.substr($v->taken_at,0,13).'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 days',
            data: [<?php foreach($data8 as $v) echo '"'.$v->air_quality_index.'",';?>],
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

var ctx2 = document.getElementById("myChart2").getContext('2d');

var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [<?php foreach($d30 as $v) echo '"'.substr($v->taken_at,0,15).'",';?>],
        datasets: [{
            label: 'Air Quality Index in last 8 months',
            data: [<?php foreach($d30 as $v) echo '"'.$v->air_quality_index.'",';?>],
            
            borderColor: [
                'rgba(91, 112, 101, 1)',
                
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