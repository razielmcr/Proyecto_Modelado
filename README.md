# Proyecto_Modelado
Parte de patrones de diseño:
Recuerdo:
	Se utilizó para poder almancenar el estado de cada uno de los eventos que se cearon al usar la página y sobre todo
	para el estado de cada uno de los boletos por evento.

MVC:
	Modelo: Se crea archivo Conexion.php con la finalidad de hacer las consultas necesarias a la base de datos; Este archivo es el único que establece contacto con la base de datos.

	Vista: Son diversos archivos los que se ocupan de esta parte, cada uno se enfoca en vistas específicas y en particular se usa html y javascript para visualizar lo mejor posible la información necesaria que provee el Controlador.

	Controlador: Se usa ccontrolador para poder realizar las tareas que el usuario solicita, está conectado con la vista para responder corectamente a lo que requiere el usuario y al Modelo para procesar estas solicitudes y obtener la información necesaria.


Fachada:
	Los botones del tipo, agregar, editar, compra,etc. todos envuelven procedimientos detrás, tales como, conectarse a la base, ver si el boleto está disponible, etc, todos estos soon ocultos al usuario y se simplifica en un botón.


Prototype:
	Para la creación de multplies conexiones a la base de datos, se estableció un archivo Conexión donde esté se encarga de crear una conexión y regresarla sin estar cada vez creando una individalmente. Se usa un modelo ya dado para la creacion de conexiones a las dbs.
