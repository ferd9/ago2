<?php

/**
 * This is the model class for table "soporte".
 *
 * The followings are the available columns in table 'soporte':
 * @property integer $idsoporte
 * @property integer $idcliente
 * @property string $observaciones
 * @property string $fecha_ingreso_soporte
 * @property string $fecha_salida_producto
 * @property string $tipo_atencion
 * @property string $estado_producto
 * @property string $usuario
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Accesorios[] $accesorioses
 * @property Garantia[] $garantias
 * @property Cliente $idcliente0
 */
class Soporte extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Soporte the static model class
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
		return 'soporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcliente, observaciones, fecha_ingreso_soporte, tipo_atencion, usuario', 'required'),
			array('idcliente', 'numerical', 'integerOnly'=>true),
			array('tipo_atencion, estado', 'length', 'max'=>1),
                        array('estado_producto', 'length', 'max'=>200),
			array('usuario', 'length', 'max'=>15),
			array('fecha_salida_producto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idsoporte, idcliente, observaciones, fecha_ingreso_soporte, fecha_salida_producto, tipo_atencion, estado_producto, usuario, estado', 'safe', 'on'=>'search'),
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
			'accesorioses' => array(self::HAS_MANY, 'Accesorios', 'idsoporte'),
			'garantias' => array(self::HAS_MANY, 'Garantia', 'idsoporte'),
			'idcliente0' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsoporte' => 'Idsoporte',
			'idcliente' => 'Idcliente',
			'observaciones' => 'Observaciones',
			'fecha_ingreso_soporte' => 'Fecha Ingreso Soporte',
			'fecha_salida_producto' => 'Fecha Salida Producto',
			'tipo_atencion' => 'Tipo Atencion',
			'estado_producto' => 'Estado Producto',
			'usuario' => 'Usuario',
			'estado' => 'Estado',
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

		$criteria->compare('idsoporte',$this->idsoporte);
		$criteria->compare('idcliente0.cliente0.nombrecompleto',$this->idcliente,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('t.fecha_ingreso_soporte',$this->fecha_ingreso_soporte,true);
		$criteria->compare('t.fecha_salida_producto',$this->fecha_salida_producto,true);
		$criteria->compare('t.tipo_atencion',$this->tipo_atencion,true);
		$criteria->compare('t.estado_producto',$this->estado_producto,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('t.estado',$this->estado,true);
                $criteria->with=array('idcliente0.cliente0',);
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        public function getEstadoProducto()
        {

            $estados=array('n'=>'No pasa garantia','c'=>'Nota Credito','r'=>'Reparacion-Soporte','e'=>'Reparacion-Entregado','d'=>'Derivado a Proveedor');
            return $estados;
        }

        public function getAtencion()
        {

            $atencion=array('g'=>'Garantía','s'=>'Servicio');
            return $atencion;
        }


        

}