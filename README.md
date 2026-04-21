# Integrantes:

**Andrea Yamileth Rodriguez Hernandez   SMSS073124**


**Daniel Antonio Orellana Zelaya        SMSS086223**


**-¿Cómo manejan la conexión a la BD y qué pasa si algunos de los datos son incorrectos?**

*La conexión a la base de datos se gestiona mediante un archivo central llamado conexion.php, el cual utiliza la extensión mysqli de PHP para establecer la comunicación con MySQL. Este archivo es reutilizado por todos los módulos del sistema, lo que evita duplicar código y facilita el mantenimiento. Para el manejo de errores se valida la conexión mediante una condición que verifica si existe un error al conectar. En caso de que los datos del servidor, usuario, contraseña o base de datos sean incorrectos, el sistema detiene la ejecución mostrando un mensaje controlado. Esto evita que la aplicación continúe funcionando sin conexión y previene que se expongan errores internos al usuario final, garantizando así la estabilidad básica del sistema.*


**-¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno?**

*Las variables superglobales $_GET y $_POST permiten enviar datos desde formularios hacia el servidor, pero se diferencian en la forma en que transmiten la información. $_GET envía los datos a través de la URL, haciéndolos visibles y apropiados para operaciones como filtros, búsquedas o selección de registros, donde la información puede compartirse mediante enlaces. Por otro lado, $_POST envía los datos dentro del cuerpo de la petición HTTP, ocultándolos de la URL y siendo más adecuado para el envío de información sensible. En el proyecto se utiliza POST para el inicio de sesión y para registrar o actualizar productos, mientras que GET se usa para enviar el identificador del producto al momento de editar o eliminar, siguiendo las buenas prácticas de desarrollo web.*


**-Tu app va a usarse en una empresa de la zona oriental. ¿Qué riesgos de seguridad
identificas en una app web con BD que maneja datos de los usuarios? ¿Cómo los
mitigarían?**

*En una aplicación web que maneja base de datos se identifican varios riesgos de seguridad importantes. Uno de los principales es la inyección SQL, donde un atacante podría intentar manipular consultas para acceder, modificar o eliminar información. Para mitigar este riesgo se propone el uso de sentencias preparadas (Prepared Statements), que permiten sanitizar las entradas antes de enviarlas a la base de datos. Otro riesgo es el acceso no autorizado a las páginas administrativas, el cual se controla mediante el uso de sesiones que restringen el acceso a usuarios autenticados. Además, se implementó una separación entre la vista pública y la administrativa del sistema: los visitantes solo pueden visualizar los productos, mientras que los administradores pueden agregar, editar o eliminar información. Estas medidas reducen significativamente los riesgos y fortalecen la seguridad general de la aplicación.*


**Diccionario de Datos**


*Nombre tabla: productos*

| Campo       | Tipo           | Nulo | Descripción |
|-------------|----------------|------|-------------|
| id          | INT (PK)       | No   | Identificador único del producto (AUTO_INCREMENT) |
| nombre      | VARCHAR(100)   | No   | Nombre del producto |
| categoria   | VARCHAR(50)    | No   | Categoría del producto |
| precio      | DECIMAL(10,2)  | No   | Precio del producto |
| descripcion | VARCHAR(100)   | Sí   | Descripción del producto |

*Nombre tabla: usuarios*

| Campo    | Tipo         | Nulo | Descripción |
|----------|--------------|------|-------------|
| id       | INT (PK)     | No   | Identificador único del usuario (AUTO_INCREMENT) |
| username | VARCHAR(100) | No   | Nombre de usuario para iniciar sesión |
| correo   | VARCHAR(100) | No   | Correo del usuario |
| password | VARCHAR(100) | No   | Contraseña del usuario |

# Usuario que se uso:

*Nombre: Admin, Correo:daoz20403@gmail.com, contra: 123*

