<!-- NOTA: ESTO PODEMOS BORRAR CON NORMALIDAD -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Puedes descargar el script e incluirlo de manera local si así prefieres-->
	<script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
	<title>Generar códigos QR - By Parzibyte</title>
</head>

<body>
	<h1>Generando códigos QR desde parzibyte.me</h1>
	<a href="//parzibyte.me/blog">By Parzibyte</a>
	<br>
	    <img alt="Código QR" id="codigo">
	<br>
	<button id="btnDescargar">Descargar</button>
	<script>
		const $imagen = document.querySelector("#codigo"),
			$boton = document.querySelector("#btnDescargar");
		new QRious({
			element: $imagen,
			value: "http://localhost:8000/certificado/validacion/", // La URL o el texto
			size: 500,
			backgroundAlpha: 0, // 0 para fondo transparente
			foreground: "#8bc34a", // Color del QR
			level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
		});
		$boton.onclick = () => {
			const enlace = document.createElement("a");
			enlace.href = $imagen.src;
			enlace.download = "Código QR generado desde parzibyte.me.png";
			enlace.click();
		}
	</script>
</body>

</html>


















  <!-- Example row of columns -->
  <div class="row">
              
    <div class="col-md-3 mb-3">
      <div class="card" style="width: 18rem;">
          <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Certificado 01</h4>
            <p class="card-text">Modelo para carreras </p>
            <a href="#" class="btn btn-primary">Descargar</a>
          </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card" style="width: 18rem;">
          <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Certificado 02</h4>
            <p class="card-text">Modelo para cursos libres</p>
            <a href="#" class="btn btn-primary">Descargar</a>
          </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card" style="width: 18rem;">
          <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Certificado 01</h4>
            <p class="card-text">Modelo para carreras </p>
            <a href="#" class="btn btn-primary">Descargar</a>
          </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card" style="width: 18rem;">
          <img src="{{URL::asset('Recursos/cerImg.jpg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title">Certificado 02</h4>
            <p class="card-text">Modelo para cursos libres</p>
            <a href="#" class="btn btn-primary">Descargar</a>
          </div>
      </div>
    </div>

  </div>