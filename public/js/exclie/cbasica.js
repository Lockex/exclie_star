(function (namespace, $) {
	"use strict";

	var cbasica = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = cbasica.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._editablesInit();	
		
	};


	// =========================================================================
	// FUNCION PARA ACTIVAR LOS EDITABLES Y CKEDITOR
	// =========================================================================

	p._editablesInit = function () {
		CKEDITOR.disableAutoInline = true;
		CKEDITOR.config.height = 100;
		if ($('#subjetivo').length > 0)
			CKEDITOR.inline('subjetivo');
		if ($('#analisis').length > 0)
			CKEDITOR.inline('analisis');
		if ($('#objetivo').length > 0)
			CKEDITOR.inline('objetivo');
		if ($('#plan').length > 0)
			CKEDITOR.inline('plan');
	};


	// =========================================================================
	namespace.cbasica = new cbasica;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
