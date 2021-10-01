<?php

/**
 * This is the model class for table "caja".
 *
 * The followings are the available columns in table 'caja':
 * @property integer $idcaja
 * @property string $fecha_caja
 * @property string $hora
 * @property string $descripcion
 * @property integer $idtipo_movimiento
 * @property string $monto
 * @property integer $idtipo_moneda
 * @property integer $almacen
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property TipoMovimiento $idtipoMovimiento0
 * @property Almacen $almacen0
 * @property TipoMoneda $idtipoMoneda0
 */
class Caja extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Caja the static model class
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
		return 'caja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('monto, fecha_caja, hora, idtipo_movimiento, idtipo_moneda, descripcion, almacen', 'required'),
			array('idtipo_movimiento, idtipo_moneda, almacen', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>200),
			array('monto', 'length', 'max'=>9),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			array('fecha_caja, hora', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcaja, fecha_caja, hora, descripcion, idtipo_movimiento, monto, idtipo_moneda, almacen, estado, usuario', 'safe', 'on'=>'search'),
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
			'idtipoMovimiento0' => array(self::BELONGS_TO, 'TipoMovimiento', 'idtipo_movimiento'),
			'almacen0' => array(self::BELONGS_TO, 'Almacen', 'almacen'),
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcaja' => 'Idcaja',
			'fecha_caja' => 'Fecha Caja',
			'hora' => 'Hora',
			'descripcion' => 'Descripcion',
			'idtipo_movimiento' => 'Idtipo Movimiento',
			'monto' => 'Monto',
			'idtipo_moneda' => 'Idtipo Moneda',
			'almacen' => 'Almacen',
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
                $criteria->order="concat(fecha_caja,hora) desc";
		$criteria->compare('idcaja',$this->idcaja);
		$criteria->compare('t.fecha_caja',$this->fecha_caja,true);
		$criteria->compare('t.hora',$this->hora,true);
		$criteria->compare('t.descripcion',$this->descripcion,true);
		$criteria->compare('idtipoMovimiento0.descripcion',$this->idtipo_movimiento,true);
		$criteria->compare('t.monto',$this->monto,true);
		$criteria->compare('idtipoMoneda0.descripcion',$this->idtipo_moneda,true);
		$criteria->compare('almacen0.nombre',$this->almacen,true);
		$criteria->compare('t.estado',$this->estado,true);
		$criteria->compare('t.usuario',$this->usuario,true);
                $criteria->with=array('idtipoMovimiento0','idtipoMoneda0','almacen0');
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getidcajaapertura($fechactual)
            {
            $num = Caja::model()->findAllBySql("SELECT idcaja FROM caja WHERE idtipo_movimiento=3 and fecha_caja='".$fechactual."' LIMIT 1;");
            $numdoc = $num[0]['idcaja'];
            return $numdoc;
            }

            public static function getmontoentrada($fechactual)
            {
            $sum = Caja::model()->findAllBySql("SELECT SUM(monto) AS monto FROM caja WHERE fecha_caja='".$fechactual."' and idtipo_movimiento=1;");
            $suma = $sum[0]['monto'];
            $sumita = $suma;
            if($sumita==""){$sumita='0';}
            return $sumita;
            }

            public static function getmontosalida($fechactual)
            {
            $sum = Caja::model()->findAllBySql("SELECT SUM(monto) AS monto FROM caja WHERE fecha_caja='".$fechactual."' and idtipo_movimiento=2;");
            $suma = $sum[0]['monto'];
            $sumita = $suma;
            if($sumita==""){$sumita='0';}
            return $sumita;
            }





}