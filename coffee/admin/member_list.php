<?php
$query = "
SELECT * 
FROM tbl_member 
WHERE m_level IN ('Member','Ban') 
ORDER BY m_id DESC";
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='5%'>ลำดับ</th>
      <th width='7%'>รูปภาพ</th>
      <th width='10%'>สถานะ</th>
      <th width='40%'>ชื่อ-สกุล</th>
      <th width='10%'>สถานะ</th>
      <th width='10%'>รหัสผ่าน</th>
      <th width='5%'>แก้ไข</th>
      <th width='5%'>ระงับ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>"."<img src='../people_img/".$row['m_img']."' width='100%'>"."</td>";
    echo "<td>" .$row["m_username"]."</td> ";
    echo "<td>" .$row["m_firstname"].$row["m_name"] 
    .' '.$row["m_lastname"] 
    .'<br>'
    .' ที่อยู่ '.$row["m_address"] 
    .'<br>'
    .' เบอร์  '.$row["m_phone"] 
    .' อีเมล  '.$row["m_email"] 
    . "</td> ";
    echo "<td>";

        $m_level= $row['m_level'];
        if($m_level=='Member'){
          echo 'ปกติ';
        }elseif($m_level=='Ban'){
          echo '<font color="red">';
          echo 'ระงับ';
          echo '</font>';
        }
    echo "</td> ";
    echo "<td align='center'><a href='member.php?act=rwd&ID=$row[0]' class='btn btn-primary btn-xs'>เปลี่ยน</a></td> ";
    echo "<td align='center'><a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td align='center'>";
  if($m_level=='Ban'){}else{
  echo "<a href='member_del_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยัน !!!')\" class='btn btn-danger btn-xs'>ระงับ</a>";
    }
  echo "</td> ";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>