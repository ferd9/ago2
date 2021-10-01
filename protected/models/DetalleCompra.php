<?php

/**
 * This is the model class for table "ago.detalle_compra".
 *
 * The followings are the available columns in table 'ago.detalle_compra':
 * @property integer $idcompra
 * @property integer $idproducto
 * @property integer $idtipo_adquisicion
 * @property string $precio_unitario_compra
 * @property string $precio_lote_compra
 * @property integer $cantidad
 * @property integer $garantia
 * @property integer $idtipo_moneda
 * @property string $cambio
 * @property string $descuento_unitario_compra
 * @property string $descuento_lote_compra
 * @property integer $iddetalle_compra
 *
 * The followings are the available model relations:
 * @property Compra $idcompra0
 * @property Producto $idproducto0
 * @property TipoAdquisicion $idtipoAdquisicion0
 * @property TipoMoneda $idtipoMoneda0
 * @property DetalleCompraSerie[] $detalleCompraSeries
 */
class DetalleCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleCompra the static model class
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
		return 'detalle_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtipo_adquisicion, cantidad, garantia, idtipo_moneda', 'numerical', 'integerOnly'=>true),
			array('precio_unitario_compra, precio_lote_compra, cambio, descuento_unitario_compra, descuento_lote_compra', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcompra, idproducto, idtipo_adquisicion, precio_unitario_compra, precio_lote_compra, cantidad, garantia, idtipo_moneda, cambio, descuento_unitario_compra, descuento_lote_compra, iddetalle_compra', 'safe', 'on'=>'search'),
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
			'idcompra0' => array(self::BELONGS_TO, 'Compra', 'idcompra'),
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'idtipoAdquisicion0' => array(self::BELONGS_TO, 'TipoAdquisicion', 'idtipo_adquisicion'),
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
			'detalleCompraSeries' => array(self::HAS_MANY, 'DetalleCompraSerie', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcompra' => 'Idcompra',
			'idproducto' => 'Idproducto',
			'idtipo_adquisicion' => 'Idtipo Adquisicion',
			'precio_unitario_compra' => 'Precio Unitario Compra',
			'precio_lote_compra' => 'Precio Lote Compra',
			'cantidad' => 'Cantidad',
			'garantia' => 'Garantia',
			'idtipo_moneda' => 'Idtipo Moneda',
			'cambio' => 'Cambio',
			'descuento_unitario_compra' => 'Descuento Unitario Compra',
			'descuento_lote_compra' => 'Descuento Lote Compra',
			'iddetalle_compra' => 'Iddetalle Compra',
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

		$criteria->compare('idcompra',$this->idcompra);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('idtipo_adquisicion',$this->idtipo_adquisicion);
		$criteria->compare('precio_unitario_compra',$this->precio_unitario_compra,true);
		$criteria->compare('precio_lote_compra',$this->precio_lote_compra,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('garantia',$this->garantia);
		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);
		$criteria->compare('cambio',$this->cambio,true);
		$criteria->compare('descuento_unitario_compra',$this->descuento_unitario_compra,true);
		$criteria->compare('descuento_lote_compra',$this->descuento_lote_compra,true);
		$criteria->compare('iddetalle_compra',$this->iddetalle_compra);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}