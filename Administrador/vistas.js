/*
Funcion en javascript para mostrar video en un contenedor.
*/
function mostrarVideo(){
	var link = document.getElementById('selector').value;
	var linkEmb = link.replace("watch?v=", "embed/");
	document.getElementById('mostradorVideo').innerHTML = "<iframe width='275' height='260' src='" + linkEmb + "'</iframe>";
}

/*
	Funcion para cargar archivos dentro de un contenedor.
*/
function cargar(archivo){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load(archivo);
}

/*
	Actualiza el selector de videos, por lo que cuando agregan un evento,
	automaticamente se añade éste a la lista de videos disponibles.
*/
function actualizarSelectorVideo(){
	document.getElementById('inner').innerHTML = "";
	$('#inner').load('selectorVideo.php');
}

/*
	Coloca una imagen en un contenedor.
*/
function inicioAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').html("<center><img src='../Vistas/Imagenes/rose2.jpg'/></center>");
}

/*
	Funcion para quitar elementos algun contenedor.
*/
function quitarContenido(contenedor){
	document.getElementById(contenedor).innerHTML = "";
}

/*
	Se usa para editar o agregar un evento, se usa ajax para mandar los datos
	recopilados en el html al archivo .php indicado; de esta manera, evitamos
	actualizar la pagina.
*/
function editar(destino){
	var artista = document.getElementById('artista').value;
	var fecha   = document.getElementById('fecha').value;
	var prem    = document.getElementById('prem').value;
	var estan   = document.getElementById('estan').value;
	var disca   = document.getElementById('disca').value;
	var link    = document.getElementById('link').value;
	var id      = document.getElementById('idA').value;
	var precioP = document.getElementById('precioP').value;
	var precioE = document.getElementById('precioE').value;
	var precioD = document.getElementById('precioD').value;
	$.ajax({
		type:'POST',
		url: destino,
		dataType: 'html',
		data:{
			'artista' : artista,
			'fecha' : fecha,
			'prem' : prem,
			'estan' : estan,
			'disca' : disca,
			'link' : link,
			'idA' : id,
			'precioP' : precioP,
			'precioE' : precioE,
			'precioD' : precioD,
		},
		success: function(html){
			document.getElementById('header').innerHTML = "<div class='alert alert-success alert-dismissable'><button" + 
														" onClick='quitarContenido(\"header\");' class='close' data-dismiss='alert' aria-label='close'>&times;</button><strong>" + 
														"¡ Aviso !</strong><br>" + html +  "</div>";
		
		}
	});
	return false;
}

/*
	Funcion para mostrar contenido que solo necesita del id, como editarEvento
	o eliminarEvento.
*/
function eventoConId(id, destino, contenedor){
	var valor = document.getElementById(id).value;

	$.ajax({
		type: 'POST',
		url: destino,
		dataType: 'html',
		data:{
			"target" : valor,
		}, 
		success: function(html){
			$(contenedor).html(html);
		}
	});
}

