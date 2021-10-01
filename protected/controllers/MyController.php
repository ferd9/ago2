<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MyController
{
    public static function renombrarArchivo($file)
    {
        $name_file;
        if($file[0]!="")
        {
            $random = rand(00000,99999);
            $date = date('dmY-His');
            $name_file = $random.'-'.$date.'-'.$file[0];
        }
        return $name_file;
    }

    public static function renombrarArchivoabc($file)
    {
        $name_file;
        if($file[0]!="")
        {
            $random = rand(0000,9999);
            $date = date('dm');
            $name_file = $random.$date.$file[0];
        }
        return $name_file;
    }

    public static function subirArchivo($file,$url,$name)
    {
        move_uploaded_file($file[2], $url.$name);
        MyController::resizeImage($url.$name,$name);
    }

    public static function resizeImage($originalImage,$name,$toWidth='100',$toHeight='100')
    {

        // Get the original geometry and calculate scales
        list($width, $height) = getimagesize($originalImage);
        $xscale=$width/$toWidth;
        $yscale=$height/$toHeight;

        // Recalculate new size with default ratio
        if ($yscale>$xscale){
            $new_width = round($width * (1/$yscale));
            $new_height = round($height * (1/$yscale));
        }
        else {
            $new_width = round($width * (1/$xscale));
            $new_height = round($height * (1/$xscale));
        }

        // Resize the original image
        $imageResized = imagecreatetruecolor($new_width, $new_height);
        $imageTmp     = imagecreatefromjpeg ($originalImage);
        imagecopyresized($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($imageResized,'images/'.'_'.$name, 100);
        
        //return $imageResized;
    }

    public static function campoHidden($idempresa)
    {
        $nom = Empresa::model()->findByPk($idempresa);
        $name_file = $nom->lgo;
        return $name_file;
    }

    public static function campoHiddenProducto($idproducto)
    {
        $nom = Producto::model()->findByPk($idproducto);
        $name_file = $nom->foto;
        return $name_file;
    }

}

?>