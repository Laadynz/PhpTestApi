<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamando al API</title>
    <script>
        async function buscarProducto(){

            var codigo = document.getElementById('codigo').value;
            const url = 'http://localhost/apiphp/productos.php?codigo='+codigo;
            await fetch(url)
            .then(response => {
                if(!response.ok){
                    throw new Error('Error en la petición');
                }
                return response.json();
            }

            )
            .then(data => {
                document.getElementById('salida').innerHTML = data.nombre_producto+' - '+data.precio;
            })
            .catch(error => {
                document.getElementById('salida').innerHTML = 'Error: '+error;
            });
        }
    </script>
</head>
<body>

    <input type="text" name="" id="codigo" value="P001"> 
    <input type="button" value="Buscar Producto" onclick="buscarProducto()">

    <p id="salida"></p>

</body>
</html>