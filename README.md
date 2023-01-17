# A5.4 - Listado de productos

En esta actividad implementaremos el listado de todos los productos de nuestra tienda. De momento, los productos estarán almacenados en un array.

Pero antes de implementar esta nueva funcionalidad, realizaremos los siguientes cambios en el código de la actividad A5.3:

- Cambia la ruta de la página principal para que sea gestionada por el método "index", que crearemos en el controlador ya existente: HomeController. De esta forma, eliminamos la función anónima que comentamos recientemente que deberíamos intentar evitar.

- Deberíamos modificar los nombres de las variables usadas en el método "about()" del controlador para que sus nombres sea representativos. INTENTA EVITAR denominaciones de ese tipo. PERO ANTES:

- Vamos a intentar enviar a los controladores, desde el router, un array con la información necesaria. En lugar de enviar muchas variables. Si necesitamos pasar mucha información tendríamos que utilizar muchas invocaciones al método "with", lo cual "ensuciaría" el código. Por lo tanto, modifica el código (de web.php y de la vista correspondiente) para pasar toda la información en un array y utilizar índices a ese array identificativos.

## Listado de productos

- Crea una nueva ruta denominada "/products" que será gestionada por el método "index()" de un nuevo controlador: "ProductController".

- En el controlador, crea un array público **estático** denominado $products que contenga los campos "id", "name", "description", "image" y "price". Inserta en él, al menos, 4 productos. El primer id deberá ser el 1 y el resto serán consecutivos.

- El método index() del nuevo controlador deberá redirigir al usuario a la nueva vista que tendremos que implementar (con el contenido del fichero "products.txt" adjunto). Deberás enviarle a la vista los campos "title", "subtitle", y "products". La nueva vista se denominará "/resources/views/product/index.blade.php".

- Modifica el código de la vista para, utilizando la directiva @foreach, mostrar al usuario el listado de productos.
De momento, el enlace al producto debe quedar vacío (hasta que implementemos esta funcionalidad).
Utiliza imágenes con las mismas dimensiones que las alojadas en "public/img".

- Añade un nuevo enlace a la plantilla de nuestra aplicación para que podamos enlazar con el listado de productos. Utiliza el texto "Productos" para dicho enlace.

## Detalles del producto

- Crea una nueva ruta denominada "/products/**{id}**" que será gestionada por el método "show($id)" del controlador "ProductController". Esta ruta se utilizará para mostrar los datos de un producto determinado (el indicado por el parámetro "id"). Por ejemplo, si accedemos a "/products/1" la aplicación mostrará los datos del producto cuyo id es 1.

- El método show($id) del nuevo controlador deberá redirigir al usuario a la nueva vista que tendremos que implementar (con el contenido del fichero "show.txt" adjunto). Deberás enviarle a la vista los campos "title", "subtitle", y "products". La nueva vista se denominará "/resources/views/product/index.blade.php".
Por último, añade al menú superior un enlace que apunte a la ruta que muestra el listado de productos.
