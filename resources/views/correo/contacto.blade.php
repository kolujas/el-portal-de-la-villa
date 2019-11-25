<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>{{$data->nombre}} quiere contactar a alguien</title>
</head>
<body>

<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #01B3A7;margin:0 0 7px;">{{ $data->nombre }} quiere contactar a alguien</h2>

				<ul style="font-size: 15px;  margin: 10px 0">
					<li><strong>Se ha contactado:</strong> {{ $data->nombre }} desde tu sitio web.</li>
					<li><strong>Email:</strong> {{ $data->correo }}</li>
					<li><strong>Telefono:</strong>  {{ $data->telefono }}</li>
				</ul>

        		<p style="margin:2px;font-size:15px;min-height:100px;background-color: #f8f8f8;padding: 1rem;margin-bottom: 1.5rem;">{{ $data->mensaje }}</p>

				<div style="width: 100%; text-align: center">
					<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #01B3A7;" target="_blank" href="URL">Ir a la página</a>
				</div>
				
				<p style="color: #ffffff;font-size: 1.1rem;text-align:center;margin:30px 0 0;padding: 1rem;background-color: #01B3A7;">© Digitalo: <a style="color: white; text-decoration: none;" target="_blank" href="https://www.digitalo.com.ar/"> www.digitalo.com.ar</a></p>
			</div>
		</td>
	</tr>
</table>

</body>
</html>