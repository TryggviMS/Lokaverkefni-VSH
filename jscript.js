$(document).ready(function(){
	
	var fylki = [];
	var breyta;
	var breyta2;
	var text;
	var teljari = "2";
	$('select[name=avoxtur]').change(function() {
		breyta = $(this).val();
	});
	$('select[name=avoxturNafn]').change(function() {
		breyta2 = $(this).val();
		});
	$('#hnappur1').click(function(){
			fylki.unshift(breyta);
			fylki.unshift(breyta2);
			text = "<ul>";
	   		for (i = 0; i < fylki.length; i+=2) {
		   	 	text += "<li class="+i+">" + fylki[i] +" -- "+ fylki[i+1] +"<input type='button' class='eydaPontun' value='Eyða'/>"  +"</li>";
			}
			text += "</ul>";
			document.getElementById("pontunListi").innerHTML = text;
			$('.eydaPontun').on('click',function()
			{
  				$(this).parent('li').remove();
				var myClass = $(this).parent('li').attr("class");					
				var mynumber = parseInt(myClass);
  				fylki.splice((mynumber));
  				fylki.splice(mynumber+1);
			});

	});
	$('#hnappur2').click(function(){
				console.log(fylki);

	});
//http://stackoverflow.com/questions/17313585/how-to-remove-a-specific-div-from-divs-with-same-class-name

});