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
  $ohipnum = $_POST['ohipnum'];

  $query = "SELECT * FROM looksafter";
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['licensenum'] == $licensenum && $row['ohipnum'] == $ohipnum) {
      die("Cannot insert: this doctor is already assigned to this patient");
    }
  }

  $query = "INSERT INTO looksafter VALUES('" . $licensenum . "','" .
    $ohipnum . "')";

  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection));
  }
  echo "<h2>Doctor assigned to patient successfully</h2>";
  mysqli_close($connection);
  ?>
</body>

</html>