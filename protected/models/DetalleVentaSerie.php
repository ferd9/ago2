<?php

/**
 * This is the model class for table "ago.detalle_venta_serie".
 *
 * The followings are the available columns in table 'ago.detalle_venta_serie':
 * @property integer $iddetalle_venta_serie
 * @property integer $detalle_venta_idventa
 * @property integer $detalle_venta_idproducto
 * @property string $nro_serie
 * @property string $codigo_barras
 * @property string $estado_producto
 *
 * The followings are the available model relations:
 * @property DetalleVenta $detalleVentaIdventa0
 * @property DetalleVenta $detalleVentaIdproducto0
 */
class DetalleVentaSerie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleVentaSerie the static model class
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
		return 'detalle_venta_serie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detalle_venta_idventa, detalle_venta_idproducto, estado_producto', 'required'),
			array('detalle_venta_idventa, detalle_venta_idproducto', 'numerical', 'integerOnly'=>true),
			array('nro_serie', 'length', 'max'=>25),
			array('codigo_barras', 'length', 'max'=>100),
			array('estado_producto', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddetalle_venta_serie, detalle_venta_idventa, detalle_venta_idproducto, nro_serie, codigo_barras, estado_producto', 'safe', 'on'=>'search'),
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
			'detalleVentaIdventa0' => array(self::BELONGS_TO, 'DetalleVenta', 'detalle_venta_idventa'),
			'detalleVentaIdproducto0' => array(self::BELONGS_TO, 'DetalleVenta', 'detalle_venta_idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_venta_serie' => 'Iddetalle Venta Serie',
			'detalle_venta_idventa' => 'Detalle Venta Idventa',
			'detalle_venta_idproducto' => 'Detalle Venta Idproducto',
			'nro_serie' => 'Nro Serie',
			'codigo_barras' => 'Codigo Barras',
			'estado_producto' => 'Estado Producto',
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

		$criteria->compare('iddetalle_venta_serie',$this->iddetalle_venta_serie);
		$criteria->compare('detalle_venta_idventa',$this->detalle_venta_idventa);
		$criteria->compare('detalle_venta_idproducto',$this->detalle_venta_idproducto);
		$criteria->compare('nro_serie',$this->nro_serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);
		$criteria->compare('estado_producto',$this->estado_producto,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}