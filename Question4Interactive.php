<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Question 4 Interative</title>
  <style type="text/css">
    #chart-container3 {
      width: 2048px;
      height: auto;
    }
  </style>
<body>
  <div id="chart-container3">
    <canvas id="mycanvas2"></canvas>
  </div>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="chart.min.js"></script>
  <script type="text/javascript" src="Question4.js"></script>

  <form action="Question4Interactive.php" method="get">
    Starting From:
    <input type="number" name="yearBegin4">
    <input type=submit>
    <br>
    Ending At:
    <input type="number" name="yearEnd4">
  </form>
  <hr>
  <br>
  <br>
  <a href="Question4.php">
      <button class ="btn btnQ1">Back</button>
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
  $yearBegin = filterBegin("yearBegin4");
  $yearEnd = filterEnd("yearEnd4");
  $_SESSION['yearBegin4'] = $yearBegin;
  $_SESSION['yearEnd4'] = $yearEnd;
  ?>
</body>
</html>
