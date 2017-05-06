$(document).ready(function(){
		

	var fylki = [];
	var breyta;
	var breyta2;
	var pontun;
	/*$('#pontunListi').append("<table><tr><th>Ávextir</th><th>Magn</th></tr></table>");
	pontun2 = "<table><tr><th>Ávextir</th><th>Magn</th></tr></table>";*/
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
pontun = "<table><tr><th>Ávextir</th><th>Magn</th></tr></table>";
			fylki.unshift(breyta , breyta2);
			pontun += "<ul>";
	   		for (i = 0; i < fylki.length; i+=2) {
		   	 	pontun += "<li class=" + i + ">"+"<div class='jqpontunV' >" + fylki[i] +"</div>" + "<div class='jqpontunH'>"+ fylki[i+1] +" kg</div>"+ "<div class='clear'></div>"+"<input type='button' class='eydaPontun' value='Eyða'/>" + "</li>";
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
			console.log(fylki);
		}
	});
	$('#hnappur2').click(function(){
		console.log(fylki);
		var form = document.getElementById('skraPontun');
    	form.addEventListener('submit', function(){
    	var markersField = document.getElementById('pontunUpplysingar');
    	markersField.value = JSON.stringify(fylki);
    });
	

    });
    
});