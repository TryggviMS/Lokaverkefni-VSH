<?php 
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
if (isset($_POST['panta'])) {
$nafn = $_POST['nafn'];
$simi = $_POST['simi'];
$heimilisfang = $_POST['heimilisfang'];
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



  $pontun = json_decode($_POST['upplysingar']);
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
$teljari = 0;
   for ($i=0; $i < count($pontun)/2; $i++) { 
   		
   			$multiarr[$i]["avoxtur"] = $pontun[$teljari];
   			$multiarr[$i]["magn"] = $pontun[$teljari+1];
            $teljari+=2;
  	}
  	echo '<pre>';
  	foreach ($multiarr as $var) {
  		$avoxtur = $var['avoxtur'];
  		$magn = $var['magn'];
  		echo "\n", $var['avoxtur'], "\t\t", $var['magn'];
	$sql = "INSERT INTO pontunskraning (pontunarnumer, avoxtur, magn,heimsendingdagsetning)
	VALUES ('$naestaPontunarnumer', '$avoxtur', '$magn','$sendingardagur')";
	if (mysqli_query($conn, $sql)) {
   // echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
  	}
  	
	mysqli_close($conn);
  	echo '</pre';
//print_r($pontun);
/*echo '<pre>';
print_r($multiarr);
echo '</pre';*/
}


 ?>