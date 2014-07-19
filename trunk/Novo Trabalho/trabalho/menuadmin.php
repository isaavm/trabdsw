<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
	#menu {
		text-decoration: none;
		list-style: none;
		width: 100%;
		height: 40px;
		position: relative;
		background-color: black;
		overflow: visible;
		box-shadow: 0 0 5px black;
		font-size: 100%;
		font-family: Tahoma;
	}
	.menu {
		width: 960px;
		position: relative;
		margin: 0 auto;
	}
	
	#menu ul{
		background-color: black;
	}

	#menu li {
		width: 150px;
		height: 40px;
		position: relative;
		float: left;
		line-height: 40px;
		background: black;
		text-align: center;
	}

	#menu ul li a {
		position: relative;
		display: block;
		color: white;
	}

	menu ul li:hover {
		background-color: #555;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.sub-menu').hide();
		$('.show-sub-menu').hover(function() {
			$(this).find('.sub-menu').slideDown("slow");
		},function(){
			$(this).find('.sub-menu').slideUp("slow");
		});
	}); 
</script>
<div id="menu">
	<ul class="menu">
		<li>
			<a href="">Início</a>
		</li>
		<li>
			<a href="" class="show-sub-menu">Institucional</a>
			<ul class="sub-menu">
				<li>
					<a href="">Visão</a>
				</li>
				<li>
					<a href="" >Valores</a>
				</li>
				<li>
					<a href="" >Missão</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="">F.A.Q</a>
		</li>
		<li>
			<a href="">Contato</a>
		</li>
		<li>
			<a href="">Tutoriais</a>
		</li>
	</ul>
</div>
