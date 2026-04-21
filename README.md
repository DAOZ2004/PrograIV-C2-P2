# Integrantes:

**Andrea Yamileth Rodriguez Hernandez   SMSS073124**


**Daniel Antonio Orellana Zelaya        SMSS086223**


**-¿Cómo manejan la conexión a la BD y qué pasa si algunos de los datos son incorrectos?**

*Manejamos la conexión mediante la función mysqli_connect en PHP. 
Para validar, utilizamos una estructura condicional que verifica si la variable de conexión es falsa. 
Si los datos son incorrectos (host, usuario o contraseña errónea), el sistema detiene la carga con un mensaje de error controlado,
evitando que la aplicación exponga errores del sistema al usuario final. 
Justificamos esto como una medida de estabilidad básica.*


**-¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno?**

*$_GET envía la información a través de la URL de forma visible, 
lo que lo hace ideal para búsquedas o filtros que el usuario quiera compartir o guardar en marcadores.
$_POST envía la información en el cuerpo de la petición HTTP de forma oculta; es apropiado para enviar contraseñas o registrar productos.*

*Ejemplo en el proyecto: Usamos POST para enviar los datos del formulario de "Registrar Nuevo Producto" para asegurar que la información no sea manipulada en la URL.*


**-Tu app va a usarse en una empresa de la zona oriental. ¿Qué riesgos de seguridad
identificas en una app web con BD que maneja datos de los usuarios? ¿Cómo los
mitigarían?**

*Riesgos de seguridad en una app web con BD (Zona Oriental) y mitigación: 
Identificamos el riesgo de Inyección SQL, donde un atacante podría intentar borrar la tabla de productos de la base de datos de "La Despensa".
Para mitigarlo, implementaremos Sentencias Preparadas (Prepared Statements) para sanitizar cualquier entrada de datos antes de que llegue a la base de datos.*


**Diccionario de Datos**


*Nombre tabla: productos*

| Columna            | Tipo de dato | Límite de caracteres | ¿Es nulo? | Descripción |
|--------------------|-------------|----------------------|-----------|-------------|
| id_producto        | INT         | Auto-increment       | No        | Llave primaria de la tabla. |
| nombre_producto    | VARCHAR     | 100                  | No        | Nombre descriptivo del artículo. |
| categoria          | VARCHAR     | 50                   | No        | Grupo al que pertenece el producto. |
| precio             | DECIMAL     | 10,2                 | No        | Valor monetario del producto. |
| stock_disponible   | VARCHAR     | 2                    | No        | Indica si hay existencias (SI/NO). |
| especificaciones   | TEXT        | Sin límite           | Sí        | Notas adicionales del producto. |

*Nombre tabla: usuarios*



