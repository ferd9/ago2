<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyModel
 *
 * @author ryangeles
 */
class MyModel extends CModel{

    public $idpersona;
    public function attributeNames()
    {            
            $connection=  Yii::app()->db;     
            $sqlStatement='SELECT e.idempresa, p.nombre FROM persona p INNER JOIN empresa e ON e.empresa=p.idpersona ORDER BY p.nombre ASC;';
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $idPer = array();
            $nomPer = array();
            $nomEmp = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        if($fila=='idempresa')
                            {
                                $idPerEmp = $value;
                                array_push($idPer, $idPerEmp);
                            }
                        else if($fila=='nombre')
                            {
                                $nomPerEmp=$value;
                                array_push($nomPer, $nomPerEmp);
                            }
                    }
                }
            $nomEmp = array_combine($idPer, $nomPer);
            return $nomEmp;
    }

    public static function updateProvincia($iddpto)
    {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT codprov, nombre FROM ubigeo WHERE coddpto='".$iddpto."' AND codprov <> 00 GROUP BY codprov ORDER BY nombre ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $provincia = array();
            $codprov = array();
            $nomporv = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        if($fila=='codprov')
                            {
                                $cod = $value;
                                array_push($codprov, $cod);
                            }
                        else if($fila=='nombre')
                            {
                                $nom = $value;
                                array_push($nomporv, $nom);
                            }
                    }
                }
            if(count($codprov)>0 && count($nomporv)>0)
            {
                $provincia = array_combine($codprov, $nomporv);
            }
            else
                $provincia=array('Seleccionar');
                return $provincia;
    }

    public static function updateDistrito($iddpto,$idprov)
    {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT coddist, nombre FROM ubigeo WHERE coddpto='".$iddpto."' AND codprov='".$idprov."' AND coddist<>00 GROUP BY coddist ORDER BY nombre ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $distrito = array();
            $coddist = array();
            $nomdist = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        if($fila=='coddist')
                            {
                                $cod = $value;
                                array_push($coddist, $cod);
                            }
                        else if($fila=='nombre')
                            {
                                $nom = $value;
                                array_push($nomdist, $nom);
                            }
                    }
                }
             if(count($coddist)>0 && count($nomdist)>0)
             {
                $distrito = array_combine($coddist, $nomdist);
             }
             else
                $distrito=array();
                return $distrito;
    }

    public static function getCategoria()
    {
            $cat = new CDbCriteria;
            $cat->order = 'descripcion asc';
            $listCat = array();
            $listCat =CHtml::listData(Categoria::model()->findAll($cat),'idcategoria','descripcion');
            array_unshift($listCat,'Seleccionar');
            return $listCat;
    }

    public static function getIgv()
    {
            $ig = Igv::model()->findAllBySql("SELECT descripcion FROM igv LIMIT 1;");
            $igv = $ig[0]['descripcion'];
            return $igv;
    }

    public static function getSuma()
    {
            $sum = SaveUs::model()->findAllBySql("SELECT (SUM(precio)*cantidad) AS precio FROM save_us WHERE usuario='".Yii::app()->user->name."';");
            $suma = $sum[0]['precio'];
            $sumita = $suma;
            if($sumita==""){$sumita='0';}
            return $sumita;
    }

    public static function getSubTotal($total)
    {
            $subTotal = $total/(MyModel::getIgv()+1);
            return $subTotal;
    }

    public static function getIgvMonto($total)
    {
            $igv = MyModel::getSubTotal($total)*MyModel::getIgv();
            return $igv;
    }

    public static function getRedondear($decimal)
    {
            $numerito = round($decimal*1000)/1000;
            return $numerito;
    }

    public static function getIdAlmacen()
    {
            $alm = Usuario::model()->findAllBySql("SELECT almacen FROM usuario WHERE login='".Yii::app()->user->name."' LIMIT 1;");
            $almacen = $alm[0]['almacen'];
            return (int)$almacen;
    }

    public static function getExplode($dato)
    {
        $resu = explode('-',$dato);
        $resultado = trim($resu[0]);
        return (int)$resultado;
    }

    public static function getRucProveedor($idproveedorr)
    {
            $ruc = Proveedor::model()->findAllBySql("SELECT ruc FROM proveedor WHERE idproveedor='".$idproveedorr."' LIMIT 1;");
            $rucProveedor = $ruc[0]['ruc'];
            return $rucProveedor;
    }

    public static function getRsProveedor($idproveedorr)
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT pe.nombrecompleto FROM proveedor pr INNER JOIN persona pe ON pe.idpersona=pr.proveedor WHERE idproveedor='".$idproveedorr."' LIMIT 1;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $rsProveedor;
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        $rsProveedor=$value;
                    }
                }
            return $rsProveedor;

        }

    public static function getDirProveedor($idproveedorr)
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT pe.direccion FROM proveedor pr INNER JOIN persona pe ON pe.idpersona=pr.proveedor WHERE idproveedor='".$idproveedorr."' LIMIT 1;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $dirProveedor;
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                        $dirProveedor=$value;
                    }
                }
            return $dirProveedor;

        }

        public static function getDirOrigen()
        {
                $dir = Almacen::model()->findAllBySql("SELECT direccion FROM almacen WHERE idalmacen='".MyModel::getIdAlmacen()."' LIMIT 1;");
                $dirOrig = $dir[0]['direccion'];
                return $dirOrig;
        }

        public static function getDirDestino($idclientee)
        {
                $id = Cliente::model()->findAllBySql("SELECT cliente FROM cliente WHERE idcliente='".$idclientee."' LIMIT 1;");
                $idPerson = $id[0]['cliente'];

                $dir = Persona::model()->findAllBySql("SELECT direccion FROM persona WHERE idpersona='".$idPerson."' LIMIT 1;");
                $dirDest = $dir[0]['direccion'];
                return $dirDest;
        }


}
?>