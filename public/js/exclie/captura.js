(function (namespace, $) {
	"use strict";

	var captura = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
			$('#Acepta').on('click', function (e) {
		 		$("#confirma").modal('hide');
		 		window.location.href = _ruta+'/captura';
		 	});
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

		
		$('#fecha-histo').datepicker({autoclose: true,format: "dd-mm-yyyy", locale: 'es'});
		$('#FUM').datepicker({autoclose: true,format: "dd-mm-yyyy"});
		$('#efecha').datepicker({autoclose: true,format: "dd-mm-yyyy"});
		$('#fecha_consulta').datepicker({autoclose: true,format: "dd-mm-yyyy"});
		
	};
	// =========================================================================
	namespace.captura = new captura;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
