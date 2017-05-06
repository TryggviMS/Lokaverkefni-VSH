<?php include('./includes/vinnsla.php') ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>Pantanir</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="shortcut icon" href="favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type='text/javascript' src='jscript.js'></script>
</head>
<body>
<header>
<h1>Ávextir.is</h1>
      <input type="checkbox" id="toggle" >
      <label class="felaLabel" for="toggle">Menu &#9776; </label>
        <ul>
            <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/adalsida.html">Forsíða</a></li>
             <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/leikur.php">Panta ávexti</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida1.php">Kex.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida2.php">Kaffi.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida3.php">Ís.is</a></li>
            </ul> 
  </header>

<div class="fyrirsogn"> 
  <h1>Pöntunarsíða</h1>
  <p>Hérna er hægt að panta ávexti.</p> <p>Veldu ávöxt og magn í kílóum</p><p>Þegar þú ert búin/n að velja, skráðu inn upplýsingar í skráningarform og pantaðu!</p> 
</div>
 
  <div class="pontunSelect">
  
<select name="avoxturNafn" id="avoxturNafn">
  <option value="ekkert">Veldu ávöxt--</option>
  <option value="Epli">Epli</option>
  <option value="Appelsína">Appelsína</option>
  <option value="Banani">Banani</option>
  <option value="Perur">Perur</option>
  <option value="Mangó">Mangó</option>
  <option value="Lárpera">Lárpera</option>
  <option value="Jarðarber">Jarðarber</option>
  <option value="Bláber">Bláber</option>
</select>

<select name="magn" id="magn">
  <option value="ekkert2">Magn--</option>
  <option value="1">1 kg</option>
  <option value="2">2 kg</option>
  <option value="3">3 kg</option>
  <option value="5">5 kg</option>
  <option value="10">10 kg</option>
  <option value="15">15 kg</option>
  <option value="20">20 kg</option>
</select>
<button id="hnappur1">Velja</button>
</div>

<div id="pontunListi">
  <table><tr><th>Ávextir</th><th>Magn</th></tr></table>
</div>
<button id="hnappur3">prufa</button>
<div >
 
  <form action="./includes/vinnsla.php" method="POST" class="skraningarform" id="skraPontun">
   <h2>Leggja inn pöntun</h2>
    <label>Nafn:</label>
      <input id="name" name="nafn" placeholder="Notandanafn" type="text" >
    <label>Sími</label>
      <input id="text" name="simi" placeholder="xxx-xxxxx" type="Password" >
    <label>Heimilisfang</label>
      <input id="text" name="heimilisfang" placeholder="Heimilisfang" type="Password" >
      <button type="Submit" id="hnappur2" name="panta">Panta</button>
      <input type="hidden" id="pontunUpplysingar" name="upplysingar">
  </form>
</div>

<div class="clear"></div>
<footer>
<div class="flotleft" id="pontunarform">
  <h4>Tenglar</h4>
          <ul>                
             <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Lokaverkefni/adalsida.html">Forsíða</a></li>
             <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/leikur.php">Panta ávexti</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida1.php">Kex.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida2.php">Kaffi.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida3.php">Ís.is</a></li>
          </ul>
 </div>
 <div class="flotleft">
  <h4>Fleiri tenglar</h4>
          <ul>                
             <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/adalsida.php">Forsíða</a></li>
             <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/leikur.php">Panta ávexti</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida1.php">Kex.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida2.php">Kaffi.is</a></li>
                <li><a href="http://tsuts.tskoli.is/2t/1309932819/VSH%20303/Skilaverkefni%204/vefur/sida3.php">Ís.is</a></li>
          </ul>
 </div>
 <p id="prufa"></p>
</footer>
<div class="clear"></div>

</body>
</html>
