<hr>
<p>
    <a href="index.php?act=r_d3" class="btn btn-info"> รายงานยอดขายรายวัน </a>
    <a href="index.php?act=r_d2" class="btn btn-info"> รายงานยอดขายรายเดือน </a>
    <a href="index.php" class="btn btn-info"> รายงานยอดขายรายปี </a>
    <a href="index.php?act=stock1" class="btn btn-info"> รายงานสต๊อก-เครื่องดื่ม </a>
    <a href="index.php?act=stock2" class="btn btn-info"> รายงานสต๊อก-เมนูอร่อย </a>
</p>

<html>
<head>
    <meta charset="utf-8">
</head>

<?php
//sum order by day
$queryd = "
SELECT order_total, SUM(order_total) AS stotald,
DATE_FORMAT(order_date_rev, '%d-%m-%Y') AS order_date_rev
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date_rev, '%d%')
ORDER BY DATE_FORMAT(order_date_rev, '%Y-%m-%d') DESC ";
$result = mysqli_query($con, $queryd);
$resultchart = mysqli_query($con, $queryd);

//for chart
$order_date_rev = array();
$stotald = array();

while($rs = mysqli_fetch_array($resultchart)){ 
$order_date_rev[] = "\"".$rs['order_date_rev']."\""; 
$stotald[] = "\"".$rs['stotald']."\""; 
}
$order_date_rev = implode(",", $order_date_rev); 
$stotald = implode(",", $stotald); 
?>

<?php mysqli_close($con);?>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">

<canvas id="myChart" width="800px" height="300px"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $order_date_rev;?>
    
        ],
        datasets: [{
            label: 'รายงานภาพรวม แยกตามวัน (บาท)',
            data: [<?php echo $stotald;?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
</script>
</p>
</html> -->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- call js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-12"> <br>
        <h4>รายงานในรูปแบบกราฟเส้น</h4>
            <!--devbanban.com-->
            <canvas id="myChart" width="800px" height="300px"></canvas>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [<?php echo $order_date_rev;?>
                    ],
                    datasets: [{
                        label: 'รายงานภาพรวม แยกตามปี (บาท)',
                        data: [<?php echo $stotald;?>
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
            </script>  
        </div>
    </div>
    </div>
</body>
</html>