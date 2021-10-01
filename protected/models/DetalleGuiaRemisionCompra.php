<?php

/**
 * This is the model class for table "ago.detalle_guia_remision_compra".
 *
 * The followings are the available columns in table 'ago.detalle_guia_remision_compra':
 * @property integer $idguia_remision_compra
 * @property integer $idproducto
 * @property integer $cantidad
 * @property integer $garantia
 *
 * The followings are the available model relations:
 * @property DetalleGuiaRemisionCompraSerie[] $detalleGuiaRemisionCompraSeries
 */
class DetalleGuiaRemisionCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleGuiaRemisionCompra the static model class
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
		return 'detalle_guia_remision_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad', 'required'),
			array('cantidad, garantia', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idguia_remision_compra, idproducto, cantidad, garantia', 'safe', 'on'=>'search'),
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
			'detalleGuiaRemisionCompraSeries' => array(self::HAS_MANY, 'DetalleGuiaRemisionCompraSerie', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idguia_remision_compra' => 'Idguia Remision Compra',
			'idproducto' => 'Idproducto',
			'cantidad' => 'Cantidad',
			'garantia' => 'Garantia',
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

		$criteria->compare('idguia_remision_compra',$this->idguia_remision_compra);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('garantia',$this->garantia);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}