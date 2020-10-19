$(document).ready(function(){
	
	$(".timepicker").timepicker({
		hourText: 'Heures',
		minuteText: 'Minutes',
		amPmText: ['AM', 'PM'],
		timeSeparator: ':',
		nowButtonText: 'Maintenant',
		showNowButton: false,
		closeButtonText: 'Fermer',
		showCloseButton: false,
		deselectButtonText: 'Désélectionner',
		showDeselectButton: false,
		rows: 6,
		showPeriodLabels: false,
                defaultTime: 'now'
	});
	
  });