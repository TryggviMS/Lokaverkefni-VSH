$(document).ready(function(){
	
	var fylki = [];
	var breyta;
	var breyta2;
	var pontun;
	$('select[name=magn]').change(function() {
		breyta2 = $(this).val();
	});
	$('select[name=avoxturNafn]').change(function() {
		breyta = $(this).val();
	});
	$('#hnappur1').click(function(){
		if (breyta == null || breyta2 == null) {
			alert("Veldu bæði tegund og magn1");
		}
		else if (breyta2 == "ekkert2") {
			alert("Veldu bæði tegund og magn2");
			breyta2 = null;
		}
		else if (breyta == "ekkert") {
			alert("Veldu bæði tegund og magn3");
			breyta = null;
		}
		else {
			fylki.unshift(breyta , breyta2);
			pontun = "<ul>";
	   		for (i = 0; i < fylki.length; i+=2) {
		   	 	pontun += "<li class=" + i + ">" + fylki[i] + " -- " + fylki[i+1] + "<input type='button' class='eydaPontun' value='Eyða'/>" + "</li>";
			}
			pontun += "</ul>";
			document.getElementById("pontunListi").innerHTML = pontun;
			$('.eydaPontun').on('click',function()
			{
  				$(this).parent('li').remove();
				var myClass = $(this).parent('li').attr("class");					
				var mynumber = parseInt(myClass);
  				fylki.splice(mynumber, 2);
			});
		}
	});
	$('#hnappur2').click(function(){
		console.log(fylki);

	});
});