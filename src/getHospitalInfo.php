<!-- Programmer Code: 41 -->
<html>

<head>
  <meta charset="utf=8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h1>Hospital Info:</h1>
  <?php
  include 'connectToDB.php';
  $hoscode = $_POST['hoscode'];

  $query = "SELECT hospital.hosname, hospital.city, hospital.prov, hospital.numofbed,
  doctor.firstname, doctor.lastname FROM hospital INNER JOIN doctor
  ON doctor.licensenum = hospital.headdoc WHERE hospital.hoscode = '" . $hoscode . "'";

  $result = mysqli_query($connection, $query);
  if (!$result) {
    echo '<p>' . $query . '</p>';
    die("database query failed");
  }

  echo '<table>
  <tr>
    <th>Hospital Name</th>
    <th>City</th>
    <th>Province</th>
    <th>Number of Beds</th>
    <th>Head Doc First Name</th>
    <th>Head Doc Last Name</th>
  </tr>';

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $data) {
      echo '<td>' . $data . '</td>';
    }
    echo '</tr>';
  }

  echo '</table><br>';

  $query = "SELECT doctor.firstname, doctor.lastname FROM hospital INNER JOIN doctor
  ON doctor.hosworksat = hospital.hoscode WHERE hospital.hoscode = '" . $hoscode . "'";

  $result = mysqli_query($connection, $query);
  if (!$result) {
    echo '<p>' . $query . '</p>';
    die("database query failed");
  }

  echo '<h3>Doctors working at this hospital:</h3>';
  echo '<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
  </tr>';

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $data) {
      echo '<td>' . $data . '</td>';
    }
    echo '</tr>';
  }

  echo '</table>';

  mysqli_free_result($result);

  mysqli_close($connection);

  ?>
</body>

</html>