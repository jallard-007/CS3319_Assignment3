<!-- Programmer Code: 41 -->
<?php

$query = "SELECT DISTINCT speciality from doctor";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value ='" . $row["speciality"] . "'>";
  echo $row["speciality"];
  echo "</option>";
}
mysqli_free_result($result);
?>