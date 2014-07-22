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

function Testar(){
	alert("Nois!");
}

function BuscarTurmaDisciplinas(){
	$(document).ready(function(){
		$("a").click(function(evt) {
			evt.preventDefault();
			
			var href = $(this).attr('href');
			
			
			//Começo do Ajax
			$.ajax({
				type: "POST",
				url: href,
				//data: "",
				beforeSend: function(){
						
				},
				sucess:function(data){
					$("#pagina").html(data);
					
				}
			});
		});
	});
}
