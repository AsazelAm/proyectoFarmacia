<?php
//incluimos el modelo usuario
include_once '../modelo/Usuario.php';
//Instaciomos al objeto del modelo Usuario.php para usar sus metodos
$usuario=new Usuario();
session_start();
$id_usuario=$_SESSION['usuario'];
//nesecitamos comparar con un if cual funcion se esta realizando vamos a indenpedizar cada funcion
if($_POST['funcion']=='buscar_usuario'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $json=array();

    $fecha_actual=new DateTime();

    $usuario->obtener_datos($_POST['dato']);
    //hacemos un foreach para recorrer todos los datos
    foreach($usuario->objetos as $objeto){
        $nacimiento=new DateTime($objeto->edad);
        $edad=$nacimiento->diff($fecha_actual);
        $edad_years=$edad->y; //y para saber los años
    //vamos hacer nuestro json
    /*Este json obtiene todos los datos de las tablas q nosotros queremos obtener */
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'edad'=> $edad_years,
            'dni'=>$objeto->dni_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'avatar'=>'../img/'.$objeto->avatar
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

if($_POST['funcion']=='cambiar_contra'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $id_usuario=$_POST['id_usuario'];
    //hacemos un foreach para recorrer todos los datos
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    
    $usuario->cambiar_contra($id_usuario,$oldpass,$newpass);

}

if($_POST['funcion']=='cambiar_foto'){
    if(($_FILES['photo']['type']=='image/jpeg') || ($_FILES['photo']['type']=='image/png')|| ($_FILES['photo']['type']=='image/gif')){
        $nombre=uniqid().'-'.$_FILES['photo']['name'];
        $ruta='../img/'.$nombre;

        move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
        $usuario->cambiar_photo($id_usuario,$nombre);

        foreach($usuario->objetos as $objeto){
            unlink('../img/'.$objeto->avatar);
        }
        $json=array();
        $json[]=array(
            'ruta'=>$ruta,
            'alert'=>'edit'
        );
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }else{
        $json=array();
        $json[]=array(
            'alert'=>'noedit'
        );
        $jsonstring=json_encode($json[0]);
        echo $jsonstring;
    }
}

if($_POST['funcion']=='buscar_usuarios_adm'){
//llamamos al objeto luego creamos una funcion donde va a buscar todos los datos pertenecientes a ese id
    $json=array();

    $fecha_actual=new DateTime();

    $usuario->buscar();
    //hacemos un foreach para recorrer todos los datos
    foreach($usuario->objetos as $objeto){
        $nacimiento=new DateTime($objeto->edad);
        $edad=$nacimiento->diff($fecha_actual);
        $edad_years=$edad->y; //y para saber los años
    //vamos hacer nuestro json
    /*Este json obtiene todos los datos de las tablas q nosotros queremos obtener */
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellidos'=>$objeto->apellidos_us,
            'edad'=> $edad_years,
            'dni'=>$objeto->dni_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us,
            'avatar'=>'../img/'.$objeto->avatar,
            'tipo_usuario'=>$objeto->us_tipo
        );
    }
    $jsonstring=json_encode($json);//el json_encode nos devuelve un string de json codificado
    echo $jsonstring;
}

if($_POST['funcion']=='crear_usuario'){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $edad=$_POST['edad'];
    $dni=$_POST['dni'];
    $pass=$_POST['pass'];
    $tipo=2;
    $avatar='default.jpg';
    $usuario->crear($nombre,$apellido,$edad,$dni,$pass,$tipo,$avatar);

}


?>