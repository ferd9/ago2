<?php

/**
 * This is the model class for table "garantia".
 *
 * The followings are the available columns in table 'garantia':
 * @property integer $idgarantia
 * @property integer $idventa
 * @property integer $idsoporte
 * @property string $observacion
 * @property string $fecha_recepcion
 * @property string $fecha_entrega
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property EstadoGarantia[] $estadoGarantias
 * @property Soporte $idsoporte0
 * @property Venta $idventa0
 */
class Garantia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Garantia the static model class
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
		return 'garantia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idventa, idsoporte, observacion, fecha_recepcion, usuario', 'required'),
			array('idventa, idsoporte', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			array('fecha_entrega', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idgarantia, idventa, idsoporte, observacion, fecha_recepcion, fecha_entrega, estado, usuario', 'safe', 'on'=>'search'),
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
			'estadoGarantias' => array(self::MANY_MANY, 'EstadoGarantia', 'control_estado_garantia(idgarantia, idestado_garantia)'),
			'idsoporte0' => array(self::BELONGS_TO, 'Soporte', 'idsoporte'),
			'idventa0' => array(self::BELONGS_TO, 'Venta', 'idventa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idgarantia' => 'Idgarantia',
			'idventa' => 'Idventa',
			'idsoporte' => 'Idsoporte',
			'observacion' => 'Observacion',
			'fecha_recepcion' => 'Fecha Recepcion',
			'fecha_entrega' => 'Fecha Entrega',
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

		$criteria->compare('idgarantia',$this->idgarantia);
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idsoporte',$this->idsoporte);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('fecha_recepcion',$this->fecha_recepcion,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getListVentas()
        {
            $numProve = array();
            $criterioBusqueda = new CDbCriteria;
             $listaClientes = Venta::model()->findAllBySql("SELECT * FROM venta, detalle_venta where venta.idventa=detalle_venta.idventa");
             $atmp = CHtml::listData($listaClientes,'idventa','numero_documento');
             $count = 0;
             foreach($atmp as $key=>$values)
             {
                 $numProve[$count] = $values;
                 $count++;
             }
             return  $numProve;

        }
}