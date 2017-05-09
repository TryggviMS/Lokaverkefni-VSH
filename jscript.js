$(document).ready(function(){
	var fylki = [];
	var breyta;
	var breyta2;
	var pontun;
	$('select[name=magn]').change(function() {
		breyta2 = $(this).val();//hérna eru gildin í fellilista sett í breytu 
	});
	$('select[name=avoxturNafn]').change(function() {
		breyta = $(this).val();//hérna eru gildin í hinum fellilistanum sett í breytu 
	});
	$('#hnappur1').on( "click", function(){
		pontun = null;//þessi breyta er notuð til að geyma töflu yfir þá ávexti sem hafa verið pantaðir á html formi
		//villumeldingar
		if (breyta == null || breyta2 == null) {
			alert("Veldu bæði tegund og magn");
		}
		else if (breyta2 == "ekkert2") {
			alert("Veldu bæði tegund og magn");
			breyta2 = null;
		}
		else if (breyta == "ekkert") {
			alert("Veldu bæði tegund og magn");
			breyta = null;
		}
		else {

			pontun = "<table><tr><th>Ávextir</th><th>Magn</th></tr></table>";
			fylki.unshift(breyta , breyta2);//hérna eru nafn ávaxtar og magn sett fremst í fylki, í stað þess að fara aftast
			pontun += "<ul>";
			//hérna er sett í breytu innihald fylkisins, og í leið er það sett í tölfu ásamt allskonar stílun og hnappi til að eyða færslum
	   		for (i = 0; i < fylki.length; i+=2) {
		   	 	pontun += "<li>"+"<div class='jqpontunV' >" + fylki[i] +"</div>" + "<div class='jqpontunH'>"+ fylki[i+1] +" kg</div>"+ "<div class='clear'></div>"+"<input type='button' class='eydaPontun' value='Eyða'/>" + "</li>";
			}
			pontun += "</ul>";
			document.getElementById("pontunListi").innerHTML = pontun;//hérna er innihald breytunar sem er með töfluna með ávöxtum og magni skrifuð upp á html síðu
			$('.eydaPontun').on('click',function()
			{
				//þessi function sér um að eyða þeirri línu í töflunni sem viðeigandi hnappur er staddur á
				var tala;
				tala = $(this).parent('li').index();//hérna er fengið númer hvað í röðinni það li sem smellt er á hefur.
				$(this).parent('li').remove();//þetta li er síðan eytt
				console.log(tala);
				tala = tala * 2;//index talan er margfölduð með 2 til að passa við hvernig fylkið sem geymir pöntunina er notað
				fylki.splice(tala, 2);//pöntunin sem var í þessu li þarf að vera fjarlægð, splice(staðsetning í fylki, fjöldi staka sem á að eyða).
			});
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