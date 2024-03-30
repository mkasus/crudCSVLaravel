<?php
require_once("contactConst.php");
?>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
	<title>Książka adresowa</title>
</head>

<body>
	<h2>Książka adresowa</h2>
	<p>
		<a href="kontakt/dodaj">Dodaj kontakt</a>
	</p>
	<table class="table table-striped" >
		<tr bgcolor='#DDDDDD'>
			<td><strong>ID</strong></td>
			<td><strong>Imię</strong></td>
			<td><strong>Nazwisko</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Telefon</strong></td>
			<td><strong>Plik</strong></td>
			<td><strong>Operacja</strong></td>
		</tr>
		@foreach ($contacts as $contact)
			<tr>
			<td>{{ $contact[CID]  }}</td>
			<td>{{ $contact[CNAME] }}</td>
			<td>{{ $contact[CLASTNAME] }}</td>
			<td>{{ $contact[CEMAIL] }}</td>
			<td>{{ $contact[CTEL] }}</td>
			<td>{{ $contact[CFILE] }}</td>
			<td><a href="{{ url('/kontakt/'.$contact[CID] .'/Edytuj') }}">Edycja</a> |
			<a href="{{ url('/kontakt/'.$contact[CID] .'/Usun') }}">Usuń</a></td>
		@endforeach

	</table>
</body>
</html>
