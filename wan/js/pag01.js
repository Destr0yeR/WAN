
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
    $( "#tags" ).autocomplete({
      source: availableTags
    });
	$("input[name=tarjeta]:radio").change(function () {
		var $divi=$(this);
		cambio("."+$divi.attr('id'));
	});
	function cambio(id){

		var $i=$(id);
		console.log($i);
		if($i.is(':hidden')){
			$i.siblings().hide();
			$i.show();
		}
		else{
			$i.siblings().show();
			$i.hide();
		}
	}