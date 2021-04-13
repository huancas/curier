<?php  require_once('../inc/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Producto
        <small>formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">formulario</a></li>
        <li class="active">Producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus-circle"></i> Nuevo Producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre(*):</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Texto">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio(*):</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Texto">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Oferta(*):</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Texto">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Precio Oferta:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Texto">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Categoria</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Ficha Tecnica</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control"></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="imagen" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar Imagen</label>
                 <input id="imagen" name="imagen"  type="file" class="upload" onchange="return validarExt()">
                <label for="imagen" class="custom-imagen-rojo"> <i class="fa fa-file-pdf-o" ></i> Seleccionar PDF</label>
                 <input id="imagen" name="imagen"  type="file" class="upload" onchange="return validarExt()">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                <a href="#" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-4">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-image"></i> Imagen</h3>
            </div>
            <form class="form-horizontal">
              <div id="visorArchivo" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
        <!--Aqui se desplegará el fichero-->
         <img src="https://codigo-promocional-deportes.com/wp-content/themes/EMDtemplate/img/placeholder/500x500.gif" style="width: 20em;display: block;margin: auto;margin-bottom: 30px;margin-top: 30px;">
          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <p>Asegurese que la imagen coincida con el archivo selecionado.</p>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php  require_once('../inc/footer.php'); ?>
