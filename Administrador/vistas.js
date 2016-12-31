function mostrarVideo(){
	var link = document.getElementById('selector').value;
	var linkEmb = link.replace("watch?v=", "embed/");
	document.getElementById('mostradorVideo').innerHTML = "<iframe width='275' height='260' src='" + linkEmb + "'</iframe>";
}

function actualizarSelector(){
	var val = document.getElementById('#inner');
	alert(val);
	$('#inner').load('selectorVideo.php');
}

function inicioAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').html("<center><img src='../Vistas/Imagenes/rose2.jpg'/></center>");
}

function agregarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load("agrega.html");
}

function mostrarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load("verEventos.php");
}

function editarAdmin(){
	document.getElementById('mostrador').innerHTML = "";			
	$('#mostrador').load('edita.php');
}

function eliminarAdmin(){
	document.getElementById('mostrador').innerHTML = "";
	$('#mostrador').load('eliminarEvento.php');
}

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

