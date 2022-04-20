<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin'];
$yearEnd = $_SESSION['yearEnd'];
$graph = sprintf("WITH rws AS (
                  SELECT objectEndDate, artMedium as Medium, count(Artworks.artMedium) as count, row_number() over(
                  PARTITION BY objectEndDate
                  ORDER BY count(Artworks.artMedium) desc) rn
                  FROM Artworks
                  WHERE objectEndDate < $yearEnd AND objectEndDate > $yearBegin
                  GROUP BY objectEndDate, Artworks.artMedium
                )
                SELECT * FROM rws
                WHERE rn <= 1");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
 ?>
