<!-- Programmer Code: 41 -->
<html>

<head>
  <meta charset="utf=8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h1>Doctor Info:</h1>
  <?php
  include 'connectToDB.php';

  $orderType = $_POST['orderingType'];
  $orderDirec = $_POST['orderingDirec'];
  $specialty = $_POST['filterSpecialty'];
  $query = "SELECT * FROM doctor";
  if ($specialty != '1') {
    $query = $query . " WHERE speciality = \"" . $specialty . '"';
  }
  $query = $query . " ORDER BY " . $orderType . " " . $orderDirec;
  //echo '<p>'.$orderDirec.'</p>';
//echo '<p>'.$query.'</p>';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("database query failed");
  }

  echo '<table id="docInfo">
  <tr>
    <th>License Num</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>License Date</th>
    <th>Birthdate</th>
    <th>Hospital Working From</th>
    <th>Specialty</th>
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