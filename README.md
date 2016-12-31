# Proyecto_Modelado
INTEGRANTES:
	Almanza Ibarra Raziel
	Palmerin Morales David Gabriel

INSTRUCCIONES:
	- El archivo raíz es ~/Usuario/index.html , es la vista inicial del Proyecto.
	- En mySQL la contraseña de del usuario "root" debe ser "pass" para la correcta conexión en el archivo ~/Conexion/Conexion.php. En caso de tener usuario y contraseña distinto para mySQL, se puede modificar en este mismo archivo las variables:  $username y $password.
	- Al igual, es muy importante que el usuario no cuente con una base de datos llamada 'eventos' ya que el archivo Conexion.php 
verifica que no exista una para crearla e inicializar todo correctamente para el uso del proyecto;de lo contrario, usuará esta base de datos que ya tiene el usuario y no podrá hacerse el uso correcto.
	- El clone del Git debe hacerse en la carpeta /var/www/html/ y para su ejecucion, debe abrir la ruta: http://localhost/Proyecto_Modelado/Usuario/
	- Se incluye CRUD para la modificacion y creación de eventos. El acceso a esta opción esta protegida por un Inicio de Sesión, el cual es:
Usuario: Modelado Contraseña: 12345


PATRONES DE DISEÑO:

Recuerdo:
	Se utilizó para poder almancenar el estado de cada uno de los eventos que se cearon al usar la página y sobre todo
	para el estado de cada uno de los boletos por evento.

MVC:
	Modelo: Se crea archivo Conexion.php con la finalidad de hacer las consultas necesarias a la base de datos; Este archivo es el único que establece contacto con la base de datos.

	Vista: Son diversos archivos los que se ocupan de esta parte, cada uno se enfoca en vistas específicas y en particular se usa html, bootstrap y javascript para visualizar lo mejor posible la información necesaria que provee el Controlador.

	Controlador: Se usa ccontrolador para poder realizar las tareas que el usuario solicita, está conectado con la vista para responder corectamente a lo que requiere el usuario y al Modelo para procesar estas solicitudes y obtener la información necesaria.


Fachada:
	Los botones del tipo, agregar, editar, compra,etc. todos envuelven procedimientos detrás, tales como, conectarse a la base, ver si el boleto está disponible, etc, todos estos son ocultos al usuario y se simplifica en un botón.


Prototype:
	Para la creación de multplies conexiones a la base de datos, se estableció un archivo Conexión donde esté se encarga de crear una conexión y regresarla sin estar cada vez creando una individalmente. Se usa un modelo ya dado para la creacion de conexiones a las dbs.


