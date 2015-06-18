
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    var Meses=["ENERO", "FEBRERO","MARZO","ABRIL","MAYO","JUNCIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"];
   	var anios=[];
   	for (i=0;i<25;i++){
   		anios.push(i+2015);
   	}
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    $('#month').autocomplete({
    	source:Meses
    });
    $('#year').autocomplete({
    	source:anios
    });
    $('input[name=tarjeta]').on('change',function() {
      $('.cambio').text($(this).attr('id').toUpperCase());
    });