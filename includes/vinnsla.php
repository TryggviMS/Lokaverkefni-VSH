<?php 
//tenging við gagnagrunn
$server = "tsuts.tskoli.is";
$user = "1309932819";
$pass = "mypassword";
$dbname = "1309932819_lokavsh";
$conn = mysqli_connect($server, $user, $pass, $dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$multiarr = array();
$pontun = array();
$sendingardagur=Date('Y-m-d');
$satt = false;
if (isset($_POST['panta'])) {
  
  //hérna er kóði sem lætur pöntunarnúmer alltaf vera einum hærra en pöntunin á undar, þannig að hver pöntun hafi sitt númer. það er sótt það númer sem er hæst í gagnagrunninum og bætt við það einum.
  $pontunarnumer = 1000;
  $sql2 = "SELECT DISTINCT MAX(pontunarnumer) from pontunskraning ORDER BY pontunarnumer";
  $result = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0) {
    if (!($row[0] < 1000)) {
    $naestaPontunarnumer = $row[0];
    $naestaPontunarnumer = $naestaPontunarnumer + 1;
  }
  else {
    $naestaPontunarnumer = 1000;
  }
  }
 
  //hérna er jquery array breytt yfir í php array
  $pontun = json_decode($_POST['upplysingar']);
  $teljari = 0;
  for ($i=0; $i < count($pontun)/2; $i++) { 
      $multiarr[$i]["avoxtur"] = $pontun[$teljari];
      $multiarr[$i]["magn"] = $pontun[$teljari+1];
      $teljari+=2;
  }

  //innihald skráningarformsins sett í breytur, nafn, sími, heimilisfang og númer pöntunar sett í gagnagrunn
  $nafn = $_POST['nafn'];
  $simi = $_POST['simi'];
  $heimilisfang = $_POST['heimilisfang'];
  $sql2 ="INSERT INTO pontun (nafn, simi, heimilisfang, pontunarnumer)
  VALUES ('$nafn', '$simi', '$heimilisfang','$naestaPontunarnumer')";
  if (mysqli_query($conn, $sql2)) {
    
  } 
  else {
    echo "<p>Villa í skráningu: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    echo "<p><a href='http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/pantanir.php'>Til baka</a></p>";
  }






  //hérna er loopað í gegnum array með pöntuninni og sett í gagnagrunn
  foreach ($multiarr as $var) {
      //hérna er bætt við dagsetningu á pöntun, tíminn fer þá eftir hve pöntunin er stór.
    if (count($multiarr) == 1) {
        $sendingardagur=Date('Y-m-d', strtotime("+1 days"));
      }
     if (count($multiarr) >= 2 && count($multiarr) <=4) {
        $sendingardagur=Date('Y-m-d', strtotime("+2 days"));
      }
     if (count($multiarr) >= 5) {
        $sendingardagur=Date('Y-m-d', strtotime("+3 days"));
      }
      //hérna er sett inn í gagnagrunn
    $avoxtur = $var['avoxtur'];
    $magn = $var['magn'];
    $sql = "INSERT INTO pontunskraning (pontunarnumer, avoxtur, magn,heimsendingdagsetning)
    VALUES ('$naestaPontunarnumer', '$avoxtur', '$magn','$sendingardagur')";
    if (mysqli_query($conn, $sql)) {
      $satt = True;
    } 
    else {
      echo "<p>Villa í skráningu: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
      echo "<p><a href='http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/pantanir.php'>Til baka</a></p>";
    }
    }
     $nafn = $_POST['nafn'];
  $simi = $_POST['simi'];
  $heimilisfang = $_POST['heimilisfang'];
    //ef það tókst að skrá í gagnagrunnin er birtur listi yfir því sem var pantað og takki til að fara til baka.
  if ($satt == true) {
    $newDate = date("d-m-Y", strtotime($sendingardagur));
    echo "<h3>Pöntun móttekin<h3><p><b>Sendingardagur: </b>$newDate</p>";
    echo "<p><b>Nafn: </b>$nafn</p><b>Sími: </b>$simi<p><b>Heimilisfang: </b>$heimilisfang</p><p><b>Pöntunarnúmer: </b>$pontunarnumer</p>";
    echo	
      '<table>
  		<tr>
  		<th>Ávöxtur</th>
  		<th>Magn</th>
  		</tr>';
		for ($i=0; $i < count($multiarr); $i++) { 
	   	echo
			  '<tr>
			  <td>' . $multiarr[$i]['avoxtur'] . "&nbsp;" . '</td>
				<td>' . $multiarr[$i]['magn'] . " kg". '</td>
				</tr>';
		}
  	echo '</table>';
  	echo "<br><p><b><a href='http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/adalsida.html'>Til baka</a></b></p>";
    }
    mysqli_close($conn);
}
?>