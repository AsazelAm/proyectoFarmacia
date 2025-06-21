<?php
session_start();
if($_SESSION['us_tipo']==1 ||$_SESSION['us_tipo']==3){
    include_once'layouts/header.php';
?>
  <title>Adm | Editar Datos</title>

  <?php
  include_once'layouts/nav.php';
  ?>
  
    <div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Crear Usuario</h3>
                  <button data-dismiss="modal" aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="card-body">
                  <div class="alert alert-success text-center" id="add" style="display:none;">
                      <span><i class="fas fa-check m-1"></i>Se agrego Correctamente</span>
                  </div>
                  <div class="alert alert-danger text-center" id="noadd" style="display:none;">
                      <span><i class="fas fa-times m-1"></i>El dni ya existe en otro Usuario</span>
                  </div>
                  <form id="form-crear">
                    <div class="form-group">
                      <label for="nombre">Nombres</label>
                      <input id="nombre"type="text" class="form-control" placeholder="Ingrese Nombre"required>
                    </div>
                    <div class="form-group">
                      <label for="apellido">Apellidos</label>
                      <input id="apellido" type="text" class="form-control"placeholder="Ingrese Apellido"required>
                    </div>
                    <div class="form-group">
                      <label for="edad">Nacimiento</label>
                      <input id="edad"type="date" class="form-control"placeholder="Ingrese Nacimiento" required>
                    </div>
                    <div class="form-group">
                      <label for="dni">DNI</label>
                      <input type="text" class="form-control" id="dni"placeholder="Ingrese Dni" required>
                    </div>
                    <div class="form-group">
                      <label for="pass">Password</label>
                      <input type="password" id="pass"class="form-control" placeholder="Ingrese Password" required>
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
                  <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion usuario<button id="button-crear" type="button" data-toggle="modal" data-target="#crearusuario"class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
            <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo']?>">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section>
    <!-- Main content 
    nueva forma para crear los divs 
    div.card.card-success>(div.card-header+div.card-body+div.card-footer)-->
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Buscar Usuario</h3>
                <!--div.input-group>((input.form-control.float-left)+(div.input-group-append>button.btn.btn-default>i.fas.fa-search))-->
                <div class="input-group">
                    <input type="text" id="buscar"placeholder="Ingrese nombre del Usuario" class="form-control float-left">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="usuarios"class="row d-flex align-items-stretch">
                  
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
 <?php
 include_once'layouts/footer.php';
 ?>

<?php
}else{
    header('Location:../index.php');
}
?>
<script src="../js/Gestion_usuario.js"></script>