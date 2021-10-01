<?php

/**
 * This is the model class for table "ago.orden_compra".
 *
 * The followings are the available columns in table 'ago.orden_compra':
 * @property integer $idorden_compra
 * @property integer $proveedor
 * @property string $numero_documento
 * @property string $fecha
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 * @property Producto[] $productos
 * @property Proveedor $proveedor0
 */
class OrdenCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenCompra the static model class
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
		return 'orden_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proveedor, numero_documento, fecha, usuario', 'required'),
			array('proveedor', 'numerical', 'integerOnly'=>true),
			array('numero_documento', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idorden_compra, proveedor, numero_documento, fecha, estado, usuario', 'safe', 'on'=>'search'),
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
			'compras' => array(self::HAS_MANY, 'Compra', 'idorden_compra'),
			'productos' => array(self::MANY_MANY, 'Producto', 'detalle_orden_compra(idorden_compra, idproducto)'),
			'proveedor0' => array(self::BELONGS_TO, 'Proveedor', 'proveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idorden_compra' => 'Idorden Compra',
			'proveedor' => 'Proveedor',
			'numero_documento' => 'Numero Documento',
			'fecha' => 'Fecha',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
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

		$criteria->compare('idorden_compra',$this->idorden_compra);
		$criteria->compare('proveedor',$this->proveedor);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}