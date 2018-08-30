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

    <?php 
    if ($_FILES['archivo']["error"] > 0){
  		echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  	}else{  
  		echo "Video subido!!!!! <br>"."Nombre: " . $_FILES['archivo']['name'] . "<br>";	
  		move_uploaded_file($_FILES['archivo']['tmp_name'],'../temp/movie_temp/'.$_FILES['archivo']['name']);
    }
    ?>

    <?php
    require '../controller/video_to_img.php'; 
	$input = "../temp/movie_temp/".$_FILES['archivo']['name'];
	$output = "frame.jpg";
    $return = extract_frames($input, $output);
    echo "<br> Video frame 100% extracted <br>";
    chmod($input, 666);
    unlink($input);   
	?>

	<?php
		require '../controller/how_many_frames.php';
        $n_frames = how_many_frames();

        require '../controller/image_binary_compare.php'; 
		$class = new compareImages;

		$i=1;
		while($i < $n_frames){			
			echo $input = "../temp/frame_temp/frame".$i.".jpg";
            echo ": ";
			$i++;
            if(file_exists($input)){
                $binario = $class->imageToBinary($input);                
                for($a=0;$a<144;$a++){
                    echo $binario[$a];
                }
                echo "<br>";
			}
            
            if(unlink($input)){
            }
            else{
                chmod($input, 666);
                unlink($input);
            }
            
		}
		
		
		
	?>

	</script>  	
    </body>
</html>