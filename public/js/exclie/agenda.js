(function (namespace, $) {
	"use strict";

	var agenda = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();

		});

	};
	var accion = '';
	var p = agenda.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._enableEvents();

		this._initEventslist();
		this._initCalendar();
		this._displayDate();
		this._initBotones();
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
		$( "#title" )

	      	// don't navigate away from the field on tab when selecting an item
	      	.bind( "keydown", function( event ) {
		        if ( event.keyCode === $.ui.keyCode.TAB &&
		            $( this ).autocomplete( "instance" ).menu.active ) {
		          event.preventDefault();
		        }
	      	})
	      	.autocomplete({
		        source: function( request, response ) {
		          $.getJSON( _ruta + "/agenda/pacientes", {
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
		          //p._verpaciente(ui.item.id);
		          $("#idpaciente").val(ui.item.id);
          		  $("#title").val(ui.item.value);
          		  $("#edad").val(p._getEdad(ui.item.fecha))
          		  $("#referidopor").val(ui.item.referido);
          		  $("#telefono1").val(ui.item.tel);
		          //console.log(ui.item.id);
		          var terms = p._split( this.value );
		          // remove the current input
		          terms.pop();
		          // add the selected item
		          terms.push( ui.item.value );
		          // add placeholder to get the comma-and-space at the end
		          terms.push( "" );
		         // this.value = "";
		          return false;
		        }
      	}); 
	};
	// =========================================================================
	// FUNCION PARA CALCULAR EDAD
	// =========================================================================

	p._getEdad = function (data) {
		var hoy = new Date();
	    var fechaNacimiento = new Date(data);
	    var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
	    var m = hoy.getMonth() - fechaNacimiento.getMonth();
	    if (m < 0 || (m === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
	        edad--;
	    }
	    return edad;
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function () {
		var o = this;

		$('#calender-prev').on('click', function (e) {
			o._handleCalendarPrevClick(e);
		});
		$('#calender-next').on('click', function (e) {
			o._handleCalendarNextClick(e);
		});
		$('.nav-tabs li').on('show.bs.tab', function (e) {
			o._handleCalendarMode(e);
		});
	};

	// =========================================================================
	// CONTROLBAR
	// =========================================================================

	p._handleCalendarPrevClick = function (e) {
		$('#calendar').fullCalendar('prev');
		this._displayDate();
	};
	p._handleCalendarNextClick = function (e) {
		$('#calendar').fullCalendar('next');
		this._displayDate();
	};
	p._handleCalendarMode = function (e) {
		$('#calendar').fullCalendar('changeView', $(e.currentTarget).data('mode'));
	};

	p._displayDate = function () {
		var selectedDate = $('#calendar').fullCalendar('getDate');
		$('.selected-day').html(moment(selectedDate).format("dddd"));
		$('.selected-date').html(moment(selectedDate).format("DD MMMM YYYY"));
		$('.selected-year').html(moment(selectedDate).format("YYYY"));
	};

	// =========================================================================
	// TASKLIST
	// =========================================================================

	p._initEventslist = function () {
		if (!$.isFunction($.fn.draggable)) {
			return;
		}
		var o = this;

		$('.list-events li ').each(function () {
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()), // use the element's text as the event title
				className: $.trim($(this).data('className'))
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true, // will cause the event to go back to its
				revertDuration: 0, //  original position after the drag
			});
		});
	};


	// =========================================================================
	// CALENDAR
	// =========================================================================

	p._initCalendar = function (e) {
		if (!$.isFunction($.fn.fullCalendar)) {
			return;
		}

		var hoy = new Date();
		var d = hoy.getDate();
		var m = hoy.getMonth();
		var y = hoy.getFullYear();

		$('#calendar').fullCalendar({
			 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
			height: 700,
			header: false,
			minTime: "07:00:00",
			maxTime: "21:00:00",
			editable: true,
			droppable: true,
			defaultView: 'agendaWeek',
			events: {
			        url: ruta+'/agenda/vereventos',
			        type: 'POST',
			        data: function() {
			        	return {idDoctor: $('#sDoctor').val(),paciente:$('#search').val()};
			        },
			        error: function() {
			            alert('there was an error while fetching events!');
			        }
			},
			eventDrop: function(event,delta,revetFunc, jsEvent, ui, view) {			
				var inicio = event.start.format();				
				var final = event.end.format();					
				p.guardareventodrop(event.id,inicio,final);
			},
			eventResize: function(event,delta,revetFunc) {				
				p.guardareventodrop(event.id,event.start.format(),event.end.format());
			},
			eventClick: function(calEvent, jsEvent, view) {	
					
					document.getElementById('agendaConsulta').reset();		
					var arreglo_fecha = calEvent.start.format().split("T");		
					$('#modAgendarcon').modal('show');
					$('#cFecha').val(arreglo_fecha[0]);
					var arreglo_fecha = calEvent.start.format().split("T");
					$("#desde").val(calEvent.start.format("HH:mm"));
			        $("#hasta").val(calEvent.end.format("HH:mm"));
			        $("#title").val(calEvent.pacientenr).prop('disabled',false);
			        $("#edad").val(calEvent.edad);
			        $("#idevento").val(calEvent.id);
			        $("#telefono1").val(calEvent.telefono1);
			        $("#telefono2").val(calEvent.telefono2);
			        $("#referidopor").val(calEvent.refdoctor);
			        $('#quien').text(calEvent.NOMBRE);
			        $('#className').val(calEvent.className['0']);
			        $('#sCargo').val(calEvent.tipoCargo);

			        accion = 'editarcita';
			},
			drop: function (date, allDay,view) { // this function is called when something is dropped
				var fin = date;
				if(view.intervalUnit == 'month') {
					date.add(8,'h');
				}
				document.getElementById('agendaConsulta').reset();
				var arreglo_fecha = date.format().split("T");
				$('#cFecha').val(arreglo_fecha[0]);				
				$("#start").val(date.format());
				$("#end").val(fin.toISOString());
				$("#desde").val(date.format("HH:mm"));
				fin.add(30,'m');
				$("#hasta").val(fin.format("HH:mm"));				
				$('#modAgendarcon').modal('show');
				$('#title').focus();
				// // retrieve the dropped element's stored Event Object				
				var originalEventObject = $(this).data('eventObject');
				accion = 'guardarcita';
				// // we need to copy it, so that multiple events don't have a reference to the same object
				$('#className').val(originalEventObject.className);

				// // assign it the date that was reported
				// copiedEventObject.start = date;
							
				// //copiedEventObject.allDay = allDay;
				// copiedEventObject.className = originalEventObject.className;
				// //console.log(copiedEventObject);
				// // render the event on the calendar
				// // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				// $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			},
			dayClick: function(date,jsEvent,view) {
				var fin = date;
				if(view.intervalUnit == 'month') {
					date.add(8,'h');
				}
				document.getElementById('agendaConsulta').reset();
				var arreglo_fecha = date.format().split("T");
				$('#cFecha').val(arreglo_fecha[0]);
				$('#modAgendarcon').modal('show');
				$("#cInicio").val(date.format());
				$("#cFin").val(fin.toISOString());
				$("#desde").val(date.format("HH:mm"));
				fin.add(30,'m');
				
				accion = 'guardarcita';
				$("#hasta").val(fin.format("HH:mm"));
				$('#title').focus();
			},
			eventRender: function (event, element) {
				element.find('#date-title').html(element.find('span.fc-event-title').text());
			}
		});
	};


	p.guardareventodrop = function(idEvento,start,end) {
		$.ajax({
            type: "POST",
            url: ruta+"/agenda/dropevento",
            data: {idEvento:idEvento,start:start,end:end},
            dataType: "json",
            success: function(data) {
               toastr.success('Evento Actualizado');
            },
            error: function(){
               toastr.error('Ocurrió un error, inténtelo mas tarde.');
            }
	    });
	}

	p.guardarCita = function(evento) {
		var form = document.getElementById('agendaConsulta');
		//console.log($(form).serialize());
		$.ajax({
            type: "POST",
            url: ruta+"/agenda/"+accion,
            data: $(form).serialize(),
            dataType: "json",
            success: function(data) {
            	toastr.success('Evento guardado');
               	$('#modAgendarcon').modal('hide');
               	$('#calendar').fullCalendar('refetchEvents');
            },
            error: function(){
              	toastr.error('Ocurrió un error, inténtelo de nuevo mas tarde');
            }
	    });

	}

	p._initBotones = function() {
		$('#btnGuardarcita').on('click', function() {
			var evento = $('#cFecha').val();
			var hInicio = $('#desde').val();
			var hFin = $('#hasta').val();	
			var fin = '';
			var inicio = '';
			if((hInicio > '06:59' && hInicio < '18:46') && (hFin > '07:14' && hFin < '19:01') && hInicio < hFin) {
				fin = evento+"T"+hFin+':00';
				inicio = evento+"T"+hInicio+':00';				
				if(inicio < fin) {
					$('#end').val(fin);
					$('#start').val(inicio);
					var pacientenr = $('#title').val();
					$('#cPacientenr').val(pacientenr);					
					var edad = $('#edad').val();					
					p.guardarCita();					
				} else {
					toastr.error('La hora de inicio es mayor que la del final del evento. Es necesario tener una hora de inicio menor que la hora de finalización del evento.');
				}
			} else {
				toastr.error('Fuera de Horario de labores. ' + hInicio + ' ' + hFin);	
			}
			
		});
	}

	

	// =========================================================================

	namespace.agenda = new agenda;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
