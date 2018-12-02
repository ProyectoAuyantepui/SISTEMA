$(function(){
  var OUser = JSON.parse( localStorage.getItem( 'user' ) )
 
  $.getJSON('?controlador=categorias&actividad=listar',function(respuesta){
    $.each( respuesta.data, function( i , item ){

      $(".input-field select#codCatDoc").append(`<option value="${item.codCatDoc}">${item.nombre}</option>`)
    })

    $('select#codCatDoc').val( OUser.categoria.codCatDoc )
  })
  $("input[name=cedDoc]").val( OUser.cedDoc )
  $("input[name=nombre]").val( OUser.nombre )
  $("input[name=apellido]").val( OUser.apellido )
  $("input[name=fecNac]").val( OUser.fecNac )
  if ( OUser.sexo == 1 ) { $("#crear_sexo1").attr( "checked" , true ) }
  if ( OUser.sexo == 2 ) { $("#crear_sexo2").attr( "checked" , true ) }
  $("input[name=telefono]").val( OUser.telefono )
  $("input[name=direccion]").val( OUser.direccion )
  $("input[name=correo]").val( OUser.correo )
  $("input[name=usuario]").val( OUser.usuario )
  $("select[name=avatar]").val( OUser.avatar )

  var contentDependencias = $("")
  $.each( OUser.dependencias ,function( i , item ){
      contentDependencias = `<li class="collection-item">
                              <span class="card-content">${item.nombre}</span>
                            </li>`
      $("ul.dependencias").append( contentDependencias )
  })

  var contentComisiones = $("")
  $.each( OUser.comisiones ,function( i , item ){
      contentComisiones = `<li class="collection-item">
                            <span class="card-content">${item.nombre}</span>
                          </li>`
      $("ul.comisiones").append( contentComisiones )
  })
})

function modificar( formulario ){

    $.ajax({    
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=perfil&actividad=modificar' ,
        data: formulario.serialize() 
    })
    
    .done(function(respuesta){

 if (respuesta.operacion == true) {
            Materialize.toast('Listo...',997)
                                    
        }else{   
            Materialize.toast('Error...',997)
        }
    })
}

function actualizarClave( cedDoc, claveVieja, claveNueva ){

    $.ajax({    
        dataType : 'json' , 
        type:'POST' , 
        url:'index.php?controlador=perfil&actividad=actualizar-clave' ,
        data: { 

          "cedDoc" : cedDoc,
          "claveVieja" : claveVieja,
          "claveNueva" : claveNueva 
        }
    })
    
    .done(function(respuesta){

        if (respuesta.operacion == false && respuesta.error == "1") {


            Materialize.toast(

                'Error, La contraseña no coincide con nuestra base de datos',
                
                2200
            );

            $("body").find("input[name='claveVieja']").addClass("invalid").next("label").attr("data-error","La contraseña no es correcta..")
            
        }   
        else{
          Materialize.toast(

                'Hemos actualizado su contraseña!',
                
                2200
            );
        }   
    })
}


$('#form-datos-perfil').on("submit",function(evento){  
    
    evento.preventDefault() 
        
    if( !$(this).valid() ) return false;       
        
    modificar( $(this) )
})


$(".formCambiarClave").on("submit",function(event){
    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

        if (respuesta.operacion == false && respuesta.error == "1") {

            Materialize.toast(

                'Error, Usuario invalido',
                
                1700
            );

            $("body").find("input[name='claveVieja']").addClass("invalid").next("label").attr("data-error","Usuario invalido..")
        }      
})