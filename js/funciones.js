$(document).ready(function(){
    //evento click menu inicio
        $("#menuInicio").click(function(event){
            $("#divInicio").show("slow");
            $("#divFormulario").hide("slow");
        });
    //evento click del menu usuarios
        $("#menuUsuario").click(function(event){
            $("#divInicio").hide("slow");
            //cargar datos en el div mostrarUsuarios
            $("#divMostrarUsuarios").load("./php/mostrarUser.php");
            $("#divFormulario").show("slow");
        });
        $("#btnNuevo").click(function(event){
            $("#divInicio").hide("slow");
            //cargar datos en el div mostrarUsuarios
            $("#divMostrarUsuarios").load("./php/mostrarUser.php");
            $("#divMostrar").load("./php/mostrar.php");
            $("#divFormulario").show("slow");
        });
        //evento del boton Agregar
        $("#btnAgregar").click(function(event){
            var CURP,NOMBRE,EDAD,SEXO,RITMO,OXIGENACION,accion;
            //guardamos los datos de las cajas de texto
            CURP=$("#txtCURP").val();
            NOMBRE=$("#txtNOMBRE").val();
            EDAD=$("#txtEDAD").val();
            SEXO=$("#txtSEXO").val();
            RITMO=$("#txtRITMO").val();
            OXIGENACION=$("#txtOXIGENACION").val();
            accion="agregarUsuario";
            
            //usamos ajax para el envio de los datos al servidor
            $.ajax({
                url:"./php/servidor.php",
                type:"GET",
                data:{CURP:CURP,NOMBRE:NOMBRE,EDAD:EDAD,SEXO:SEXO,RITMO:RITMO,OXIGENACION:OXIGENACION,accion:accion},
                success:function(respuestaServidor){
                    //comparamos que el servidor regrese un 1
                    if(respuestaServidor=="1"){
                        alertify.success("Registro exitoso");
                        limpiarCampos();
                    }
                    else{
                        alertify.error("No se registro el dato :( ");
                    }
                }   
            });
        });
    });
    function limpiarCampos(){
        $("#txtCURP").val("");
        $("#txtNOMBRE").val("");
        $("#txtEDAD").val("");
        $("#txtSEXO").val("");
        $("#txtRITMO").val("");
        $("#txtOXIGENACION").val("");
        $("#txtCURP").focus();
    }
    

function eliminar(id)
{
    //CONFIRMAR LA ELIMINACION
    alertify.confirm("¿Seguro de eliminar el registro con id"+id+"?", function(respuesta)
    {
        if(respuesta)
    {
        $.ajax({
            url:"./php/servidor.php",
            type:"GET",
            data:{id:id, accion:"eliminarUsuario"},
            success:function(respuestaServidor)
            {
                if(respuestaServidor=="1"){
                    alertify.success("Eliminacion correcta");
                $("#divMostrarUsuarios").load("./php/mostrarUser.php");
               
                }
            }
        });
    }
 });
}





