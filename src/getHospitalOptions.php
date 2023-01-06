<!-- Programmer Code: 41 -->
<?php

$query = "SELECT hoscode, hosname from hospital";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value ='" . $row['hoscode'] . "'>";
  echo $row['hoscode'] . ' | ' . $row['hosname'];
  echo "</option>";
}
mysqli_free_result($result);

?>