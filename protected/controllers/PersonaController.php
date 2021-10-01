<?php

class PersonaController extends Controller
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

        public static function getIdPersona($nomperson)
        {
            $idper = Persona::model()->findAllBySql("select idpersona from persona where nombrecompleto = '".$nomperson."'");
            $idpersona = $idper[count($idper)-1]['idpersona'];
            return $idpersona;
        }
}