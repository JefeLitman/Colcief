<!DOCTYPE html>
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    
    <?PHP
		include("{{ asset('php/menu.php') }}")
	?>
    
    <!--Galeria por medio del materialize-->
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="slider">
					<ul class="slides">
						<li><img src="#"></li>
						<li><img src="#"></li>
						<li><img src="#"></li>
						<li><img src="#"></li>
						<li><img src="#"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    
    <?PHP
		include("{{ asset('php/footer.php') }}")
	?>
    
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.slider').slider();
        });
    </script>
</body>
</html>