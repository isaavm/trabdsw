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

function CarregarTurmas(){
	disciplina = document.getElementById("disciplina").value;
	$.ajax({ 
	type: "POST", 
	url: "retornaturmas.php", 
	data: { disciplina: disciplina} , 
	success: function(dados){  
		$("#turma").html(dados);  
		} 
	});
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

function CarregarDadosdoTrabalho(){
	
}


function CarregarTrabalhos(){
	
}

function Menu(){
	$(function(){ 
				$("#menu li a").mouseover(function(){
					var index = $("#menu li a").index(this);
					$("#menu li").eq(index).children("ul").slideDown(800);
					
					if($(this).siblings('ul').size() > 0){
						return false;
					}
				});
				
				$("#menu li").mouseleave(function(){
					var index = $("#menu li").index(this);
					$("#menu li").eq(index).children("ul").slideUp();
				});
	});
}