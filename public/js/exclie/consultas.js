(function (namespace, $) {
	"use strict";

	var consultas = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = consultas.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		//this._iniciarAutocomplete();	
		this._buscadorInit();	
		this._linksInit();
		this._agregarconsultaInit();
	};


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
	// FUNCION DEL BUSCADOR DE PACIENTES
	// =========================================================================

	p._buscadorInit = function() {
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
		          $.getJSON( _ruta + "/pacientes/pacientesjson", {
		            term: p._extractLast( request.term )
		          }, response );
		        },
		        search: function() {
		          // custom minLength
		          var term = p._extractLast( this.value );
		          if ( term.length < 2 ) {
		            return false;
		          }
		        },
		        focus: function() {
		          // prevent value inserted on focus
		          return false;
		        },
		        select: function( event, ui ) {
		          p._verpaciente(ui.item.id);
		          //console.log(ui.item.id);
		          var terms = p._split( this.value );
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
	};


	// =========================================================================
	// FUNCION PARA VER LOS PACIENTES
	// =========================================================================

	p._verpaciente = function (data) {
		document.getElementById('pac').value = data;
        document.fPac.submit();	
	};

	// =========================================================================
	// INICIALIZANDO FUNCION PARA AGREGAR UNA CONSULTA BASICA
	// =========================================================================

	p._agregarconsultaInit = function () {
		$('#agregarConsulta').on('click',function() {
			$.ajax({
			    type: "GET",
			    url: _ruta+"/consultas/nuevaconsulta",
			    dataType: "html",
			    success: function(data) {
			        $('#verconsulta').html(data);
			    },
			    error: function(){
			        alert('Ocurrió un error, inténtelo más tarde.');
			    }
			}); 

		});
	};

	// =========================================================================
	// FUNCION PARA ACTIVAR LOS LINKS DE LAS CONSULTAS
	// =========================================================================

	p._linksInit = function (data) {
		$('.tile').on('click',function(){
			var espec = $(this).attr('espec'); // especialidad de la consulta
			var idcons = $(this).attr('idcons'); // id de la consulta
			p._verconsulta(espec,idcons);
		});
	};


	// =========================================================================
	// FUNCION PARA IR AL LAYOUT DE LA CONSULTA
	// =========================================================================

	p._verconsulta = function (espec,idcons) {		
		$.ajax({
		    type: "GET",
		    url: _ruta+"/consultas/verconsulta",
		    dataType: "html",
		    data: {espec:espec,idcons:idcons},
		    success: function(data) {
		        $('#verconsulta').html(data);
		    },
		    error: function(){
		        alert('Ocurrió un error, inténtelo más tarde.');
		    }
		}); 
	};



	// =========================================================================
	namespace.consultas = new consultas;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
