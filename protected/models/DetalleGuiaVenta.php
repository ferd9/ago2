<?php

/**
 * This is the model class for table "ago.detalle_guia_venta".
 *
 * The followings are the available columns in table 'ago.detalle_guia_venta':
 * @property integer $idguia_remision_venta
 * @property integer $idproducto
 * @property integer $cantidad
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property GuiaRemisionVenta $idguiaRemisionVenta0
 * @property Producto $idproducto0
 * @property DetalleGuiaVentaSerie[] $detalleGuiaVentaSeries
 */
class DetalleGuiaVenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleGuiaVenta the static model class
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
		return 'detalle_guia_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idguia_remision_venta, idproducto, cantidad, id', 'required'),
			array('idguia_remision_venta, idproducto, cantidad, id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idguia_remision_venta, idproducto, cantidad, id', 'safe', 'on'=>'search'),
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
			'idguiaRemisionVenta0' => array(self::BELONGS_TO, 'GuiaRemisionVenta', 'idguia_remision_venta'),
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'detalleGuiaVentaSeries' => array(self::HAS_MANY, 'DetalleGuiaVentaSerie', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idguia_remision_venta' => 'Idguia Remision Venta',
			'idproducto' => 'Idproducto',
			'cantidad' => 'Cantidad',
			'id' => 'ID',
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

		$criteria->compare('idguia_remision_venta',$this->idguia_remision_venta);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}