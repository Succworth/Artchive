<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin2'];
$yearEnd = $_SESSION['yearEnd2'];
$graph = sprintf("SELECT artistBeginDate, artistDisplayName, num_of_pieces as count
                  FROM Artists
                  WHERE artistBeginDate < $yearEnd AND artistBeginDate > $yearBegin
                  AND (artistBeginDate, num_of_pieces) in (SELECT a.artistBeginDate, max(a.num_of_pieces)
                                                          FROM Artists a
                                                          GROUP BY a.artistBeginDate)
                  ORDER BY artistBeginDate asc");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
 ?>
