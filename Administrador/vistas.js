/*
Funcion en javascript para mostrar video en un contenedor.
*/
function mostrarVideo(){
	var link = document.getElementById('selector').value;
	var linkEmb = link.replace("watch?v=", "embed/");
	document.getElementById('mostradorVideo').innerHTML = "<iframe width='275' height='260' src='" + linkEmb + "'</iframe>";
}

/*
	Actualiza el selector de videos, por lo que cuando agregan un evento,
	automaticamente se añade éste a la lista de videos disponibles.
*/
function actualizarSelector(){
	var val = document.getElementById('#inner');
	alert(val);
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
	Carga el archivo agrega.html dentro de un contenedor indicado.
*/
function agregarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load("agrega.html");
}

/*
	Carga el archivo verEventos.php dentro de un contenedor indicado.
*/
function mostrarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load("verEventos.php");
}

/*
	Carga el archivo edita.php dentro de un contenedor indicado.
*/
function editarAdmin(){
	document.getElementById('mostrador').innerHTML = "";			
	$('#mostrador').load('edita.php');
}

/*
	Carga el archivo eliminarEvento.php dentro de un contenedor indicado.
*/
function eliminarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load('eliminarEvento.php');
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
			document.getElementById('header').innerHTML = "<div class='alert alert-success alert-dismissable'><a href='menuAdmin.php'" + 
														" class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>" + 
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

