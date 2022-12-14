<?php

include "conexion.php";
//recibimos la accion a realizar enviado desde el formulario
$accion=$_GET["accion"];
//evaluamos la accion
switch($accion){
    case 'agregarUsuario':
        //recibimos los datos enviados por el formulario
        $CURP=$_GET["CURP"];
        $NOMBRE=$_GET["NOMBRE"];
        $EDAD=$_GET["EDAD"];
        $SEXO=$_GET["SEXO"];
        $RITMO=$_GET["RITMO"];
        $OXIGENACION=$_GET["OXIGENACION"];
        //se especifica el sql a realizar
        $sql="insert into max30102 values (0,'$CURP','$NOMBRE','$EDAD','$SEXO','$RITMO','$OXIGENACION')";
        //ejutar la sentencia
        $ejecutaSQL=$conexion->query($sql);
        //comprobamos si la ejecucion fue correcta
        if($ejecutaSQL){
            echo "1";
        }
        else
        {
            echo "0";
        }
        break;

            //otro case

            case 'eliminarUsuario':
                //recibimos los datos enviados por el formulario
                $id=$_GET["id"];
               
                //se especifica el sql a realizar
                $sql="delete from max30102 where id='$id'";
                //ejutar la sentencia
                $ejecutaSQL=$conexion->query($sql);
                //comprobamos si la ejecucion fue correcta
                if($ejecutaSQL){
                    echo "1";
                }
                else
                {
                    echo "0";
                }
                break; 
    }
?>