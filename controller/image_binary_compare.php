<?php
class compareImages{

    public function imageToBinary($a){
		/*función principal. devuelve la distancia de  bit entre 2 imágenes */
		$i1 = $this->createImage($a); //retorna un archivo temporal de imagen con la extencion de la imagen entregada (jpg, png) 
		
		$i1 = $this->resizeImage($i1,$a); //se retorna la imagen del tamaño de 8,8. copiada del original ..
		
		imagefilter($i1, IMG_FILTER_GRAYSCALE); //IMG_FILTER_GRAYSCALE: Convierte la imagen a escala de grises.
		
		$colorMean1 = $this->colorMeanValue($i1); //retorna color medio y la lista de colores por pixel.
		
		return $bits1 = $this->bits($colorMean1); //devuelve una matriz con 1 y ceros, Si un color es más grande que el valor medio de los colores es 1
	}

	public function compare($a){
		/*función principal. devuelve la distancia de  bit entre 2 imágenes */
		$i1 = $this->createImage($a); //retorna un archivo temporal de imagen con la extencion de la imagen entregada (jpg, png) 
				
		$i1 = $this->resizeImage($i1,$a);
		 //se retorna la imagen del tamaño de 8,8. copiada del original ..		
		
		imagefilter($i1, IMG_FILTER_GRAYSCALE); //IMG_FILTER_GRAYSCALE: Convierte la imagen a escala de grises.		
		
		$colorMean1 = $this->colorMeanValue($i1); //retorna color medio y la lista de colores por pixel.	
		
		$bits1 = $this->bits($colorMean1); //devuelve una matriz con 1 y ceros, Si un color es más grande que el valor medio de los colores es 1
		$bits2 = //aqui poner cada uno de los binarios desde la DB ######################################################
		
		$hammeringDistance = 0;
		
		for($a = 0;$a<64;$a++){		
			if($bits1[$a] != $bits2[$a]){
				$hammeringDistance++;
			}			
		}
		  
		return $hammeringDistance;
	}
    


	private function mimeType($i){	//retornando valor con el largo, alto y extencion de la imagen.

		$mime = getimagesize($i); //obteniendo el largo y alto de la imagen.
		$return = array($mime[0],$mime[1]); //guardar el largo y alto.
      
		switch ($mime['mime']){ // if para determinar tipo de extencion

			case 'image/jpeg':
				$return[] = 'jpg'; //agregar la extencion "jpg" al siguiente espacio del array $return[]
				return $return;    //retornando valor con el largo, alto y extencion de la imagen.
			case 'image/png':
				$return[] = 'png';
				return $return;
			default:
				return false;
		}
    } 

	private function createImage($i){	//retorna un archivo temporal de imagen con la extencion de la imagen dada (jpg, png) 
		
		$mime = $this->mimeType($i);  //obteniendo valor de la imagen tanto el largo, alto y extencion de la imagen.
      
		if($mime[2] == 'jpg'){           //If para verificar imagen si es jpg o png 
			return imagecreatefromjpeg ($i); 
		}
		else if ($mime[2] == 'png'){
			return imagecreatefrompng ($i);
		} 
		else{
			return false; 
		} 
    }

    private function resizeImage($i,$source){	/*cambia el tamaño de la imagen a un squere 8x8 y devuelve como recurso de imagen*/

		$mime = $this->mimeType($source);  //obteniendo valor de la imagen tanto el largo, alto y extencion de la imagen.
      
		$t = imagecreatetruecolor(12, 12); //devuelve un identificador de imagen que representa una imagen en negro del tamaño especificado.
		
		$source = $this->createImage($source); //devuelve una imagen en blanco del tamaño especificado.
		
		imagecopyresized($t, $source, 0, 0, 0, 0, 12, 12, $mime[0], $mime[1]); //imagecopyresized() copia una imagen a otra imagen. $t es la imagen de destino, $source es el identificador de la imagen de origen. los  8, 8 representan el largo y alto de la imagen de destino.. mientras que el $mime[0], $mime[1].. representan el largo y alto de origen.		
		return $t; //se retorna la imagen del tamaño de 8,8. copiada del original ..
	}

	private function colorMeanValue($i){  /*devuelve el valor medio de los colores y la lista de todos los colores de los píxeles*/
	
		$colorList = array(); 
		$colorSum = 0;
		for($a = 0;$a<12;$a++)
		{		
			for($b = 0;$b<12;$b++)
			{			
				$rgb = imagecolorat($i, $a, $b); //Devuelve el índice del color de un píxel en el lugar especificado en la imagen especificada por imagen
				$colorList[] = $rgb & 0xFF;  
				$colorSum += $rgb & 0xFF;				
			}			
		}		
		return array($colorSum/144,$colorList); //retorna el color medio y la lista de colores por pixel.
	}   
    
    private function bits($colorMean){	/*devuelve una matriz con 1 y ceros, Si un color es más grande que el valor medio de los colores es 1*/
		$bits = array();
		 
		foreach($colorMean[1] as $color){
			$bits[]= ($color>=$colorMean[0])?1:0;
		}

		return $bits;

	}	
    
}
?>
