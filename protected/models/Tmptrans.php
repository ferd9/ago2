<?php

/**
 * This is the model class for table "_tmptrans".
 *
 * The followings are the available columns in table '_tmptrans':
 * @property integer $idtmptras
 * @property integer $idproducto
 * @property string $nombreproducto
 * @property string $preciocompra
 * @property string $preciosinigv
 * @property string $precioconigv
 * @property integer $stockproducto
 */
class Tmptrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tmptrans the static model class
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
		return '_tmptrans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproducto, stockproducto', 'numerical', 'integerOnly'=>true),
			array('nombreproducto', 'length', 'max'=>200),
			array('preciocompra, preciosinigv, precioconigv', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtmptras, idproducto, nombreproducto, preciocompra, preciosinigv, precioconigv, stockproducto', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtmptras' => 'Idtmptras',
			'idproducto' => 'Idproducto',
			'nombreproducto' => 'Nombreproducto',
			'preciocompra' => 'Preciocompra',
			'preciosinigv' => 'Preciosinigv',
			'precioconigv' => 'Precioconigv',
			'stockproducto' => 'Stockproducto',
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

		$criteria->compare('idtmptras',$this->idtmptras);
		$criteria->compare('idproducto',$this->idproducto,true);
		$criteria->compare('nombreproducto',$this->nombreproducto,true);
		$criteria->compare('preciocompra',$this->preciocompra,true);
		$criteria->compare('preciosinigv',$this->preciosinigv,true);
		$criteria->compare('precioconigv',$this->precioconigv,true);
		$criteria->compare('stockproducto',$this->stockproducto);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}