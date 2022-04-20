<?php
session_start();
header('Content-Type: application/json');
$c = oci_connect('c.giordano', 'zGneVdKkuq9zIZQJAWxQw1SB', 'oracle.cise.ufl.edu/orcl');
$yearBegin = $_SESSION['yearBegin5'];
$yearEnd = $_SESSION['yearEnd5'];
$graph = sprintf("WITH rws AS (
                  SELECT Make.accessionYear, Artists.artistNationality, objectEndDate - objectBeginDate as Age, row_number() over(
                    PARTITION BY Make.accessionYear
                    ORDER BY objectEndDate - objectBeginDate desc) rn
                    FROM Artworks, Make, Artists
                    WHERE objectEndDate < 2022 AND Make.objID = Artworks.objID AND Artists.artistDisplayName = Make.artistDisplayName
                    AND Make.accessionYear < $yearEnd AND Make.accessionYear > $yearBegin
                  )
                  SELECT * FROM rws
                  WHERE rn = 1");
$parse = oci_parse($c, $graph);
oci_execute($parse);
$data = array();
while($row1 = oci_fetch_array($parse)) {
  $data[]=$row1;
}
print json_encode($data);
oci_free_statement($parse);
 ?>
