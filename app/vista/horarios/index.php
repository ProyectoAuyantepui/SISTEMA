<?php $titulo = "Gestion de horarios";?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/vendor/materialize/icons/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/vendor/materialize/css/materialize.css">
    <link rel="icon" type="image/png" href="public/img/logo.png">
    <link rel="stylesheet" type="text/css" href="public/css/mejoras-materialize.css">
    <title>Auyantepui - <?= $titulo ?></title>
</head>
<body>
<?php  require_once "app/vista/plantilla/__navbar.php"; ?>
<main >

  <section class="row titulo">

    <div class="col s6  ">
      <h5 class="valign ">Gestión de horarios</h5>
    </div>

    <div class="col s6 right-align ">
      <h5 class="valign ">
        Consulta rapida
        <a 
          class="btn-floating btn-large waves-effect waves-light  primario" 
          href="?controlador=horarios&actividad=consulta-rapida-horarios" 
          
        >
          <i class="material-icons">search</i>
        </a>
      </h5>
    </div>
  
  </section>

  <section class="row">

    <div class="col s12 valign-wrapper">
      <h5 class="valign">Gestion de horarios</h5>
    </div>
  


    <div class="col s12 m4">

      <div class="card ">

        <div class="center-align cyan tarjeta" >
          <img src="public/img/teacher.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIOS DE DOCENTES</p>
        </div>

        <div class="card-content row" style="padding: 0px;">
          <p class="col s12" style="padding: 30px 30px 1px 30px;">
            <span class="btn-floating primario">
              <i class="material-icons left">settings</i>
            </span>
            Este módulo corresponde a la gestion de Horarios de Docentes en el sistema. 
          </p>

          <p class="col s12" style="padding: 30px 30px 1px 30px;">
                    
            <span class="btn-floating cyan">
              <i class="material-icons left">add</i>
            </span>
            Atraves de este modulo de Horarios de Docentes puede asignar actividades administrativas en al horario del docente.
          </p>

          <p class="col s12" style="padding: 30px 30px 1px 30px;">
                    
            <span class="btn-floating red">
              <i class="material-icons left">delete</i> 
            </span>

            <span class="btn-floating green">
              <i class="material-icons left">edit</i>
            </span>

            Así como también modificar los datos de actividades o eliminar las actividades administrativas existentes en el horario del docente.
          </p>
        </div>

        <div class="card-action">
          <div class="row">
            <a href="?controlador=horariosDocentes&actividad=index" class="btn btn-lg cyan col s12 waves-effect">GESTIONAR HORARIOS DE DOCENTES</a>   
          </div>      
        </div>

      </div>

    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="center-align green  tarjeta" >
          <img src="public/img/section.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIOS DE SECCIONES</p>
        </div>

        <div class="card-content row" style="padding: 0px;">
          <p class="col s12" style="padding: 30px 30px 1px 30px;">
            <a class="btn-floating primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion de Horarios de Secciones en el sistema 
          </p>

          <p class="col s12" style="padding: 30px 30px 1px 30px;">
            
            <a class="btn-floating cyan">
              <i class="material-icons left">add</i>
            </a>
            Atraves de este modulo de Horarios de Secciones puede asignar actividades en al horario de la seccion
          </p>

          <p class="col s12" style="padding: 30px 30px 1px 30px;">
            
            <a class="btn-floating red">
              <i class="material-icons left">delete</i> 
            </a>

            <a class="btn-floating green">
              <i class="material-icons left">edit</i>
            </a>

            Así como también modificar los datos de actividades o eliminar las actividades existentes en el horario de la seccion
          </p>

        </div>

        <div class="card-action">
          <div class="row">
            <a href="?controlador=horariosSecciones&actividad=index" class="btn btn-lg green  col s12 waves-effect">
            GESTIONAR HORARIOS DE SECCIONES
            </a>    
          </div>
                
        </div>
      </div>
    </div>

    <div class="col s12 m4">

      <div class="card ">
        <div class="center-align deep-orange tarjeta" >
          <img src="public/img/institution.png" alt="" class="responsive-img " width="90">
          <p class="titulo-tarjeta" >HORARIOS DE AMBIENTES</p>
        </div>

        <div class="card-content row" style="padding: 0px;">
          <p class="col s12" style="padding: 30px 30px 1px 30px;">
            <a class="btn-floating primario">
              <i class="material-icons left">settings</i>
            </a>
            Este módulo corresponde a la gestion de Horarios de Ambientes en el sistema. 
          </p>

          <p class="col s12" style="padding: 30px 30px 1px 30px;">
                    
            <a class="btn-floating green">
              <i class="material-icons left">search</i>
            </a>
            Atraves de este modulo de Horarios de Ambientes puede consultar el horario de un ambiente existente en el sistema, siempre y cuando este tenga actividades.
          </p>
        </div>
        <div class="card-action">
          <div class="row">
            <a href="?controlador=horariosAmbientes&actividad=index" class="btn btn-lg deep-orange col s12 waves-effect">
            GESTIONAR HORARIOS DE AMBIENTES
            </a>    
          </div>
                
        </div>
      </div>
    </div>

  </section>

</main>

<?php require_once "app/vista/plantilla/__scripts.php";  ?>

<script src="public/js/ajax/menu.js"></script>
<script src="public/vendor/jvalidate/jquery.validate.min.js"></script>
<script src="public/vendor/jvalidate/additional-methods.min.js"></script>
<script src="public/js/validaciones/config-default.js"></script>

</body>
</html>