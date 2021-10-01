<?php

/**
 * This is the model class for table "ago.detalle_guia_venta_serie".
 *
 * The followings are the available columns in table 'ago.detalle_guia_venta_serie':
 * @property integer $iddetalle_guia_venta_serie
 * @property integer $idguia_remision_venta
 * @property integer $idproducto
 * @property string $serie
 * @property string $codigo_barras
 *
 * The followings are the available model relations:
 * @property DetalleGuiaVenta $idguiaRemisionVenta0
 * @property DetalleGuiaVenta $idproducto0
 */
class DetalleGuiaVentaSerie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleGuiaVentaSerie the static model class
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
		return 'detalle_guia_venta_serie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iddetalle_guia_venta_serie, idguia_remision_venta, idproducto', 'required'),
			array('iddetalle_guia_venta_serie, idguia_remision_venta, idproducto', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>30),
			array('codigo_barras', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddetalle_guia_venta_serie, idguia_remision_venta, idproducto, serie, codigo_barras', 'safe', 'on'=>'search'),
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
			'idguiaRemisionVenta0' => array(self::BELONGS_TO, 'DetalleGuiaVenta', 'idguia_remision_venta'),
			'idproducto0' => array(self::BELONGS_TO, 'DetalleGuiaVenta', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_guia_venta_serie' => 'Iddetalle Guia Venta Serie',
			'idguia_remision_venta' => 'Idguia Remision Venta',
			'idproducto' => 'Idproducto',
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

		$criteria->compare('iddetalle_guia_venta_serie',$this->iddetalle_guia_venta_serie);
		$criteria->compare('idguia_remision_venta',$this->idguia_remision_venta);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}