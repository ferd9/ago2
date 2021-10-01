<?php

/**
 * This is the model class for table "ago.accesorios".
 *
 * The followings are the available columns in table 'ago.accesorios':
 * @property integer $idaccesorios
 * @property integer $idsoporte
 * @property string $cantidad
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Soporte $idsoporte0
 * @property DetalleAccesorios[] $detalleAccesorioses
 */
class Accesorios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Accesorios the static model class
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
		return 'accesorios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsoporte, cantidad, descripcion', 'required'),
			array('idsoporte', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'length', 'max'=>6),
			array('descripcion', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idaccesorios, idsoporte, cantidad, descripcion', 'safe', 'on'=>'search'),
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
			'idsoporte0' => array(self::BELONGS_TO, 'Soporte', 'idsoporte'),
			'detalleAccesorioses' => array(self::HAS_MANY, 'DetalleAccesorios', 'idaccesorios'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idaccesorios' => 'Idaccesorios',
			'idsoporte' => 'Idsoporte',
			'cantidad' => 'Cantidad',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idaccesorios',$this->idaccesorios);
		$criteria->compare('idsoporte',$this->idsoporte);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}