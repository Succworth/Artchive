<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Question 6 Interative</title>
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
  <script type="text/javascript" src="Question6.js"></script>

  <form action="Question6Interactive.php" method="get">
    Starting From:
    <input type="number" name="yearBegin6">
    <input type=submit>
    <br>
    Ending At:
    <input type="number" name="yearEnd6">
  </form>
  <hr>
  <br>
  <br>
  <a href="Question6.php">
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
  $yearBegin = filterBegin("yearBegin6");
  $yearEnd = filterEnd("yearEnd6");
  $_SESSION['yearBegin6'] = $yearBegin;
  $_SESSION['yearEnd6'] = $yearEnd;
  ?>
</body>
</html>
