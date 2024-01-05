<?php
$con = mysqli_connect("localhost","root","","bangiay");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_trademark=mysqli_query($con, "SELECT * FROM tbl_thuonghieu ORDER BY id DESC");
while($row_result = mysqli_fetch_array($sql_trademark)){
  echo '<div class="item"><img src="img/'.$row_result["img"].'" alt="Owl Image"> </div>';
}
?>