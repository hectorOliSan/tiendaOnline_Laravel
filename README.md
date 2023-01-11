# A5.3 - Creación de un controlador y de las páginas princial y 'about'

En esta actividad vamos a crear dos nuevas páginas: Una página principal asociada a la ruta "/" y una página titulada "Acerca de". Ambas páginas deberán estar accesibles a través de los enlaces del menú principal.

## Página principal

Añade a tu aplicación la carpeta "/public/img" y copia en ella las imágenes adjuntas.

Crea la carpeta "/resources/views/home" y dentro de ella añade una vista que contendrá la nueva página principal de nuestra aplicación: "index.blade.php". Su contenido será el del fichero "index.php" adjunto, teniendo en cuenta que las rutas de las imágenes las deberás sustituir por las rutas absolutas (para construir las rutas utiliza el helper "asset") y que el título deberás sustituirlo por una string que tendrás que pasar a través de una función anónima definida en el router ("/").

## Página 'acerca de'

Crea, en la carpeta "/resources/views/home", la vista "about.blade.php", e incluye en ella el código contenido en el fichero adjunto "about.php". Para acceder a esta nueva página, crea un nuevo controlador (utilizando artisan) denominado "HomeController". En dicho controlador deberás implementar el método "about" que devolverá la vista correspondiente con las asignaciones de variables necesarias para que la página se muestre correctamente.

## Helper 'now'

Utiliza el helper "now" para mostrar, en el pie de página, la fecha y la hora actuales

## Helper 'route'

Utiliza el helper "route" para enlazar, en el encabezado, las dos nuevas páginas utilizando los nombres de sus rutas, en lugar de utilizar una string.
