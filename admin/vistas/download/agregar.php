<?php  require_once('../inc/header.php'); 
$title_page='Solicitud Pedido';
$title_page_pref='Nuevo';
$msg = "";
    if (isset($_POST['registrar'])) {
        $target = "../imagenes/".basename($_FILES['image']['name']);
        $db = conexion::connect();
        $image = $_FILES['image']['name'];
        $nom_tramite = $_POST['nom_tramite'];
        $descripcion = $_POST['descripcion'];
        $texto_boton = $_POST['texto_boton'];
        $url_boton = $_POST['url_boton'];
        $target2 ="../pdf/".basename($_FILES['fchtecnica']['name']);
        $fchtecnica = $_FILES['fchtecnica']['name'];
        $fchselecion = $_POST['fchselecion'];
        $precio = $_POST['precio'];
		$precio = $_POST['precio'];
        $idcat = $_POST['idcat'];
		$oferta = $_POST['oferta'];
        $estado = $_POST['estado'];
       
        $sql = "INSERT INTO descargas (nombre_des, descripcion,texto_boton,url_boton,url_descarga,fchtecnica,fchselecion,precio,oferta,estado,categoria_idcate) VALUES ('$nom_tramite', '$descripcion','$texto_boton','$url_boton','$image','$fchtecnica','$fchselecion','$precio','$oferta','$estado','$idcat')";
        $db->query($sql);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            echo "
			<script>
			window.location='listar.php';
			</script>
			";
        
        }
         if (move_uploaded_file($_FILES['fchtecnica']['tmp_name'], $target2)) {
            $msg = "Image uploaded successfully";
            echo "
			<script>
			window.location='listar.php';
			</script>
			";
        
        }
        else{
            $msg = "Theme was a desblem uploading image";
        }
    }
    if (isset($_POST['registrarCat'])) {
       
        $db = conexion::connect();
      
        $nomc = $_POST['nom_cat'];
        $nom_cat= strtoupper ($nomc);
       
       
        $sql = "INSERT INTO categoria (nombre_cat, tipo_cat) VALUES ('$nom_cat','descargas')";
        $db->query($sql);
        }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo($title_page) ?>
        <small>formulario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">formulario</a></li>
        <li class="active"><?php echo($title_page) ?></li>
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
              <h3 class="box-title"><i class="fa fa-plus-circle"></i><?php echo($title_page_pref.' '.$title_page) ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="frm-tramite" action="agregar.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
            <!-- /.col -->
            <div class="col-md-8">
              <div class="form-group">
                <label>DNI /RUC:</label>
                <input id="nom_tramite" name="no_doc" type="text"   class="form-control"></input>
              </div>
              
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
              <div class="form-group">
  <label for="exampleFormControlTextarea2">Detalle (En español)</label>
  <textarea name="detalle" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
</div>
            </div>
            <div class="col-md-8">
               <label>Codigo Tracking:</label>
            <div class="input-group">

  <input type="text" class="form-control" id="cod_track">
  <span class="input-group-btn">
    <button class="btn btn-default" type="button" onclick="addRow()">Agregar</button>
  </span>
</div>
</div>
<!-- table--->
  <div class="col-md-8">
    <table class="table table-sm" id="tracking_table">
  <thead>
    <tr>
      
      <th scope="col">Codigo</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <!-- <th scope="row">1</th> 
      <td>Mark</td>
      <td><button type="button" class="btn btn-danger btn-sm">
          <span class="glyphicon glyphicon-remove"></span> 
        </button></td>-->
      
    </tr> 
   
  </tbody>
</table>
    </div>
    <!-- /table--->
             <div class="col-md-8">
             <!-- <form id="formID" method="post" action=""  enctype="multipart/form-data"> -->
                
               <div class="form-group">
                  <label for="image" class="custom-imagen-amarillo"> <i class="fa fa-upload" ></i> Seleccionar Archivo</label>
                 <input id="image" name="archivo"  type="file" class="upload" 
                 onchange="sendFile()"  >
               
                </div>
            <!--  </form> -->
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

          </div>
          <div class="list-group" id="list_files">
  <a href="#" class="list-group-item list-group-item-action active">
    Archivos
  </a>
  

