<?php

/**
 * This is the model class for table "ago.detalle_accesorios".
 *
 * The followings are the available columns in table 'ago.detalle_accesorios':
 * @property integer $iddetalle_accesorios
 * @property integer $idaccesorios
 * @property string $serie
 * @property string $codigo_barras
 *
 * The followings are the available model relations:
 * @property Accesorios $idaccesorios0
 */
class DetalleAccesorios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleAccesorios the static model class
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
		return 'detalle_accesorios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idaccesorios', 'required'),
			array('idaccesorios', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>30),
			array('codigo_barras', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddetalle_accesorios, idaccesorios, serie, codigo_barras', 'safe', 'on'=>'search'),
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
			'idaccesorios0' => array(self::BELONGS_TO, 'Accesorios', 'idaccesorios'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_accesorios' => 'Iddetalle Accesorios',
			'idaccesorios' => 'Idaccesorios',
			'serie' => 'Serie',
			'codigo_barras' => 'Codigo Barras',
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

		$criteria->compare('iddetalle_accesorios',$this->iddetalle_accesorios);
		$criteria->compare('idaccesorios',$this->idaccesorios);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}