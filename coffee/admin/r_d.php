<?php
$queryd = "
SELECT SUM(order_total) AS stotal,
DATE_FORMAT(order_date, '%d-%m-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%d%')";
$resultd = mysqli_query($con, $queryd);

$querym = "
SELECT SUM(order_total) AS stotalm,
DATE_FORMAT(order_date, '%M-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%m%')";
$resultm = mysqli_query($con, $querym);


$queryy = "
SELECT SUM(order_total) AS stotaly,
DATE_FORMAT(order_date, '%d-%m-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%Y%')";
$resulty = mysqli_query($con, $queryy);
?>
<h4>รายงานแยกตามวัน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">ว/ด/ป</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultd)) { ?>
    <tr>
        <td align="center">
            <?php echo date('d-M-Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotal'],2);?></td>
    </tr>
    
    <?php
    $atd += $row['stotal'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atd,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามเดือน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">เดือน</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultm)) { ?>
    <tr>
        <td align="center">
            <?php echo date('M-Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotalm'],2);?></td>
    </tr>
    
    <?php
    $atm += $row['stotalm'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atm,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามปี</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">ปี</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resulty)) { ?>
    <tr>
        <td align="center">
            <?php echo date('Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotaly'],2);?></td>
    </tr>
    
    <?php
    $aty += $row['stotaly'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($aty,2);?></td>
    </tr>
</table>
