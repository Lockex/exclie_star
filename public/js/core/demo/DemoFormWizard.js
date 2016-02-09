(function(namespace, $) {
	"use strict";

	var DemoFormWizard = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = DemoFormWizard.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		this._initWizard1();
		this._initWizard2();
	};

	// =========================================================================
	// WIZARD 1
	// =========================================================================

	p._initWizard1 = function() {
		var o = this;
		$('#rootwizard1').bootstrapWizard({
			onTabShow: function(tab, navigation, index) {
				o._handleTabShow(tab, navigation, index, $('#rootwizard1'));
			}
		});
	};

	p._handleTabShow = function(tab, navigation, index, wizard){
		var total = navigation.find('li').length;
		var current = index + 0;
		var percent = (current / (total - 1)) * 100;
		var percentWidth = 100 - (100 / total) + '%';
		
		navigation.find('li').removeClass('done');
		navigation.find('li.active').prevAll().addClass('done');
		
		wizard.find('.progress-bar').css({width: percent + '%'});
		$('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});

		if(current >= total-1) {
				$('.form-wizard-horizontal').find('.pager .next').hide();
				$('.form-wizard-horizontal').find('.pager .finish').show();
				$('.form-wizard-horizontal').find('.pager .finish').removeClass('disabled');
		} else {
				$('.form-wizard-horizontal').find('.pager .next').show();
				$('.form-wizard-horizontal').find('.pager .finish').hide();
		}
	};
	
	// =========================================================================
	// WIZARD 2
	// =========================================================================

	p._initWizard2 = function() {
		var o = this;
		$('#rootwizard2').bootstrapWizard({
			onTabShow: function(tab, navigation, index) {
				o._handleTabShow(tab, navigation, index, $('#rootwizard2'));
			},
	  		onNext: function(tab, navigation, index) {
				var form = $('#rootwizard2').find('.form-validation');
	  			var valid = form.valid();
	  			if(!valid) {
	  				form.data('validator').focusInvalid();
	  				return false;
	  			}
	  		}
	  		
		});
	};

	p._handleTabShow = function(tab, navigation, index, wizard){
		var total = navigation.find('li').length;
		var current = index + 0;
		var percent = (current / (total - 1)) * 100;
		var percentWidth = 100 - (100 / total) + '%';
		
		navigation.find('li').removeClass('done');
		navigation.find('li.active').prevAll().addClass('done');
		
		wizard.find('.progress-bar').css({width: percent + '%'});
		$('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});

		if(current >= total-1) {
				$('.form-wizard-horizontal').find('.pager .next').hide();
				$('.form-wizard-horizontal').find('.pager .finish').show();
				$('.form-wizard-horizontal').find('.pager .finish').removeClass('disabled');
		} else {
				$('.form-wizard-horizontal').find('.pager .next').show();
				$('.form-wizard-horizontal').find('.pager .finish').hide();
		}
	};
	
	// =========================================================================
	namespace.DemoFormWizard = new DemoFormWizard;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
