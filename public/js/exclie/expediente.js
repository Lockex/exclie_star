(function (namespace, $) {
	"use strict";

	var expediente = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	
	var p = expediente.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		//this._vercaptura();
		this._initDatePicker();
		this._buscadorInit();
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
		          $.getJSON( _ruta + "/captura/patients", {
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
		          $("#patient").val(ui.item.id);
          		            		  
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

	p._verpaciente = function (id) {
		$.ajax({
            type: "POST",
            url: _ruta+"/captura/datospaciente",
            data: {pac:id},
            dataType: "json",
            success: function(response) {
            	var ec = response['paciente'][0]['ESTADO_CIVIL'];
               $('#idpac').val(response['paciente'][0]['ID']);
               $('#NOMBRE').val(response['paciente'][0]['NOMBRE']);
               $('#APELLIDO_PATERNO').val(response['paciente'][0]['APELLIDO_PATERNO']);
               $('#APELLIDO_MATERNO').val(response['paciente'][0]['APELLIDO_MATERNO']);
               $('#EDAD').val(response['paciente'][0]['EDAD']);
               $('#CALLE').val(response['paciente'][0]['CALLE']);
               $('#EDAD').val(response['paciente'][0]['EDAD']);
               $('#NUM_EXT').val(response['paciente'][0]['NUMERO_EXT']);
               $('#NUM_INT').val(response['paciente'][0]['NUMERO_INT']);
               $('#COLONIA').val(response['paciente'][0]['COLONIA']);
               $('#TELEFONO1').val(response['paciente'][0]['TELEFONO_1']);
               $('#TELEFONO2').val(response['paciente'][0]['TELEFONO_2']);
               $('#EMAIL').val(response['paciente'][0]['EMAIL']);
               $('#referido').val(response['paciente'][0]['REFERIDO']);
               $('#sEstadocivil').val(response['paciente'][0]['ESTADO_CIVIL']);
               $('#sTipoSanguineo').val(response['paciente'][0]['TIPO_SANGUINEO']['ID']);
               $('#NombreC').val(response['paciente'][0]['NOMBRE_CONYUGE']);
               $('#EdadC').val(response['paciente'][0]['EDAD_CONYUGE']);
               if(ec == 2) {
               	$('#conyuge').show();
               }
               if(response['imagenes'].length != 0){
               	$('#imagenes').html('');
			 	var total = response['imagenes'].length;
			 	var carpetanum = response['carpeta'];
			 	var imgcons = _ruta+"/public/imagenes/consultas/"+carpetanum+'/';
	       		var rutafcons = _ruta+"/public/imagenes/consultas/"+carpetanum+'/';
	       		if(response['imagenes']){
		       		var fotoscons = response['imagenes'];
		       		for (var i = 0, len = fotoscons.length; i < len; i++) {
					  var th = fotoscons[i].IMAGEN.split('.',1);
					  var ext = fotoscons[i].IMAGEN.slice(-3)
					  var name = th.join()+'_th.';
					  var nombre = name.replace(',','.');
					  var nomFotoTh = nombre+ext;
					  $('#imagenes').append('<a href="'+rutafcons+fotoscons[i].IMAGEN+'" title="Galería" data-gallery="" class="context-menu-one btn btn-neutral" id="'+fotoscons[i].ID+'"><img src="'+rutafcons+nomFotoTh+'"></a>');
					}
				}
               }
                $('#dropzz').show(); 
                $('#idPaciente').val(response['paciente'][0]['ID']); 
            },
            error: function(){
               toastr.error('Ocurrió un error, inténtelo mas tarde.');
            }
	    });
	};
	// =========================================================================
	// FUNCION PARA DATEPICKER
	// =========================================================================
	p._initDatePicker = function () {
		if (!$.isFunction($.fn.datepicker)) {
			return;
		}

		$('#fecha_consulta').datepicker({autoclose: true,format: "dd-mm-yyyy"});
		
	};
	
	// =========================================================================
	namespace.expediente = new expediente;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
