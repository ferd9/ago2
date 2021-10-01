<?php

/**
 * This is the model class for table "ago.movimiento_almacen_serie".
 *
 * The followings are the available columns in table 'ago.movimiento_almacen_serie':
 * @property integer $idmovimiento_almacen_serie
 * @property integer $idmovimiento_almacen
 * @property string $serie
 * @property string $codigo_barras
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property MovimientoAlmacen $idmovimientoAlmacen0
 */
class MovimientoAlmacenSerie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MovimientoAlmacenSerie the static model class
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
		return 'movimiento_almacen_serie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmovimiento_almacen', 'required'),
			array('idmovimiento_almacen', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>30),
			array('codigo_barras', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmovimiento_almacen_serie, idmovimiento_almacen, serie, codigo_barras, descripcion', 'safe', 'on'=>'search'),
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
			'idmovimientoAlmacen0' => array(self::BELONGS_TO, 'MovimientoAlmacen', 'idmovimiento_almacen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmovimiento_almacen_serie' => 'Idmovimiento Almacen Serie',
			'idmovimiento_almacen' => 'Idmovimiento Almacen',
			'serie' => 'Serie',
			'codigo_barras' => 'Codigo Barras',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idmovimiento_almacen_serie',$this->idmovimiento_almacen_serie);
		$criteria->compare('idmovimiento_almacen',$this->idmovimiento_almacen);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}