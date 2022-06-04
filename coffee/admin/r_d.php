<html>
<head>
    <meta charset="utf-8">
</head>
<?php
//sum order by year
$queryy = "
SELECT SUM(order_total) AS stotaly, 
DATE_FORMAT(order_date_rev, '%Y') AS order_date_rev
FROM tbl_orders 
GROUP BY DATE_FORMAT(order_date_rev, '%Y%')";
$result = mysqli_query($con, $queryy);
$resultchart = mysqli_query($con, $queryy);  

//for chart
$order_date_rev = array();
$stotaly = array();

while($rs = mysqli_fetch_array($resultchart)){ 
$order_date_rev[] = "\"".$rs['order_date_rev']."\""; 
$stotaly[] = "\"".$rs['stotaly']."\""; 
}
$order_date_rev = implode(",", $order_date_rev); 
$stotaly = implode(",", $stotaly); 

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
            label: 'รายงานภาพรวม แยกตามปี (บาท)',
            data: [<?php echo $stotaly;?>
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