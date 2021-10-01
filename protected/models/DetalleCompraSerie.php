<?php

/**
 * This is the model class for table "ago.detalle_compra_serie".
 *
 * The followings are the available columns in table 'ago.detalle_compra_serie':
 * @property integer $iddetalle_compra_serie
 * @property integer $idcompra
 * @property integer $idproducto
 * @property string $serie
 * @property string $codigo_barras
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property DetalleCompra $idcompra0
 * @property DetalleCompra $idproducto0
 */
class DetalleCompraSerie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleCompraSerie the static model class
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
		return 'detalle_compra_serie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcompra, idproducto', 'required'),
			array('idcompra, idproducto', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>30),
			array('codigo_barras', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddetalle_compra_serie, idcompra, idproducto, serie, codigo_barras, descripcion', 'safe', 'on'=>'search'),
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
			'idcompra0' => array(self::BELONGS_TO, 'DetalleCompra', 'idcompra'),
			'idproducto0' => array(self::BELONGS_TO, 'DetalleCompra', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_compra_serie' => 'Iddetalle Compra Serie',
			'idcompra' => 'Idcompra',
			'idproducto' => 'Idproducto',
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

		$criteria->compare('iddetalle_compra_serie',$this->iddetalle_compra_serie);
		$criteria->compare('idcompra',$this->idcompra);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}