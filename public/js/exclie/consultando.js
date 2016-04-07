(function (namespace, $) {
	"use strict";

	var consultando = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = consultando.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		//this._iniciarAutocomplete();	
		this._checkboxesInit();	
		this._masksInit();	
		//this._modalCodigoInit();
	};

	
	// =========================================================================
	// FUNCIONES AUXILIARES
	// =========================================================================

	// p._split = function(val) {
	// 	return val.split( /;\s*/ );
	// };

	// p._extractLast = function(term) {
	// 	return p._split( term ).pop();
	// };
	

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
		$('#FECHA_NACIMIENTO').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	};

	

	// =========================================================================
	namespace.consultando = new consultando;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
