
<!DOCTYPE html>
<html>
<head>
	<title>åsd</title>
	<meta 
	>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
    var form = document.getElementById('theform');
    form.addEventListener('submit', function(){
        var markersField = document.getElementById('markers');
        var markers = ["be","your","mythical","best"];
        markersField.value = JSON.stringify(markers);
    });
});
	</script>
</head>
<body>
<form method="post" id="theform">
    <!-- your existing form fields -->

    <input type="hidden" id="markers" name="markers">

    <button name="plebbi">Submit</button>
</form>
</body>
</html>
<?php 
$markers;
if (isset($_POST['plebbi'])) {
	$markers = json_decode($_POST['markers']);
	print_r($markers);
}


 ?>