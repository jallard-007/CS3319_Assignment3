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
  $query = "SELECT licensenum FROM doctor";
  $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['licensenum'] == $licensenum) {
      die("Cannot insert: a doctor with that license number already exists");
    }
  }

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $licensedate = $_POST['licensedate'];
  $birthdate = $_POST['birthdate'];
  $hospitalworks = $_POST['hospitalworks'];
  $specialty = $_POST['specialty'];

  $query = "INSERT INTO doctor VALUES('" . $licensenum . "','" .
    $firstname . "','" . $lastname . "','" . $licensedate . "','" .
    $birthdate . "','" . $hospitalworks . "','" . $specialty . "')";

  if (!mysqli_query($connection, $query)) {
    die("Error: insert failed" . mysqli_error($connection));
  }
  echo "<h2>Doctor added successfully</h2>";
  mysqli_close($connection);
  ?>
</body>

</html>