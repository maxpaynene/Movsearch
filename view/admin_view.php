<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Movsearch</title>    
    <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/bootstrap/css/estilos.css">
    <script src="view/bootstrap/js/jquery.js"></script>
    <script src="view/bootstrap/js/bootstrap.min.js"></script>
    <script src="view/bootstrap/js/bootstrap.file-input.js"></script>  

    <header>    
        <div class="container">   
            <h2>Administrador</h2>
        </div>        
    </header>

    <br>

    <div class="container">
		<form action="view/post_admin_view.php" method="post" enctype="multipart/form-data">                      
           	<input type="file" name="archivo" id="archivo"/>
           	<input type="submit" class="btn btn-primary" value="subir!"/>                                           
       	</form>
    </div>

    <br>
	<script src="view/bootstrap/js/bootstrap.file-input.js"></script>
	<script>
		$(document).ready(function(){
  			$('input[type=file]').bootstrapFileInput();
		});
	</script>  	
    </body>
</html>