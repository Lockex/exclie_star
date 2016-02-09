(function (namespace, $) {
	"use strict";

	var captura = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = captura.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		//this._vercaptura();
		this._initDatePicker();
	};


	// =========================================================================
	// FUNCION PARA MOSTRAR PACIENTES
	// =========================================================================

	// p._vercaptura = function () {		
	// 	$.ajax({
	// 	    type: "GET",
	// 	    url: _ruta+"/captura/pacientes",
	// 	    dataType: "html",
	// 	    data: {},
	// 	    success: function(data) {
	// 	        $('#verpacientes').html(data);
	// 	    },
	// 	    error: function(){
	// 	        alert('Ocurrió un error, inténtelo más tarde.');
	// 	    }
	// 	}); 
	// };

	// =========================================================================
	// FUNCION PARA DATEPICKER
	// =========================================================================
	p._initDatePicker = function () {
		if (!$.isFunction($.fn.datepicker)) {
			return;
		}

		
		$('#fecha_nacimiento').datepicker({autoclose: true, todayHighlight: false, format: "dd-mm-yyyy"});
		
	};
	// =========================================================================
	namespace.captura = new captura;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
