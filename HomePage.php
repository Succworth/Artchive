<!DOCTYPE html>
<html lang="en" dir="User">
  <head>
    <meta charset="utf-8">
    <title>Artchive</title>
  </head>
  <center>
  <body>
    <?php $username = "c.giordano";                  // Use your username
    $password2 = "zGneVdKkuq9zIZQJAWxQw1SB";             // and your password
    $database = "oracle.cise.ufl.edu/orcl";   // and the connect string to connect to your database
    $c = oci_connect($username, $password2, $database);
    ?>
    <h1>Welcome to the Artchive!</h1>
    <hr>
    <a href="Question1.php">
         <input type="button" value = "What is the most popular medium by year for artworks?">
    </a>
    <br>
    <br>
    <a href="Question2.php">
         <input type="button" value = "How many artists in each country were born in each year?">
    </a>
    <br>
    <br>
    <a href="Question3.php">
         <input type="button" value = "Who would go on to create the most pieces by birth year?">
    </a>
    <br>
    <br>
    <a href="Question4.php">
         <input type="button" value = "Which artwork took the longest time to complete and when was it made?">
    </a>
    <br>
    <br>
    <a href="Question5.php">
         <input type="button" value = "What is the age of the oldest and 2nd oldest artwork received each year and in which country was it made or found?">
    </a>
    <br>
    <br>
    <a href="Question6.php">
         <input type="button" value = "What is the average age of artists of each decade when they created artwork?">
    </a>
    <br>
    <br>
    <input type="button" onclick="countTuples()" value = "How many tuples are there in each table?">

    <!-- Grabbing artist tuple count -->
    <?php
    $query = "SELECT count(*) FROM Artists";
    $stid = oci_parse($c, $query);
    $r = oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
      foreach ($row as $item) {
          $artist = $item;
      }
    }
    oci_free_statement($stid);
     ?>

     <!-- Grabbing artworks tuple count -->
     <?php
     $query = "SELECT count(*) FROM Artworks";
     $stid = oci_parse($c, $query);
     $r = oci_execute($stid);
     while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
       foreach ($row as $item) {
           $artwork = $item;
       }
     }
     oci_free_statement($stid);
      ?>

      <!-- Grabbing make tuple count -->
      <?php
      $query = "SELECT count(*) FROM Make";
      $stid = oci_parse($c, $query);
      $r = oci_execute($stid);
      while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        foreach ($row as $item) {
            $make = $item;
        }
      }
      oci_free_statement($stid);
       ?>

    <script>
      function countTuples() {
        var artist = '<?php echo $artist; ?>';
        var artwork = '<?php echo $artwork; ?>';
        var make = '<?php echo $make; ?>';
        alert("Number of tuples in Artists: " + artist
              +"\nNumber of tuples in Artworks: " + artwork
              +"\nNumber of tuples in Make: " + make);
      }
    </script>

    <?php
    /*
    $query = "SELECT count(*) FROM Artists";
    $stid = oci_parse($c, $query);
    $r = oci_execute($stid);
    print "<table border='1'>\n";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print "<tr>\n";
      foreach ($row as $item) {
          print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
          $num = $item;
      }
      print "</tr>\n";
    }
    print "</table>\n";
    echo $num;
    oci_free_statement($stid); */
     ?>
  </body>
  </center>
</html>
