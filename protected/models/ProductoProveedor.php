<?php

/**
 * This is the model class for table "producto_proveedor".
 *
 * The followings are the available columns in table 'producto_proveedor':
 * @property integer $idproducto_proveedor
 * @property integer $proveedor
 * @property integer $producto
 *
 * The followings are the available model relations:
 * @property Producto $producto0
 * @property Proveedor $proveedor0
 */
class ProductoProveedor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductoProveedor the static model class
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
		return 'producto_proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proveedor, producto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idproducto_proveedor, proveedor, producto', 'safe', 'on'=>'search'),
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
			'producto0' => array(self::BELONGS_TO, 'Producto', 'producto'),
			'proveedor0' => array(self::BELONGS_TO, 'Proveedor', 'proveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproducto_proveedor' => 'Idproducto Proveedor',
			'proveedor' => 'Proveedor',
			'producto' => 'Producto',
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

		$criteria->compare('idproducto_proveedor',$this->idproducto_proveedor);
                $criteria->compare('proveedor0.proveedor0.nombre',$this->proveedor, true);
		$criteria->compare('producto0.descripcion',$this->producto, true);
                $criteria->with=array('proveedor0','proveedor0','producto0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}