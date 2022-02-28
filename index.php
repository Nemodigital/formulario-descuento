<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>Descuento de 10%</title>
  </head>
  <body>
    
    <div class="container caja">
    <div class="row mt-4">
        <h1 class="text-center">Regístrate y presenta el código en un punto de venta</h1>
    </div>

    <div class="row mt-4 mx-4">
        <!-- Aquí configuramos los mensajes de información -->
        <?php if(isset($_GET["error"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo $_GET["error"]; ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Aquí configuramos los mensajes de error -->
        <?php if(isset($_GET["mensaje"]) && isset($_GET["error"])) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo $_GET["mensaje"] . " Su Código: " . $_GET["error"]; ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    
        <form method="POST" action="procesar.php">
            <div class="row">
                <div class="col-sm-8">
                    <h5>Los campos con (*) son obligatorios</h5>
                </div>
            </div>
            <div class="row">                
                <div class="col-sm-6">
                <div class="mb-3">
                        <label for="dni" class="form-label">D.N.I (*):</label>
                        <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingresa tu número de D.N.I">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre (*):</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono (*):</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingresa tu teléfono">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email (*):</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ingresa tu email">
                    </div>

                    <div class="mb-3">
                        <label for="dirección" class="form-label">Dirección (*):</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingresa tu direccion">
                    </div>

                    <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia (*):</label>
                    <select class="form-select w-100" name="provincia">
                        <option value="">--Selecciona un departamento--</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Antioquia">Antioquia</option>
                        <option value="Arauca">Arauca</option>
                        <option value="Atlántico">Atlántico</option>
                        <option value="Bolívar">Bolívar</option>
                        <option value="Boyacá">Boyacá</option>
                        <option value="Caldas">Caldas</option>
                        <option value="Caquetá">Caquetá</option>
                        <option value="Casanare">Casanare</option>
                        <option value="Cauca">Cauca</option>
                        <option value="Cesar">Cesar</option>
                        <option value="Chocó">Chocó</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Cundinamarca">Cundinamarca</option>
                        <option value="Guainía">Guainía</option>
                        <option value="Guaviare">Guaviare</option>
                        <option value="Huila">Huila</option>
                        <option value="La Guajira">La Guajira</option>
                        <option value="Magdalena">Magdalena</option>
                        <option value="Meta">Meta</option>
                        <option value="Nariño">Nariño</option>
                        <option value="Norte de Santander">Norte de Santander</option>
                        <option value="Putumayo">Putumayo</option>
                        <option value="Quindío">Quindío</option>
                        <option value="Risaralda">Risaralda</option>
                        <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                        <option value="Santander">Santander</option>
                        <option value="Sucre">Sucre</option>
                        <option value="Tolima">Tolima</option>
                        <option value="Valle del Cauca">Valle del Cauca</option>
                        <option value="Vaupés">Vaupés</option>
                        <option value="Vichada">Vichada</option>
                    </select>
                    </div>
                <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad (*):</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ingresa tu ciudad">
                </div>
                <button type="submit" name="btnRegistrarse" class="btn btn-success btn-xl w-100 btnRegistrarse">REGISTRARSE</button>
                </div>
                <div class="col-sm-6">
                   <img src="img/mujer_bg.png" class="img-fluid">
                </div>
            </div>     

        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>