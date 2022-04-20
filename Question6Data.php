<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin6'];
$yearEnd = $_SESSION['yearEnd6'];
$graph = sprintf("SELECT objectEndDate, artistNationality, avg(age_of_artist) as age
                  FROM Make, Artworks, Artists
                  WHERE Make.objID = Artworks.objID
                  AND age_of_artist > 0 AND age_of_artist < 100
                  AND Artists.artistDisplayName = Make.artistDisplayName
                  AND objectEndDate < $yearEnd AND objectEndDate > $yearBegin
                  GROUP BY objectEndDate, artistNationality
                  ORDER BY objectEndDate asc");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
oci_free_statement($parse);
 ?>
