<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MiniBuffered
 *
 * @author HENRY
 */
class MiniBuffered {

    public static $listProduct=array();
    public static $cantidadProductos_seleccionados = 0;
    //public static $listaIdProductos = 0;
    public static $BUFFER = array();
    //public static $clavesIdProductos = array();
    public static $cantidadesProductos = array();

    public static $datosSerializados;

    public static function setValores($arrayA,$arrayB,$datosSerializado=null)
    {
        $tmpIdproductos = array();
        $tmpIdproductos = array_values($arrayA);        
        if(count(self::$listProduct)==0)
        {
            foreach($arrayA as $key=>$value)
             {
                  if(array_key_exists($value, $arrayB))
                   {
                      if(strlen($arrayB[$value])==0)
                          $arrayB[$value] = 1;
                      self::$cantidadProductos_seleccionados += array_push(self::$cantidadesProductos, $arrayB[$value]);
                   }

             }

         self::$listProduct = array_combine($tmpIdproductos, self::$cantidadesProductos);
        }

        if(count(self::$BUFFER)==0)
            self::$BUFFER = self::$listProduct;
        

        if($datosSerializado != null)
        {
            $tmpUnserialize = unserialize($datosSerializado);
            self::verificarProductoSelected($tmpUnserialize, self::$listProduct);
            self::$BUFFER =  self::$listProduct + $tmpUnserialize;
            self::$datosSerializados = serialize(self::$BUFFER);
        }else
            self::$datosSerializados = serialize(self::$BUFFER);
    }

    private static function verificarProductoSelected(&$antiguaListaProductos,&$nuevaListaProductos)
    {
        if(is_array($antiguaListaProductos) && is_array($nuevaListaProductos))
        {
            foreach($antiguaListaProductos as $clave=>$valor)
            {
                if(key_exists($clave, $nuevaListaProductos))
                {
                   $nuevaListaProductos[$clave] += $valor;
                }
            }
        }
    }

    public static function setDatosSerializados($serializados)
    {
        self::$BUFFER = unserialize($serializados);
        self::$datosSerializados = serialize(self::$BUFFER);
    }

}
?>
