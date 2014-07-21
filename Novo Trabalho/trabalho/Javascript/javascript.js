function MenuDropDown() {
	$(document).ready(function(e) {
		$('.sub-menu').hide();
		$('.show-sub-menu').hover(function() {
			$(this).find('.sub-menu').slideDown('slow');
		}, function() {
			$(this).find('.sub-menu').slideUp('slow');
		});
	});
}

function LimparCampo(){
	this.value="";
}
