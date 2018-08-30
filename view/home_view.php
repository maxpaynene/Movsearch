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

    
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading font-personalizada">Movsearch</h1>
                       	<form method="post" action="" enctype="multipart/form-data">
                        	<p class="intro-text"> 
                        		<input type="file" name="archivo"/>
                        		<input type="submit" name="submit" class="btn btn-primary" value="Descubre!"/>    
                        	</p>                    
                        </form>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
    <div class="container">
    
		<?php
			require 'controller/image.compare.class.php'; 

			$class = new compareImages;
			$porcentaje=$class->compare('1.jpg','2.jpg');
			$porcentaje=100-$porcentaje;
		?>

		<?php
			if($porcentaje >= 80){
		?>		
				<h1 class="text"><?php echo '100%-90% de que sea igual: ', $porcentaje,' ' ?>
				<br>
				<small class="text">Numero de la igualdad, mientras mas cerca de 100 es mas igual la imagen.</small></h1>	

					
		<div class="container">   <!-- class class="container" para meterlo dentro de un contenedor visual en pagina -->
        	<section class="main row"> 
        <!-- class class="main row" para crear filas -->
            <article class="col-md-4 col-lg-4"> 
            <!-- lass="col-md-9" para crear columnas, donde "xs-sm-md-lg" largos de pantalla y su medida-->
                <?php
					echo '<img src="view/peliculas/rey_leon.jpg"/>';
				?>
            </article>

            <article class="col-md-8 col-lg-8">
                 <h3>El rey león</h3>
                  El rey león (título original en inglés, The Lion King) es la trigésima segunda película animada producida por los estudios Walt Disney. Se estrenó en cines el 24 de junio de 1994. La trama, muy libremente basada en la tragedia Hamlet, de William Shakespeare, 1 gira en torno a un joven león de la sabana africana llamado Simba, que está llamado a ser el sucesor de su padre en el trono.
				  La película tiene una versión homónima de teatro musical cuyas canciones fueron escritas por el compositor Elton John y el letrista Tim Rice. La banda sonora, de Hans Zimmer, ganó un Tony además del Óscar de la Academia a la mejor banda sonora original junto a una de sus canciones. La película también ganó el Globo de Oro a la mejor película - Comedia o musical.
				  <br>
				  <br>
				  <br>				  
				  <h4>Disponibilidad en Online "Netflix": <span style="color:green">Disponible</span></h4>
				  <br>
				  <h4>Disponibilidad en tienda online "x-shop": <span style="color:red">No Disponible</span></h4>
				  <br>
				  <h4>Disponibilidad en programa TV "HBO-HD": <span style="color:green">Disponible 17/05 15:00hrs</span></h4>

                
          	  </article>
        	</section> 
    	</div>

        <?php
			}else{
		?>
            <h1 class="text"><?php echo 'la imagen no supera el 90% de que sea igual: ', $porcentaje,' ' ?>
            <br>
			<small class="text">Numero de la igualdad, mientras mas cerca de 100 es mas igual la imagen.</small></h1>	

		<?php		
			}
		?>
		<script src="view/bootstrap/js/bootstrap.file-input.js"></script>
		<script>
			$(document).ready(function(){
  				$('input[type=file]').bootstrapFileInput();
			});
		</script>  		
	</div>  
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>  	  
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  </body>
</html>