<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
//$yearBegin = $_SESSION['yearBegin2'];
//$yearEnd = $_SESSION['yearEnd2'];
$graph = sprintf("SELECT max(num_of_pieces) as count, ARTISTBEGINDATE
                  FROM artists
                  GROUP BY artistBeginDate");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
oci_free_statement($parse);
 ?>
