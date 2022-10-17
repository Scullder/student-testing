$(document).ready(function(){
	$('.form-control').css('background-color', '#fff');

	$('.form-control').on('focus', function(){
		$(this).css('outline', 'none');
		$(this).css('box-shadow', 'none');
	});

	$('tr').hover(
	function(){
		$(this).addClass('bg-light');
	},
	function(){
		$(this).removeClass('bg-light');
	});
})

