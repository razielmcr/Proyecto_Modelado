# Proyecto_Modelado
Parte de patrones de diseño:
Recuerdo:
	Se utilizó para poder almancenar el estado de cada uno de los eventos que se cearon al usar la página y sobre todo
	para el estado de cada uno de los boletos por evento.
MVC:
	Rifate Palmi

Fachada:
	Los botones del tipo, agregar, editar, compra,etc. todos envuelven procedimientos detrás, tales como, conectarse a la base, ver si el boleto está disponible, etc, todos estos soon ocultos al usuario y se simplifica en un botón.

Prototype:
	Para la creación de multplies conexiones a la base de datos, se estableció un archivo Conexión donde esté se encarga de crear una conexión y regresarla sin estar cada vez creando una individalmente. Se usa un modelo ya dado para la creacion de conexiones a las dbs.