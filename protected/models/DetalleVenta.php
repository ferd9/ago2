<?php

/**
 * This is the model class for table "ago.detalle_venta".
 *
 * The followings are the available columns in table 'ago.detalle_venta':
 * @property integer $id
 * @property integer $idventa
 * @property integer $idproducto
 * @property integer $idtipo_adquisicion
 * @property integer $cantidad
 * @property string $precio_venta_unitario
 * @property string $precio_venta_lote
 * @property string $descuento_venta_unitario
 * @property string $descuento_venta_lote
 * @property string $tipo_ingreso
 * @property integer $garantia
 *
 * The followings are the available model relations:
 * @property Producto $idproducto0
 * @property TipoAdquisicion $idtipoAdquisicion0
 * @property Venta $idventa0
 * @property DetalleVentaSerie[] $detalleVentaSeries
 */
class DetalleVenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleVenta the static model class
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
		return 'detalle_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, idventa, idproducto', 'required'),
			array('id, idventa, idproducto, idtipo_adquisicion, cantidad, garantia', 'numerical', 'integerOnly'=>true),
			array('precio_venta_unitario, precio_venta_lote, descuento_venta_unitario, descuento_venta_lote', 'length', 'max'=>9),
			array('tipo_ingreso', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idventa, idproducto, idtipo_adquisicion, cantidad, precio_venta_unitario, precio_venta_lote, descuento_venta_unitario, descuento_venta_lote, tipo_ingreso, garantia', 'safe', 'on'=>'search'),
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
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'idtipoAdquisicion0' => array(self::BELONGS_TO, 'TipoAdquisicion', 'idtipo_adquisicion'),
			'idventa0' => array(self::BELONGS_TO, 'Venta', 'idventa'),
			'detalleVentaSeries' => array(self::HAS_MANY, 'DetalleVentaSerie', 'detalle_venta_idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idventa' => 'Idventa',
			'idproducto' => 'Idproducto',
			'idtipo_adquisicion' => 'Idtipo Adquisicion',
			'cantidad' => 'Cantidad',
			'precio_venta_unitario' => 'Precio Venta Unitario',
			'precio_venta_lote' => 'Precio Venta Lote',
			'descuento_venta_unitario' => 'Descuento Venta Unitario',
			'descuento_venta_lote' => 'Descuento Venta Lote',
			'tipo_ingreso' => 'Tipo Ingreso',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('idtipo_adquisicion',$this->idtipo_adquisicion);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio_venta_unitario',$this->precio_venta_unitario,true);
		$criteria->compare('precio_venta_lote',$this->precio_venta_lote,true);
		$criteria->compare('descuento_venta_unitario',$this->descuento_venta_unitario,true);
		$criteria->compare('descuento_venta_lote',$this->descuento_venta_lote,true);
		$criteria->compare('tipo_ingreso',$this->tipo_ingreso,true);
		$criteria->compare('garantia',$this->garantia);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}