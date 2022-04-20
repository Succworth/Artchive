<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin3'];
$yearEnd = $_SESSION['yearEnd3'];
$graph = sprintf("SELECT max(num_of_pieces) as count, ARTISTBEGINDATE
                  FROM artists
                  WHERE artistBeginDate < $yearEnd AND artistBeginDate > $yearBegin
                  GROUP BY artistBeginDate
                  ORDER BY artistBeginDate asc");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
oci_free_statement($parse);
 ?>
