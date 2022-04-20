<!DOCTYPE html>
<html lang="en" dir="User">
  <head>
    <meta charset="utf-8">
    <title>Artchive</title>
    <link rel ="stylesheet" href="style.css">
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
    <div class="container">
    <a href="Question1.php">
        <button class ="btn btnQ1">What is the most popular medium by year for artworks?</button>
    </a>
    <br>
    <br>
    <a href="Question2.php">
        <button class ="btn btnQ1">How many artists in each country were born in each year?</button>
    </a>
    <br>
    <br>
    <a href="Question3.php">
        <button class ="btn btnQ1">Who would go on to create the most pieces by birth year?</button>
    </a>
    <br>
    <br>
    <a href="Question4.php">
        <button class ="btn btnQ1">Which artwork took the longest time to complete and when was it made?</button>
    </a>
    <br>
    <br>
    <a href="Question5.php">
        <button class ="btn btnQ1">What is the age of the oldest and 2nd oldest artwork received each year and in which country was it made or found?</button>
    </a>
    <br>
    <br>
    <a href="Question6.php">
        <button class ="btn btnQ1">What is the average age of artists of each decade when they created artwork?</button>
    </a>
    <br>
    <br>
        <button class ="btn btnQ1">How many tuples are there in each table?</button>
    </div>
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
  </body>
  </center>
</html>
