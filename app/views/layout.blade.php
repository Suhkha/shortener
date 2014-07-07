<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Aprendiendo Laravel')</title>
	{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
	{{ HTML::style('css/main.css', array('media' => 'screen')) }}
</head>
<body>
	<div class="wrapper">
		<div class="container">
			@yield('content')
		</div>
	</div>	

	{{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>