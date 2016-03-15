(function (namespace, $) {
	"use strict";

	var pacientes = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = pacientes.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		//this._iniciarAutocomplete();	
		this._checkboxesInit();	
		this._masksInit();	
		this._modalCodigoInit();
		//this._iniciarAutocomplete();


	};

	// =========================================================================
	// SUMMERNOTE EDITOR
	// =========================================================================

	// p._iniciarAutocomplete = function () {
	// 	if (!$.isFunction($.fn.autocomplete)) {
	// 		return;
	// 	}

	// 	$("#searchpatient")
		
	// 	.bind( "keydown", function( event ) {
	// 	  if ( event.keyCode === $.ui.keyCode.TAB &&
	// 	      $( this ).autocomplete( "instance" ).menu.active ) {
	// 	    event.preventDefault();
	// 	  }
	// 	})
	// 	.autocomplete({
	// 	  source: function( request, response ) {
	// 	    $.getJSON( ruta+"/pacientes/pacientesjson", {
	// 	      term: p._extractLast( request.term )
	// 	    }, response );
	// 	  },
	// 	  search: function() {
	// 	    // custom minLength
	// 	    var term = p._extractLast( this.value );
	// 	    if ( term.length < 5 ) {
	// 	      return false;
	// 	    }
	// 	  },
	// 	  focus: function() {
	// 	    // prevent value inserted on focus
	// 	    return false;
	// 	  },
	// 	  select: function( event, ui ) {		   
	// 	    var terms = p._split( this.value );
	// 	    // remove the current input
	// 	    terms.pop();
	// 	    // add the selected item
	// 	    terms.push( ui.item.value );
	// 	    // add placeholder to get the comma-and-space at the end
	// 	    terms.push( "" );
	// 	    this.value = "";
	// 	    return false;
	// 	  }
	// 	});
		
	// };

	// =========================================================================
	// FUNCIONES AUXILIARES
	// =========================================================================

	p._split = function(val) {
		return val.split( /;\s*/ );
	};

	p._extractLast = function(term) {
		return p._split( term ).pop();
	};
	

	// =========================================================================
	// FUNCIONES PARA LOS CHECKBOXES DE LOS ANTECEDENTES
	// =========================================================================

	p._checkboxesInit = function() {
		$('input[type="checkbox"]').on("change",function() {
			var divid = $(this).attr('divref');		
			if($(this).is(":checked")) {
				$('#'+divid).removeClass('hidden');
				$('#'+divid).find('input[type="text"]').focus();								
			} else {
				$('#'+divid).addClass('hidden');
				
			}			
		});
	};


	// =========================================================================
	// FUNCION PARA MASCARAS DE LOS INPUT
	// =========================================================================

	p._masksInit = function () {
		if (!$.isFunction($.fn.inputmask)) {
			return;
		}
		$(":input").inputmask();		
		$('#FECHA_NACIMIENTO').datepicker({autoclose: true, todayHighlight: true, format: "dd-mm-yyyy"});
		$('#conyuge').hide();
	};

	// =========================================================================
	// FUNCION PARA MASCARAS DE LOS INPUT
	// =========================================================================

	p._modalCodigoInit = function () {
		if (!$.isFunction($.fn.modal)) {
			return;
		}
		
		$('#bAceptar').on("click",function(){
			$('#modalCodigo').modal('show');
		});
		
	};

		

	// =========================================================================
	namespace.pacientes = new pacientes;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
