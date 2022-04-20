<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>ChartJS - Bargraph</title>
  <style type="text/css">
    #chart-container {
      width: 2048px;
      height: auto;
    }
  </style>
<body>
  <div id="chart-container">
    <canvas id="mycanvas"></canvas>
  </div>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="chart.min.js"></script>
  <script type="text/javascript" src="Question1.js"></script>

  <form action="Question1Interactive.php" method="get">
    Starting From:
    <input type="number" name="yearBegin">
    <input type=submit>
    <br>
    Ending At:
    <input type="number" name="yearEnd">
    <input type=submit>
  </form>
  <hr>
  <br>
  <br>
  <a href="Question1.php">
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
  $yearBegin = filterBegin("yearBegin");
  $yearEnd = filterEnd("yearEnd");
  $_SESSION['yearBegin'] = $yearBegin;
  $_SESSION['yearEnd'] = $yearEnd;
  ?>
</body>
</html>
