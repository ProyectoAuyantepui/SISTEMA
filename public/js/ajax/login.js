$(".form-login").on("submit",function(event){
    event.preventDefault()
    if ( !$(this).valid() ) { return false; }

    $.ajax({ 
        dataType : 'json',
        type:'POST',
        url:'index.php?controlador=login&actividad=iniciar-sesion',
        data:{
          "clave" : $(".form-login input[name=clave]").val( ),
          "usuario" : $(".form-login input[name=usuario]").val( )
        } 
    })                      
    .done(function(respuesta){
        console.log(respuesta)
        if (respuesta.operacion == false && respuesta.error == "1") {


            Materialize.toast(

                'Error, Usuario invalido',
                
                1700
            );

            $("body").find("input[name='usuario']").addClass("invalid").next("label").attr("data-error","Usuario invalido..")

            
            
                                 
        }else if (respuesta.operacion == false && respuesta.error == "2") {


            Materialize.toast(

                'Error, Contraseña invalida...',
                
                1700
            );

            $("body").find("input[name='clave']").addClass("invalid").next("label").attr("data-error","Contraseña invalida..")
            
                                 
        }else if (respuesta.operacion == false && respuesta.error == "3") {


            Materialize.toast(
                'Usuario Bloqueado ',
                3500
            );

            $("body").find("input[name='clave']").addClass("invalid").next("label").attr("data-error","Usuario Bloqueado, haga click en ¿Olvidó su contraseña?")
            
                                 
        }else if (respuesta.operacion == false && respuesta.error == "5") {

            Materialize.toast(
                respuesta.codigo,
                7000
            );

            if (respuesta.tipo == "1") {
                $("#errorDatabase").removeClass('oculto')
            }else{

            }
                                 
        }else if ( respuesta.operacion == true ){

            sessionStorage.setItem( 'user' , JSON.stringify( respuesta.data ) )
            /*var o = JSON.parse( sessionStorage.getItem( 'user' ) )
            console.log('objetoObtenido: ', o.rol[0].nombre )
            console.log(  respuesta.data.rol.nombre )
            console.log(  respuesta )*/
            
            Materialize.toast('Bienvenido '+ respuesta.data.nombre +'...',1700,'',function(){ location.href = '?controlador=home&actividad=index' });
          
            
        }
    })
})