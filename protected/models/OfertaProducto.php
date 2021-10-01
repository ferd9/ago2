<?php

/**
 * This is the model class for table "ago.oferta_producto".
 *
 * The followings are the available columns in table 'ago.oferta_producto':
 * @property integer $idoferta_producto
 * @property integer $idproducto
 * @property string $precio_oferta
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * The followings are the available model relations:
 * @property Producto $idproducto0
 */
class OfertaProducto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OfertaProducto the static model class
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
		return 'oferta_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproducto, precio_oferta, fecha_inicio, fecha_fin', 'required'),
			array('idproducto', 'numerical', 'integerOnly'=>true),
			array('precio_oferta', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idoferta_producto, idproducto, precio_oferta, fecha_inicio, fecha_fin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idoferta_producto' => 'Idoferta Producto',
			'idproducto' => 'Idproducto',
			'precio_oferta' => 'Precio Oferta',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
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

		$criteria->compare('idoferta_producto',$this->idoferta_producto);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('precio_oferta',$this->precio_oferta,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}