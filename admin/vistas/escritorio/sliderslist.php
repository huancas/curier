<?php
include ("config/conexion.php");
$active="active";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
     <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                             <div id="loader" class="text-center"> <span><img src="img/ajax-loader.gif"></span></div>
                             <div class="outer_div">
                             </div>
                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                        </div>
                    </div><!-- /# column -->
                </div>
              </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
<script>
	$(document).ready(function(){
		load(1);
	});
	function load(page){
		var parametros = {"action":"ajax","page":page};
		$.ajax({
			url:'./ajax/slider_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='./img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	function eliminar_slide(id){
		page=1;
		var parametros = {"action":"ajax","page":page,"id":id};
		if(confirm('Esta acción  eliminará de forma permanente el slide \n\n Desea continuar?')){
		$.ajax({
			url:'./ajax/slider_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='./img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	}
</script>