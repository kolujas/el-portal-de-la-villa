<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>{{$data->nombre}} quiere contactar a alguien</title>
	<style>
		body{
			--color-uno: #0D4A7B;
			--color-dos: #197C3E;
			--color-tres: #C6C6C6;
			--color-cuatro: #222222;
		}

		table{
			max-width: 600px;
			padding: 10px;
			margin: 0 auto;
			border-collapse: collapse;
		}

		td{
			background-color: #ecf0f1;
		}

		td > div{
			color: #34495e;
			margin: 4% 10% 2% 10%;
			text-align: justify;
			font-family: sans-serif;
		}

		h2{
			color: var(--color-uno);
			margin:0 0 7px;
		}

		ul{
			font-size: 15px;
			margin: 10px 0;
		}

		.dates{
			margin: 2px;
			font-size: 15px;
			min-height: 100px;
			background-color: #f8f8f8;
			padding: 1rem;
			margin-bottom: 1.5rem;
		}

		.dates p{
			flex-basis: 100%;
			font-size: 1.5rem;
    		margin-top: 0;
			text-align: center;
		}

		.dates > div{
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
		}

		.dates > div > div{
			flex-basis: calc(50% - 2.5px);
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
		}

		.dates .separador{
			position: relative;
			height: 25px;
			flex-basis: 5px;
			background: var(--color-uno);
			border-radius: 10px;
			display: block;
			transform: translateY(-80%);
		}

		.dates .separador::before{
			position: absolute;
			content: "";
			height: 50%;
			width: 100%;
			top: 105%;
			left: 0;
			background: var(--color-uno);
			border-radius: 10px;
		}

		.dates .separador::after{
			position: absolute;
			content: "";
			height: 100%;
			width: 100%;
			top: 160%;
			left: 0;
			background: var(--color-uno);
			border-radius: 10px;
		}

		.dates div span{
			flex-basis: 100%;
			text-align: center;
		}

		.dates div .day{
			flex-basis: 100%;
			text-align: center;
    		font-size: 4rem;
		}

		.dates div .text{
			flex-basis: 100%;
			display: flex;
			justify-content: center;
		}

		.dates div .text .month,
		.dates div .text .year{
			flex-basis: fit-content;
		}

		.dates div .text .month{
			margin-right: 1rem;
		}

		.return{
			width: 100%;
			text-align: center;
		}

		.return a{
			text-decoration: none;
			border-radius: 5px;
			padding: 11px 23px;
			color: white;
			transition: 500ms;
			background-color: var(--color-uno);
		}

		.return a:hover{
			background-color: var(--color-cuatro);
		}

		.copyright{
			color: #ffffff;
			font-size: 1.1rem;
			text-align: center;
			margin: 30px 0 0 0;
			padding: 1rem;
			background-color: var(--color-cuatro);
		}
	</style>
</head>
<body>
<table>
	<tr>
		<td>
			<div>
				<h2>{{ $data->nombre }} quiere contactar a alguien</h2>

				<ul>
					@if(isset($data->nombre))
						<li><strong>Se ha contactado:</strong> {{ $data->nombre }} desde tu sitio web.</li>
					@else
						<li><strong>Se ha contactado:</strong> alguien, sin dejar su nombre, desde tu sitio web.</li>
					@endif
					<li><strong>Email:</strong> {{ $data->correo }}</li>
					<li><strong>Telefono:</strong>  {{ $data->telefono }}</li>
					@if(isset($data->huespedes))
						<li><strong>Cantidad de huespedes:</strong>  {{ $data->huespedes }}</li>
					@else
						<li><strong>Cantidad de huespedes:</strong> indefinida.</li>
					@endif
				</ul>
				
				<div class="dates">
					<p>Consultando por las fechas</p>
					<div>
						<div class="checkin">
							<span>Desde</span>
							<div class="day">{{$data->checkin->day}}</div>
							<div class="text">
								<div class="month">{{$data->checkin->month}}</div>
								<div class="year">{{$data->checkin->year}}</div>
							</div>
						</div>
						<div class="separador"></div>
						<div class="checkout">
							<span>Hasta</span>
							<div class="day">{{$data->checkout->day}}</div>
							<div class="text">
								<div class="month">{{$data->checkout->month}}</div>
								<div class="year">{{$data->checkout->year}}</div>
							</div>
						</div>
					</div>
				</div>

				<div class="return">
					<a target="_blank" href="URL">Ir a la página</a>
				</div>
				
				<p class="copyright">© Digitalo: <a style="color: white; text-decoration: none;" target="_blank" href="https://www.digitalo.com.ar/"> www.digitalo.com.ar</a></p>
			</div>
		</td>
	</tr>
</table>
</body>
</html>