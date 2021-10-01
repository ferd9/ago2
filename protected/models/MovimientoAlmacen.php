<?php

/**
 * This is the model class for table "movimiento_almacen".
 *
 * The followings are the available columns in table 'movimiento_almacen':
 * @property integer $idmovimiento_almacen
 * @property integer $idtipo_movimiento
 * @property integer $idalmacen
 * @property integer $idproducto
 * @property integer $cantidad
 * @property integer $numero_origen
 * @property string $nombre_origen
 * @property string $fecha_movimiento
 * @property string $estado
 * @property string $usuario
 * @property string $desc_tipo_movimiento
 * @property string $precio_m_a
 * @property string $hora_movimiento
 *
 * The followings are the available model relations:
 * @property AlmacenProducto[] $almacenProductos
 * @property Producto $idproducto0
 * @property Almacen $idalmacen0
 * @property TipoMovimiento $idtipoMovimiento0
 * @property MovimientoAlmacenSerie[] $movimientoAlmacenSeries
 */
class MovimientoAlmacen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MovimientoAlmacen the static model class
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
		return 'movimiento_almacen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtipo_movimiento, idalmacen, idproducto, cantidad, numero_origen, fecha_movimiento, usuario, hora_movimiento', 'required'),
			array('idtipo_movimiento, idalmacen, idproducto, cantidad, numero_origen', 'numerical', 'integerOnly'=>true),
			array('nombre_origen', 'length', 'max'=>200),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			array('desc_tipo_movimiento', 'length', 'max'=>250),
			array('precio_m_a', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmovimiento_almacen, idtipo_movimiento, idalmacen, idproducto, cantidad, numero_origen, nombre_origen, fecha_movimiento, estado, usuario, desc_tipo_movimiento, precio_m_a, hora_movimiento', 'safe', 'on'=>'search'),
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
			'almacenProductos' => array(self::HAS_MANY, 'AlmacenProducto', 'idmovimiento_almacen'),
			'idproducto0' => array(self::BELONGS_TO, 'Producto', 'idproducto'),
			'idalmacen0' => array(self::BELONGS_TO, 'Almacen', 'idalmacen'),
			'idtipoMovimiento0' => array(self::BELONGS_TO, 'TipoMovimiento', 'idtipo_movimiento'),
			'movimientoAlmacenSeries' => array(self::HAS_MANY, 'MovimientoAlmacenSerie', 'idmovimiento_almacen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmovimiento_almacen' => 'Idmovimiento Almacen',
			'idtipo_movimiento' => 'Idtipo Movimiento',
			'idalmacen' => 'Idalmacen',
			'idproducto' => 'Idproducto',
			'cantidad' => 'Cantidad',
			'numero_origen' => 'Numero Origen',
			'nombre_origen' => 'Nombre Origen',
			'fecha_movimiento' => 'Fecha Movimiento',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
			'desc_tipo_movimiento' => 'Desc Tipo Movimiento',
			'precio_m_a' => 'Precio M A',
			'hora_movimiento' => 'Hora Movimiento',
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
                $salida = "Salida Almacen";
                $entrada = "Entrada Almacen";
		$criteria=new CDbCriteria;
                $criteria->order ="concat(fecha_movimiento,hora_movimiento) desc";
                $criteria->condition = "nombre_origen='$salida' or nombre_origen='$entrada'";
		$criteria->compare('idtipoMovimiento0.descripcion',$this->idtipo_movimiento,true);
		$criteria->compare('idalmacen0.nombre',$this->idalmacen,true);
		$criteria->compare('idproducto0.descripcion',$this->idproducto,true);
		$criteria->compare('t.fecha_movimiento',$this->fecha_movimiento,true);
		$criteria->compare('t.usuario',$this->usuario,true);
		$criteria->compare('t.hora_movimiento',$this->hora_movimiento,true);
                $criteria->with=array('idtipoMovimiento0','idalmacen0','idproducto0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}