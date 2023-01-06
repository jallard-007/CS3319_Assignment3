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

  $licensenum = $_POST['licensenum'];
  $query = "SELECT DISTINCT licensenum FROM looksafter";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Error: query failed" . mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['licensenum'] == $licensenum) {
      die("Cannot delete: this doctor is looking after a patient");
    }
  }

  $query = "DELETE FROM doctor WHERE licensenum = '" . $licensenum . "'";

  if (!mysqli_query($connection, $query)) {
    if (mysqli_errno($connection) == 1451) {
      die("Cannot delete: this doctor is the head of a hospital");
    }
    die("Error: remove failed " . mysqli_error($connection));
  }

  echo "<h2>Doctor removed successfully</h2>";
  mysqli_close($connection);
  ?>
</body>

</html>