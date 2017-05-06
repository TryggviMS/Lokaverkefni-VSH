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
if (isset($_POST['panta'])) {
  //innihald formsins sett í berytur
  $nafn = $_POST['nafn'];
  $simi = $_POST['simi'];
  $heimilisfang = $_POST['heimilisfang'];
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
  //hérna er bætt við dagsetningu á pöntun, tíminn fer þá eftir hve pöntunin er stór.
  if (count($pontun) == 1) {
    $sendingardagur=Date('Y-m-d', strtotime("+1 days"));
  }
  elseif (count($pontun) >= 2 && count($pontun) <=4) {
    $sendingardagur=Date('Y-m-d', strtotime("+2 days"));
  }
  elseif (count($pontun) >= 5 && count($pontun) <=10) {
    $sendingardagur=Date('Y-m-d', strtotime("+3 days"));
  }
  else {
    $sendingardagur=Date('Y-m-d', strtotime("+5 days"));
  }
  //hérna er jquery array breytt yfir í php array
  $pontun = json_decode($_POST['upplysingar']);
  $teljari = 0;
  for ($i=0; $i < count($pontun)/2; $i++) { 
      $multiarr[$i]["avoxtur"] = $pontun[$teljari];
      $multiarr[$i]["magn"] = $pontun[$teljari+1];
      $teljari+=2;
  }
  /*echo "<pre>";
  print_r($multiarr);
  echo "</pre>";
  
  for ($i=0; $i < count($multiarr); $i++) { 
    
     echo  $multiarr[$i]['avoxtur'];
     echo $multiarr[$i]['magn'];
    
    echo "<br>";
    
  }*/
  /*echo  $multiarr[0]['avoxtur'];
  echo  $multiarr[0]['magn'];*/
  $satt = false;
     foreach ($multiarr as $var) {
        $avoxtur = $var['avoxtur'];
        $magn = $var['magn'];
        //echo "\n", $var['avoxtur'], "\t\t", $var['magn'];
       // echo $avoxtur + " " + $magn + "<br>";
    $sql = "INSERT INTO pontunskraning (pontunarnumer, avoxtur, magn,heimsendingdagsetning)
    VALUES ('$naestaPontunarnumer', '$avoxtur', '$magn','$sendingardagur')";
    if (mysqli_query($conn, $sql)) {
      $satt = True;
      /*foreach ($multiarr as $var) {
        echo "\n", $var['avoxtur'], "\t\t", $var['magn'];
      }
          */
      ;
      } else {
        echo "<p>Villa í skráningu: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        echo "<p><a href='http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/pantanir.php'>Til baka</a></p>";
    }
      }
      if ($satt == true) {
      	$newDate = date("d-m-Y", strtotime($sendingardagur));
      	echo "<p><b>Pöntun móttekin</b></p><p><b>Sendingardagur: $newDate</b></p>";
      echo	'<table>
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