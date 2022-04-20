<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Question 2 Interative</title>
  <style type="text/css">
    #chart-container2 {
      width: 2048px;
      height: auto;
    }
  </style>
    <link rel ="stylesheet" href="/Question1Part1-220313-221139/report.css">

<body>
  <div id="chart-container2">
    <canvas id="mycanvas2"></canvas>
  </div>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="chart.min.js"></script>
  <script type="text/javascript" src="Question2.js"></script>

  <form action="Question2Interactive.php" method="get">
    Starting From:
    <input type="number" name="yearBegin2">
    <input type=submit>
    <br>
    Ending At:
    <input type="number" name="yearEnd2">
  </form>
  <hr>
  <br>
  <br>
  <a href="Question2.php">
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
  $yearBegin = filterBegin("yearBegin2");
  $yearEnd = filterEnd("yearEnd2");
  $_SESSION['yearBegin2'] = $yearBegin;
  $_SESSION['yearEnd2'] = $yearEnd;
  ?>
</body>
</html>