</div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registrar">
                <button type="button" name="registrar" class="btn btn-primary" onclick="guardarDatos()"><i class="fa fa-save"></i> Guardar</button>
                <a href="listar.php" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</a>
              </div>
              <div id="resultado"> </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function guardarDatos(){
       let form = document.querySelector('#frm-tramite');
      // let inputim = document.getElementById("image");

    //   alert(form);
      //  alert(inputim);
          var fd = new FormData(form);
    $.ajax({

        url: "../../ajax/action_file.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        //dataType:"json",
        success: function (dataofconfirm) {
            // do something with the result
           // alert(dataofconfirm);
           
           document.getElementById("resultado").innerHTML=dataofconfirm;
           /* return;
            let result= dataofconfirm.trim();
            alert(result);
            if(result==='OK'){
              // mostrarMensaje(result);
               //resetear();
            }else{
              //alert(dataofconfirm);
              // mostrarMensaje(result);
            } */
           
        },
        error: function (request, status, error) {
        alert(request.responseText);
        }
    });
  }
  function sendFile(){
    let input_file = document.getElementById("image");
  var myFormData = new FormData();
  myFormData.append('archivo', input_file.files[0]);
   myFormData.append('upload_onli', 'true');

$.ajax({
  url: "../../ajax/action_file.php",
  type: 'POST',
  processData: false, // important
  contentType: false, // important
  dataType : 'json',
  data: myFormData,
  success: function(jsonData){
            addFileList(jsonData);
        },
  error: function (request, status, error) {
        alert(request.responseText);
        }      
});
  }
  function removeFile(file_name){
   var myFormData = new FormData();
  myFormData.append('action', 'delete_file');
   myFormData.append('file_name', file_name);

$.ajax({
  url: "../../ajax/action_file.php",
  type: 'POST',
  processData: false, // important
  contentType: false, // important
  dataType : 'json',
  data: myFormData,
  success: function(jsonData){
            //addFileList(jsonData);
            //alert(jsonData.resultado);
        },
  error: function (request, status, error) {
        alert(request.responseText);
        }      
});
  }
   // ADD A NEW ROW TO THE TABLE
    function addRow() {
     
       let cod_track = document.getElementById('cod_track').value;
        var empTab = document.getElementById('tracking_table');

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
       // tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < 2; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 1) {           // FIRST COLUMN.
                // ADD A BUTTON.
               /* var button = document.createElement('input');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('value', '❌');
                button.setAttribute('id', 'rm');
                button.name= 'cod_track[]';
                button.classList.add('btn', 'btn-default'); */

                var button= document.createElement('button');


                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('onclick', 'removeRow(this)');
                //glypcon 
                /*var span = document.createElement("SPAN");
                span.classList.add('glyphicon', 'glyphicon-remove');
                span.innerHTML = "\e014";
                button.appendChild(span); */
                button.innerHTML='<span class="glyphicon glyphicon-remove">❌</span> ';
                //gypicon
               // td.appendChild(button);
                /* otra solucion *****/
                td.insertAdjacentHTML('beforeend', '<input type="button"  value="❌" class="btn btn-default" onclick="removeRow(this)" />');
            }
            else if(c==0){
                // CREATE AND ADD TEXTBOX IN EACH CELL.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', cod_track);
                ele.name='cod_track[]'

                td.appendChild(ele);
            }
        }
    }
    // DELETE TABLE ROW.
    function removeRow(oButton) {
        var empTab = document.getElementById('tracking_table');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.
    }
    function sumbit() {
        var myTab = document.getElementById('tracking_table');
        var values = new Array();
    
        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {                  // EACH CELL IN A ROW.
                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    values.push(element.childNodes[0].value);
                    
                }
            }
        }
        console.log('Data send:\n' + values);

    }
    function addFileList(object){
//let json_string= JSON.stringify({object.file_name_orig,object.file_name});
var myJSON = JSON.stringify(object);
var lista = document.getElementById('list_files');
       lista.insertAdjacentHTML('beforeend', '<a href="javascript::void(0)" class="list-group-item list-group-item-action">'+object.file_name_orig+
         '<input name="item_list[]" type="hidden" value=\''+myJSON+'\' />'+
'<button  class="btn btn-primary btn-sm pull-right" onclick="removeFileListItem(event,this,\''+object.file_name+'\')">' 
          +'<span class="glyphicon glyphicon-remove"></span>'+
       ' </button>'+
  '</a>');
    
         
    }
   function removeFileListItem(evt,ref,file_name){
    evt.stopPropagation();
    // ref.parentElement
     // insertedContent.parentNode.removeChild(insertedContent);
      ref.parentNode.parentNode.removeChild(ref.parentNode);
      removeFile(file_name);
    }

      // ADD THE TABLE TO YOUR WEB PAGE.
   /* function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');            // SET THE TABLE ID.

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');          // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // ADD THE TABLE TO YOUR WEB PAGE.
    }*/
  </script>
<?php  require_once('../inc/footer.php'); ?>
