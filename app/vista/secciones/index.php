<?php $titulo = "SECCIONES";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <title>Auyantepui - <?= $titulo ?></title>
</head>

<body>
<?php require_once "app/vista/plantilla/__navbar.php";  ?>

<main>
  <section class="row" >
   <div class="col s12 m3">
      <div class="card ">
        
        <div class="center-align purple tarjeta" style="padding: 24px 0px 2px 0px;margin: 0px;">
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta"  >SECCIONES</p>
        </div>
        <div class="card-content row">
          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            Este módulo corresponde a la gestion de Secciones en el sistema 

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
            
              <i class="material-icons left">add</i>
            Atraves de este modulo puede crear nuevas Secciones.
          </p>

          <p class="col s12" style="padding: 10px 1px 1px 1px;">
              <i class="material-icons left">search</i>

              <i class="material-icons left">edit</i>

              <i class="material-icons left">delete</i> 

            Así como también consultar , modificar los datos o eliminar las Secciones existentes en el sistema
          </p>

        </div>
      </div>
    </div>


    <div class="col m9">
      <div class="card ">

        <div class=" white-text" style="padding: 0px; margin:0px;">

          <nav class="primario">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" name="filtro" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>

        </div>

        <div class="card-content" >


          
           <table id="tabla_secciones" class="bordered highlight">
            <thead id="thead">
              <tr id="thead">
                <th >
                  <p ><strong>Codigo</strong></p>
                </th>
                <th >
                  <p><strong>Trayecto</strong></p>
                </th>
                <th >
                  <p><strong>Turno</strong></p>
                </th>
                <th >
                  <p><strong>Estado</strong></p>
                </th>
                <th ></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table> 

          <div class="mensaje valign-wrapper grey-text">
            <i class="material-icons left">close</i>
            <h5 >No se encuentran resultados..</h5>
          </div>

        </div>
      </div>
    </div>
    
  </section>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large pulse waves-effect waves-light  secundario   crear-Seccion">
      <i class="material-icons">add</i>
    </a>
  </div>

</main>

<!-- VENTANAS DE DIALOGO -->
<?php require_once "__dialogos.php"; ?>
<?php require_once "app/vista/plantilla/__scripts.php";  ?> 
<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/paginacion.js"></script>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>
<script src="public/js/validaciones/secciones.js"></script>
<script src="public/js/ajax/secciones.js"></script>
</body>
</html>