<?php

/**
 * This is the model class for table "ago.usuario".
 *
 * The followings are the available columns in table 'ago.usuario':
 * @property string $login
 * @property integer $nivel
 * @property integer $usuario
 * @property integer $almacen
 * @property string $numero_documento
 * @property string $contra1
 * @property string $contra2
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Almacen $almacen0
 * @property Nivel $nivel0
 * @property Persona $usuario0
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('login', 'unique'),
			array('login, nivel, usuario, almacen, contra1, contra2', 'required'),
			array('nivel, usuario, almacen', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>50),
			array('numero_documento', 'length', 'max'=>8),
			array('contra1, contra2', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
                        array("contra1", "compare", "compareAttribute" => "contra2"),
                        array("contra2", "compare", "compareAttribute" => "contra1"),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('login, nivel, usuario, almacen, numero_documento, contra1, contra2, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'almacen0' => array(self::BELONGS_TO, 'Almacen', 'almacen'),
			'nivel0' => array(self::BELONGS_TO, 'Nivel', 'nivel'),
			'usuario0' => array(self::BELONGS_TO, 'Persona', 'usuario'),
		);
	}

        protected function afterValidate()
        {
            parent::afterValidate();
            $this->contra2 = $this->encrypt($this->contra2);
        }

        public function encrypt($value)
        {
            return md5($value);
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'login' => 'Login',
			'nivel' => 'Nivel',
			'usuario' => 'Usuario',
			'almacen' => 'Almacen',
			'numero_documento' => 'Numero Documento',
			'contra1' => 'Contra1',
			'contra2' => 'Contra2',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.login',$this->login,true);
                $criteria->compare('nivel0.descripcion',$this->nivel, true);
                $criteria->compare('usuario0.nombre',$this->usuario, true);
                $criteria->compare('almacen0.nombre',$this->almacen, true);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('contra1',$this->contra1,true);
		$criteria->compare('contra2',$this->contra2,true);
                $criteria->compare('t.estado',$this->estado,false);
                $criteria->with=array('nivel0','usuario0','almacen0');

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        public static function getListvendedores()
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT login FROM usuario ORDER BY usuario ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $idnomCli = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomCli, $value);
                    }
                }
            return $idnomCli;

        }
}