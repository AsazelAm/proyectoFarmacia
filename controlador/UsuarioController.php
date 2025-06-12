<?php
//incluimos el modelo usuario
include_once '../modelo/Usuario.php';
//Instaciomos al objeto del modelo Usuario.php para usar sus metodos
$usuario=new Usuario();
//nesecitamos comparar con un if cual funcion se esta realizando vamos a indenpedizar cada funcion
if($_POST['funcion']=='buscar_usuario'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $json=array();
    $usuario->obtener_datos($_POST['dato']);
    //hacemos un foreach para recorrer todos los datos
    foreach($usuario->objetos as $objeto){
    //vamos hacer nuestro json
    /*Este json obtiene todos los datos de las tablas q nosotros queremos obtener */
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'edad'=>$objeto->edad,
            'dni'=>$objeto->dni_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring=json_encode($json[0]);//el json_encode nos devuelve un string de json codificado
    echo $jsonstring;
}

if($_POST['funcion']=='capturar_datos'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_datos($id_usuario);
    //hacemos un foreach para recorrer todos los datos
    foreach($usuario->objetos as $objeto){
    //vamos hacer nuestro json
    /*Este json obtiene todos los datos de las tablas q nosotros queremos obtener */
        $json[]=array(
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring=json_encode($json[0]);//el json_encode nos devuelve un string de json codificado
    echo $jsonstring;
}

if($_POST['funcion']=='editar_usuario'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    //hacemos un foreach para recorrer todos los datos
    $telefono=$_POST['telefono'];
    $residencia=$_POST['residencia'];
    $correo=$_POST['correo'];
    $sexo=$_POST['sexo'];
    $adicional=$_POST['adicional'];

    $usuario->editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional);

    echo 'editado';
}
?>