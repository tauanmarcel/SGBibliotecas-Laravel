<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{ @asset('js/main.js') }}"></script>

	<title>Home - Biblioteca</title>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-3">
				@include('layouts.menu')
			</div>
			<div class="col-9 mt-2">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>