<?php

class SistemaController extends Controller
{

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{       $nivelll=Yii::app()->user->getId();
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('import','backup'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

         //--------------------------------------------------------------------------------------------
	public function actionIndex()
	{

		$this->render('index');
	}

        //--------------------------------------------------------------------------------------------
        public function actionImport()
	{
		$this->render('_import');
	}

        public function actionBackup()
	{
		$this->render('_backup');
	}

}
