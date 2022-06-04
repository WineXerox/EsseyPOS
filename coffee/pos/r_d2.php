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
//sum order by month
$querym = "
SELECT order_total, SUM(order_total) AS stotalm,
DATE_FORMAT(order_date_rev, '%m') AS order_date_rev
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date_rev, '%m%')";
$result = mysqli_query($con, $querym);
$resultchart = mysqli_query($con, $querym);  

//for chart
$order_date_rev = array();
$stotalm = array();

while($rs = mysqli_fetch_array($resultchart)){ 
$order_date_rev[] = "\"".$rs['order_date_rev']."\""; 
$stotalm[] = "\"".$rs['stotalm']."\""; 
}
$order_date_rev = implode(",", $order_date_rev); 
$stotalm = implode(",", $stotalm); 

?>
<?php mysqli_close($con);?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
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
            label: 'รายงานภาพรวม แยกตามเดือน (บาท)',
            data: [<?php echo $stotalm;?>
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

</html>