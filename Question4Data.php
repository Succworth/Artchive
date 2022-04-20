<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin4'];
$yearEnd = $_SESSION['yearEnd4'];
$graph = sprintf("SELECT objectEndDate, artistNationality, max(objectEndDate - objectBeginDate) as LENGTH
                  FROM Artworks, Make, Artists
                  WHERE Artworks.objID = Make.objID AND Make.artistDisplayName = Artists.artistDisplayName
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
