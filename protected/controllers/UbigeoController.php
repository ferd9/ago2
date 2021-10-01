<?php

class UbigeoController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

        public function actionProvincia()
        {
                $prov = new CDbCriteria;
                $prov->order = 'nombre asc';
                $prov->group = 'codprov';
                $prov->condition = 'coddpto = '.$_POST['Ubigeo']['coddpto'].' AND codprov<>00';
                $datosUbigeo = new Ubigeo;


                $data = $datosUbigeo->findAll($prov);

                echo CHtml::tag('option',array('value' => '0,0'),CHtml::encode('Seleccionar'),true);
                $data = CHtml::listData($data,'codprov','nombre');
                foreach($data as $id => $value)
                {
                    echo CHtml::tag('option',array('value' => $id.','.$_POST['Ubigeo']['coddpto']),CHtml::encode($value),true);

                }

        }

        public function actionDistrito()
        {
            $dist = new CDbCriteria;
            $dist->order = 'nombre asc';
            $dist->group = 'coddist';
            $provDepar = explode(",", $_POST['city_id']);
            $codpro = $provDepar[0];
            $coddepar = $provDepar[1];
            $dist->condition = 'coddpto = '.$coddepar.' AND codprov='.$codpro.' AND coddist<>00';

            $datosUbigeo = new Ubigeo;
            $data = $datosUbigeo->findAll($dist);
            $data = CHtml::listData($data,'coddist','nombre');

            if(($_POST['city_id']=='0,0') || ($_POST['Ubigeo']['coddpto']=='0'))
            {
                    echo CHtml::tag('option',array('value' => '00'),CHtml::encode('Seleccionar'),true);
            }
            else
            {

                foreach($data as $id => $value)
                {
                    echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
                }
            }
    }

    public function actionLimpiar()
    {
        echo CHtml::tag('option',array('value' => '00'),CHtml::encode('Selddd'),true);
    }


    public static function getIdUbigeo($depar,$prov,$dist)
    {
        $idcod;
        $idprov = explode(",", $prov);
        $idubigeo = new CDbCriteria;
        $idubigeo->condition = "coddpto = '".$depar."' and codprov = '".$idprov[0]."' and coddist = '".$dist."'";
        $listUbigeo = CHtml::listData(Ubigeo::model()->findAll($idubigeo),'idubigeo','idubigeo');
        foreach($listUbigeo as $clave=>$valor)
        {
            $idcod=$valor;
        }
        return $idcod;
    }

    public static function viewDepartamento($idubigeo)
    {                
                $nomdpto;
                $coddpto;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT coddpto FROM ubigeo WHERE idubigeo='".$idubigeo."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $coddpto = $value;
                        }
                    }
                $nomdpto = UbigeoController::nomDepartamento($coddpto);
                return $nomdpto;
    }

    public static function nomDepartamento($codigodpto)
    {
                $departamento;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT nombre FROM ubigeo WHERE coddpto='".$codigodpto."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $departamento = $value;
                        }
                    }
                    return $departamento;
    }


    public static function viewProvincia($idubigeo)
    {
                $nomprov;
                $codprov;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT codprov FROM ubigeo WHERE idubigeo='".$idubigeo."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $codprov = $value;
                        }
                    }
                $nomprov = UbigeoController::nomProvincia($codprov);
                return $nomprov;
    }

    public static function nomProvincia($codigoprov)
    {
                $provincia;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT nombre FROM ubigeo WHERE codprov='".$codigoprov."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $provincia = $value;
                        }
                    }
                    return $provincia;
    }

    public static function viewDistrito($idubigeo)
    {
                $nomdist;
                $connection=  Yii::app()->db;
                $sqlStatement="SELECT nombre FROM ubigeo WHERE idubigeo='".$idubigeo."' LIMIT 1;";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $reader=$command->query();

                foreach($reader as $row)
                    {
                    foreach ($row as $fila=>$value)
                        {
                            $nomdist = $value;
                        }
                    }
                return $nomdist;
    }

    public static function nomUbigeo($idubigeo)
    {
        $e_dpto = UbigeoController::viewDepartamento($idubigeo);
        $e_prov = UbigeoController::viewProvincia($idubigeo);
        $e_dist = UbigeoController::viewDistrito($idubigeo);
        $nomubigeo = ($e_dpto.' - '.$e_prov.' - '.$e_dist);
        return $nomubigeo;
    }
 
}