<?php

/**
 * This is the model class for table "guia_remision_compra".
 *
 * The followings are the available columns in table 'guia_remision_compra':
 * @property integer $idguia_remision_compra
 * @property integer $transporte
 * @property string $numero_documento
 * @property string $numero_origen
 * @property string $nombre_origen
 * @property string $direccion_origen
 * @property string $fecha_traslado
 * @property string $fecha_registro
 * @property string $numero_orden_compra
 * @property string $flete
 * @property string $estado
 * @property integer $almacen
 * @property string $usuario
 * @property integer $idproveedor
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property Proveedor $idproveedor0
 * @property Transporte $transporte0
 */
class GuiaRemisionCompra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GuiaRemisionCompra the static model class
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
		return 'guia_remision_compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transporte, numero_documento, fecha_traslado, fecha_registro, almacen, usuario, idproveedor', 'required'),
			array('transporte, almacen, idproveedor', 'numerical', 'integerOnly'=>true),
			array('numero_documento, numero_origen, numero_orden_compra', 'length', 'max'=>20),
			array('nombre_origen, direccion_origen', 'length', 'max'=>200),
			array('flete', 'length', 'max'=>9),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idguia_remision_compra, transporte, numero_documento, numero_origen, nombre_origen, direccion_origen, fecha_traslado, fecha_registro, numero_orden_compra, flete, estado, almacen, usuario, idproveedor', 'safe', 'on'=>'search'),
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
			'productos' => array(self::MANY_MANY, 'Producto', 'detalle_guia_remision_compra(idguia_remision_compra, idproducto)'),
			'idproveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idproveedor'),
			'transporte0' => array(self::BELONGS_TO, 'Transporte', 'transporte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idguia_remision_compra' => 'Idguia Remision Compra',
			'transporte' => 'Transporte',
			'numero_documento' => 'Numero Documento',
			'numero_origen' => 'Numero Origen',
			'nombre_origen' => 'Nombre Origen',
			'direccion_origen' => 'Direccion Origen',
			'fecha_traslado' => 'Fecha Traslado',
			'fecha_registro' => 'Fecha Registro',
			'numero_orden_compra' => 'Numero Orden Compra',
			'flete' => 'Flete',
			'estado' => 'Estado',
			'almacen' => 'Almacen',
			'usuario' => 'Usuario',
			'idproveedor' => 'Idproveedor',
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
		$criteria->compare('transporte0.razon_social',$this->transporte);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('numero_origen',$this->numero_origen,true);
		$criteria->compare('nombre_origen',$this->nombre_origen,true);
		$criteria->compare('direccion_origen',$this->direccion_origen,true);
		$criteria->compare('fecha_traslado',$this->fecha_traslado,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('numero_orden_compra',$this->numero_orden_compra,true);
		$criteria->compare('flete',$this->flete,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('idproveedor0.proveedor0.nombrecompleto',$this->idproveedor);
                $criteria->with=array('transporte0','idproveedor0');
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}