<!-- Programmer Code: 41 -->
<html>

<head>
  <meta charset="utf=8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title></title>
</head>

<body>
  <?php
  include 'connectToDB.php';

  $numOfBeds = $_POST['numOfBeds'];
  $hoscode = $_POST['hoscode'];

  $query = "UPDATE hospital SET numofbed = '" . $numOfBeds . "' WHERE hoscode = '" . $hoscode . "'";
  $result = mysqli_query($connection, $query);

  if (!mysqli_query($connection, $query)) {
    die("Error: update failed" . mysqli_error($connection));
  }
  echo "<h2>Beds updated successfully</h2>";
  mysqli_close($connection);
  ?>
</body>

</html>