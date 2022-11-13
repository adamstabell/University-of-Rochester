<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* Set the layout of the whole page */

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

header {
  text-align: center;
  font-size: 15px;
  border-bottom: solid grey;
}

nav {
  float: left;
  width: 25%;
  height: 500px;
  padding: 20px;
}

nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 75%;
}

section:after {
  content: "";
  display: table;
  clear: both;
}

@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>


<?php
  echo "<body>";
// Content of header
echo '<header>
  <h2>Job Application Database</h2>
  <p> -- By Fastest HK Journalist (#11)</p>
  <table style="width:80%;" align="center">
    <tr>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/office.php">Offices</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/department.php">Departments</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/recruiter.php">Recruiters</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/position.php">Positions</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/applicant.php">Applicants</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/apply_to.php">Applications</a></th>
    <th><a href="http://betaweb.csug.rochester.edu/~zxu17/adsplatform.php">AdsPlatforms</a></th>
    </tr>
  </table>
</header>';


// Content of control panel
echo "<section>
  <nav>
    <ul>
      <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
      <meta http-equiv='Content-Style-Type' content='text/css'>
      <meta http-equiv='Content-Script-Type' content='text/javascript'>
      <script type='text/JavaScript'>
      function valid_1(f) {
      !(/^[A-z0-9 \,\.\-\#\&]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z0-9 \,\.\-\#\&]/ig,''):null;
      } 
      function valid_2(f) {
      !(/^[0-9]*$/i).test(f.value)?f.value = f.value.replace(/[^0-9]/ig,''):null;
      } 
      </script>
      <form action='office.php' method='post'>
      ID: <input type='number' name='ID' min='1'><br>
      StreetAddress: <input type='text' name='StreetAddress' onkeyup='valid_1(this)' onblur='valid_1(this)'><br>
      City: <input type='text' name='City' onkeyup='valid_1(this)' onblur='valid_1(this)'><br>
      State: <select name='State'>
        <option value=''>Please Select..</option>
        <option value='AL'>Alabama</option>
        <option value='AK'>Alaska</option>
        <option value='AZ'>Arizona</option>
        <option value='AR'>Arkansas</option>
        <option value='CA'>California</option>
        <option value='CO'>Colorado</option>
        <option value='CT'>Connecticut</option>
        <option value='DE'>Delaware</option>
        <option value='DC'>District Of Columbia</option>
        <option value='FL'>Florida</option>
        <option value='GA'>Georgia</option>
        <option value='HI'>Hawaii</option>
        <option value='ID'>Idaho</option>
        <option value='IL'>Illinois</option>
        <option value='IN'>Indiana</option>
        <option value='IA'>Iowa</option>
        <option value='KS'>Kansas</option>
        <option value='KY'>Kentucky</option>
        <option value='LA'>Louisiana</option>
        <option value='ME'>Maine</option>
        <option value='MD'>Maryland</option>
        <option value='MA'>Massachusetts</option>
        <option value='MI'>Michigan</option>
        <option value='MN'>Minnesota</option>
        <option value='MS'>Mississippi</option>
        <option value='MO'>Missouri</option>
        <option value='MT'>Montana</option>
        <option value='NE'>Nebraska</option>
        <option value='NV'>Nevada</option>
        <option value='NH'>New Hampshire</option>
        <option value='NJ'>New Jersey</option>
        <option value='NM'>New Mexico</option>
        <option value='NY'>New York</option>
        <option value='NC'>North Carolina</option>
        <option value='ND'>North Dakota</option>
        <option value='OH'>Ohio</option>
        <option value='OK'>Oklahoma</option>
        <option value='OR'>Oregon</option>
        <option value='PA'>Pennsylvania</option>
        <option value='RI'>Rhode Island</option>
        <option value='SC'>South Carolina</option>
        <option value='SD'>South Dakota</option>
        <option value='TN'>Tennessee</option>
        <option value='TX'>Texas</option>
        <option value='UT'>Utah</option>
        <option value='VT'>Vermont</option>
        <option value='VA'>Virginia</option>
        <option value='WA'>Washington</option>
        <option value='WV'>West Virginia</option>
        <option value='WI'>Wisconsin</option>
        <option value='WY'>Wyoming</option>
      </select><br>
      ZipCode: <input type='text' name='ZipCode' onkeyup='valid_2(this)' onblur='valid_2(this)' maxlength='5' minlength='5'><br>
      <input type='submit' name='action' value='Insert'>
      <input type='submit' name='action' value='Delete'>
      <input type='submit' name='action' value='Search'>
      <input type='submit' name='action' value='Reset'>";

      echo "<br>
      		<br>
      		<br>";
  
    $server = "localhost";
    $user = "zxu17";
    $password = "Dvdb25iZ";
    $db = "zxu17_1";

    print "Testing connection with ".$db;

    // creating the connection

    $conn = new mysqli($server, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else print "<br>Connection OK!</br>";

    // Insert
    if ($_POST[action] == 'Insert' && $_POST[ID]) {
      $sql_insert = "INSERT INTO OFFICE
          VALUES ('$_POST[ID]', '$_POST[StreetAddress]', 
          '$_POST[City]', '$_POST[State]', '$_POST[ZipCode]')";
      echo "<br><b>Equivalent SQL query:</b><br>$sql_insert<br>";

      if ($conn->query($sql_insert) === TRUE && $conn->affected_rows == 1) {
          echo "<br><b>Values added</b>";
      } else {
          echo "<br><b>Error adding values: </b>" . $conn->error;
      }
    } elseif ($_POST[action] == 'Insert') {
      echo "<br><b>Error adding values: </b>" . "The ID field is empty!";
    }

    // Delete
    if ($_POST[action] == 'Delete') {
      $att_del = array();
      foreach ($_POST as $param_name => $param_val) {
        if ($param_val) {
          $att_del[] = "$param_name = '$param_val'";
        }
      }
      array_pop($att_del);

      if ($att_del) {
        $sql_delete = "DELETE FROM OFFICE
                WHERE ". implode(" AND ", $att_del);
        echo "<br><b>Equivalent SQL query:</b><br>$sql_delete<br>";

        if ($conn->query($sql_delete) === TRUE && $conn->affected_rows >= 1) {
              echo "<br><b>Values deleted</b>";
          } else {
              echo "<br><b>Error deleting values: </b>" . $conn->error;
          }
      } else {
        echo "<br><b>Error deleting values: </b>" . "All the fields are empty!";
      }
    }

    // Search
    if ($_POST[action] == 'Search') {
      $att_sel = array();
      foreach ($_POST as $param_name => $param_val) {
        if ($param_val) {
          $att_sel[] = "$param_name = '$param_val'";
        }
      }
      array_pop($att_sel);

      $sql_select = "SELECT * FROM OFFICE
              WHERE ". implode(" AND ", $att_sel);

      if ($att_sel) {
        echo "<br><b>Equivalent SQL query:</b><br>$sql_select<br>";
        echo "</form>
    		</ul>
  			</nav>
  			<article>";
        echo "<br style='background-color:rgb(255,0,0)'>See values below:";
        if ($result = $conn->query($sql_select)) {
            printf("Select returned %d rows.\n", $result->num_rows);
        }

        $result = $conn->query($sql_select);

        // Set styles and Column names
        echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
        </style>";

        echo "<div style='overflow-x:auto;'>
        <table border='1'>
        <tr>
        <th>ID</th>
        <th>StreetAddress</th>
        <th>City</th>
        <th>State</th>
        <th>ZipCode</th>
        </tr>";

        // Fill in data
        while($row = $result->fetch_assoc())
        {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['StreetAddress'] . "</td>";
        echo "<td>" . $row['City'] . "</td>";
        echo "<td>" . $row['State'] . "</td>";
        echo "<td>" . $row['ZipCode'] . "</td>";
        echo "<tr>";
        }
        echo "</table>";
        echo "</div>";
      } else {
        echo "<br><b>Error searching values: </b>" . "All the fields are empty!";
      }

    }

    // Normally display the table
    if ($_POST[action] == 'Search' && $att_sel) {
      
    } else {
    	echo "</form>
    		</ul>
  			</nav>
  			<article>";
      // SQL statement for creating a table
      $sql_select = "SELECT * FROM OFFICE";

      echo "See values below:";
      if ($result = $conn->query("SELECT * FROM OFFICE")) {
          printf("Select returned %d rows.\n", $result->num_rows);
      }

      $result = $conn->query($sql_select);

      // Set styles and Column names
      echo "<style>
      table {
          border-collapse: collapse;
          width: 100%;
      }

      th, td {
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}
      </style>";

      echo "<div style='overflow-x:auto;'>
      <table border='1'>
      <tr>
      <th>ID</th>
      <th>StreetAddress</th>
      <th>City</th>
      <th>State</th>
      <th>ZipCode</th>
      </tr>";

      // Fill in data
      while($row = $result->fetch_assoc())
      {
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['StreetAddress'] . "</td>";
      echo "<td>" . $row['City'] . "</td>";
      echo "<td>" . $row['State'] . "</td>";
      echo "<td>" . $row['ZipCode'] . "</td>";
      echo "<tr>";
      }
      echo "</table>";
      echo "</div>";
    }
    
  echo "</article>
</section>";

echo "</body>";
?>

