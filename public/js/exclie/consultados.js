(function ($) {
	"use strict";

	// Page Loaded...
	$(document).ready(function () {

			
		/*====== Buscador Pacientes =======*/
		function split( val ) {
          return val.split( /;\s*/ );
        }

        function extractLast( term ) {
          return split( term ).pop();
        }

		$( "#buscadorpacientes" )

	      	// don't navigate away from the field on tab when selecting an item
	      	.bind( "keydown", function( event ) {
		        if ( event.keyCode === $.ui.keyCode.TAB &&
		            $( this ).autocomplete( "instance" ).menu.active ) {
		          event.preventDefault();
		        }
	      	})
	      	.autocomplete({
		        source: function( request, response ) {
		          $.getJSON( ruta + "/pacientes/pacientesjson", {
		            term: extractLast( request.term )
		          }, response );
		        },
		        search: function() {
		          // custom minLength
		          var term = extractLast( this.value );
		          if ( term.length < 2 ) {
		            return false;
		          }
		        },
		        focus: function() {
		          // prevent value inserted on focus
		          return false;
		        },
		        select: function( event, ui ) {
		          iraconsulta(ui.item.id);
		          //console.log(ui.item.id);
		          var terms = split( this.value );
		          // remove the current input
		          terms.pop();
		          // add the selected item
		          terms.push( ui.item.value );
		          // add placeholder to get the comma-and-space at the end
		          terms.push( "" );
		          this.value = "";
		          return false;
		        }
	      }); 
	});

	function iraconsulta(data) {
        document.getElementById('pac').value = data;
        document.fPac.submit();
    }

    

})(jQuery);