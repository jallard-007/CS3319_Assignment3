<!-- Programmer Code: 41 -->
<html>

<head>
  <meta charset="utf-8">
  <title>Hospital Information</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <script>
  function confirmSubmit() {
    return confirm("Are you sure you wish to delete this doctor?")
  }
  </script>
  <?php
  include 'connectToDB.php';
  ?>

  <h1>Get Doctors:</h1>

  <form action="getDoctorsInfo.php" method="post">
    <p>Choose how you want to order the list:</p>
    <input type="radio" name="orderingType" value="lastname" id="lastname" checked="true" />
    <label for="lastname">Last Name</label>
    <input type="radio" name="orderingType" value="birthdate" id="birthdate" />
    <label for="birthdate">Birthdate</label>
    <br>
    <input type="radio" name="orderingDirec" id="desc" value="DESC" checked="true" />
    <label for="desc">Descending</label>
    <input type="radio" name="orderingDirec" id="asce" value="ASC" />
    <label for="asce">Ascending</label>
    <p>Filter doctor by specialty:</p>
    <select name="filterSpecialty">
      <option value='1'>No Filter</option>
      <?php
      include 'getSpecialtyOptions.php';
      ?>
    </select>
    <br>
    <button type="submit">Get Data</button>
  </form>

  <h1>Insert Doctor:</h1>

  <form action="insertDoctor.php" method="post">
    <input type="text" name="licensenum" id="licensenum" required />
    <label for="licensenum">License Num</label><br>
    <input type="text" name="firstname" id="firstname" required />
    <label for="firstname">First Name</label><br>
    <input type="text" name="lastname" id="lastname" required />
    <label for="lastname">Last Name</label><br>
    <input type="date" name="licensedate" id="licensedate" required />
    <label for="licensedate">License Date</label><br>
    <input type="date" name="birthdate" id="birthdate" required />
    <label for="birthdate">Birthdate</label><br>
    <select name="hospitalworks">
      <?php
      include 'getHospitalOptions.php';
      ?>
    </select>
    <label for="hospitalworks">Hospital works from</label><br>
    <input type="text" name="specialty" id="specialty" required />
    <label for="specialty">Specialty</label><br>
    <button type="submit">Add Doctor</button>
  </form>

  <h1>Delete Doctor:</h1>

  <form action="deleteDoctor.php" method="post">
    <select name="licensenum">
      <?php
      include 'getDoctorOptions.php';
      ?>
    </select>
    <button type="submit" onClick='return confirmSubmit()'>Delete Doctor</button>
  </form>

  <h1>Assign Patient to Doctor:</h1>

  <form action="assignPatientDoctor.php" method="post">
    <select name="ohipnum" id="patientAssign">
      <?php
      include 'getPatientOptions.php';
      ?>
    </select>
    <label for="patientAssign">Patient</label><br>
    <select name="licensenum" id="doctorAssign">
      <?php
      include 'getDoctorOptions.php';
      ?>
    </select>
    <label for="doctorAssign">Doctor</label><br>
    <button type="submit">Assign</button>
  </form>

  <h1>Get Doctor's Patients:</h1>

  <form action="getDoctorsPatients.php" method="post">
    <select name="licensenum">
      <?php
      include 'getDoctorOptions.php';
      ?>
    </select>
    <button type="submit">Get Doctor's Patients</button>
  </form>

  <h1>Get Hospital Info:</h1>

  <form action="getHospitalInfo.php" method="post">
    <select name="hoscode">
      <?php
      include 'getHospitalOptions.php';
      ?>
    </select>
    <button type="submit">Get Hospital Info</button>
  </form>

  <h1>Update Number of Beds at a Hospital:</h1>

  <form action="updateHospitalBeds.php" method="post">
    <input name="numOfBeds" id="numOfBeds" type="number" max="32767" min="0" required />
    <label for="numOfBeds">New Number of Beds</label><br>
    <select name="hoscode" id="bedUpdateHos">
      <?php
      include 'getHospitalOptions.php';
      ?>
    </select>
    <label for="hosbedUpdateHoscode">Hospital to Update</label><br>
    <button type="submit">Update Bed Count</button>
  </form>



  <?php
  mysqli_close($connection);
  ?>

</body>

</html>