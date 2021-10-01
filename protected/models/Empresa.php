<?php

/**
 * This is the model class for table "ago.empresa".
 *
 * The followings are the available columns in table 'ago.empresa':
 * @property integer $idempresa
 * @property integer $empresa
 * @property string $ruc
 * @property string $lgo
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property Almacen[] $almacens
 * @property Persona $empresa0
 */
class Empresa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Empresa the static model class
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
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
        public $lgo;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                
			array('empresa, ruc, usuario', 'required'),
                        //array('ruc', 'unique'),
			array('empresa, ruc', 'numerical', 'integerOnly'=>true),
			array('ruc', 'length', 'max'=>11),
                        array('ruc', 'unique'),
                        //array('ruc','numerical', 'integerOnly'=>true),
			array('lgo, usuario', 'length', 'max'=>50),
                        array('lgo','file',
                        'types'=>'jpg, gif, png, jpeg',
                        'maxSize'=>1024 * 1024 * 50,
                        'tooLarge'=>'El archivo supera los 50 MB. Por favor, sube un archivo más pequeño.',
                        'allowEmpty'=>true,
                        ),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idempresa, empresa, ruc, estado, usuario', 'safe', 'on'=>'search'),
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
			'almacens' => array(self::HAS_MANY, 'Almacen', 'idempresa'),
			'empresa0' => array(self::BELONGS_TO, 'Persona', 'empresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idempresa' => 'Empresa',
			//'empresa' => 'Empresa',
			'ruc' => 'Ruc',
			'lgo' => 'Logo',
			//'estado' => 'Estado',
			//'usuario' => 'Usuario',
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

		$criteria->compare('idempresa',$this->idempresa);
		$criteria->compare('empresa0.nombre',$this->empresa, true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('lgo',$this->lgo,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
                $criteria->with=array('empresa0');

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


}