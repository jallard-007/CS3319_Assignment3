<!-- Programmer Code: 41 -->
<?php

$query = "SELECT licensenum, firstname, lastname from doctor";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value ='" . $row['licensenum'] . "'>";
  echo $row['licensenum'] . ' | ' . $row['firstname'] . ' ' . $row['lastname'];
  echo "</option>";
}
mysqli_free_result($result);

?>