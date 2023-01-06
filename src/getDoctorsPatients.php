<!-- Programmer Code: 41 -->
<html>

<head>
  <meta charset="utf=8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
  include 'connectToDB.php';
  $licensenum = $_POST['licensenum'];
  echo '<h1>Patient info for doctor ' . $licensenum . ':</h1>';

  $query = "SELECT patient.firstname, patient.lastname, patient.ohipnum FROM looksafter INNER JOIN patient ON looksafter.ohipnum=patient.ohipnum WHERE
  looksafter.licensenum = '" . $licensenum . "'";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("database query failed");
  }
  if (mysqli_num_rows($result) == 0) {
    die("This doctor is not treating any patients");
  }

  echo '<table id="docInfo">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>OHIP</th>
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