<!-- Programmer Code: 41 -->
<?php

$query = "SELECT ohipnum, firstname, lastname from patient";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value ='" . $row['ohipnum'] . "'>";
  echo $row['ohipnum'] . ' | ' . $row['firstname'] . ' ' . $row['lastname'];
  echo "</option>";
}
mysqli_free_result($result);

?>