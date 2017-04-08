<?php 

/**************************************
 * Configuración General
 */

//Ubicación del WS
//define("WS_USUARIOS_ADDRESS","http://10.1.2.160:81/usuarios/ws_usuarios/ws_usuarios?wsdl");
define("WS_USUARIOS_ADDRESS","http://localhost/usuarios/ws_usuarios/ws_usuarios?wsdl");

//ID de Aplicación
define("ID_APLICACION",44);

//Intentos de logeo
define("INTENTOS_VALIDACION",4);
define("INTENTOS_CAPTCHA",2);

//Página principal
//define("ACCESO_PRINCIPAL_APLICACION","http://10.1.2.160:81/jornadae/inicio/estadisticas/");
define("ACCESO_PRINCIPAL_APLICACION","http://localhost/jornadae/inicio/estadisticas/");

//Base de datos

define("DB_USUARIOS","usuarios");

//imagen login

define("IMAGE_LOGIN","imagenes/framework.png");

//tipo de login
//1 Barra Superior
//2 Barra Lateral
define("TYPE_LOGIN",1);
/**************************************
 * Códigos de Error
 */

//Errores de Conexión con WS de Usuarios
define("WSI0001","ERROR(WSI0001)");
define("WSI0002","ERROR(WSI0002)");
define("WSI0003","ERROR(WSI0003)");

//Errores de Validación
define("VS0001","ERROR(VS0001)");
define("M_VS0001","Hubo un error en la validación.");
define("VS0002","ERROR(VS0002)");
define("M_VS0002","Hubo un error en la validación.");
define("VS0003","ERROR(VS0003)");
define("M_VS0003","Hubo un error en la validación.");
?>