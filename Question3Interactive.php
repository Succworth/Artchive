<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Question 3 Interative</title>
  <style type="text/css">
    #chart-container2 {
      width: 2048px;
      height: auto;
    }
  </style>
<body>
  <div id="chart-container2">
    <canvas id="mycanvas2"></canvas>
  </div>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="chart.min.js"></script>
  <script type="text/javascript" src="Question3.js"></script>

  <form action="Question3Interactive.php" method="get">
    Starting From:
    <input type="number" name="yearBegin3">
    <input type=submit>
    <br>
    Ending At:
    <input type="number" name="yearEnd3">
  </form>
  <hr>
  <br>
  <br>
  <a href="Question3.php">
    <input type=button value="Back">
  </a>

  <?php

  session_start();
  //$_SESSION['yearBegin'] = -9999999;
  //$_SESSION['yearEnd'] = 2022;
  function filterBegin($key) {
    return isset($_GET[$key]) ? $_GET[$key] : -9999999;
  }
  function filterEnd($key) {
    return isset($_GET[$key]) ? $_GET[$key] : 2022;
  }
  function filterCountry($key) {
    return isset($_GET[$key]) ? $_GET[$key] : ' ';
  }
  $yearBegin = filterBegin("yearBegin3");
  $yearEnd = filterEnd("yearEnd3");
  $country = filterCountry("country3");
  $_SESSION['yearBegin3'] = $yearBegin;
  $_SESSION['yearEnd3'] = $yearEnd;
  $_SESSION['country3'] = $country;
  ?>
</body>
</html>
