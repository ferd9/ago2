<?php

/**
 * This is the model class for table "ago.detalle_guia_remision_compra_serie".
 *
 * The followings are the available columns in table 'ago.detalle_guia_remision_compra_serie':
 * @property integer $detalle_guia_remision_compra_serie
 * @property integer $idguia_remision_compra
 * @property integer $idproducto
 * @property string $serie
 * @property string $codigo_barras
 *
 * The followings are the available model relations:
 * @property DetalleGuiaRemisionCompra $idguiaRemisionCompra0
 * @property DetalleGuiaRemisionCompra $idproducto0
 */
class DetalleGuiaRemisionCompraSerie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleGuiaRemisionCompraSerie the static model class
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
		return 'detalle_guia_remision_compra_serie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idguia_remision_compra, idproducto', 'required'),
			array('idguia_remision_compra, idproducto', 'numerical', 'integerOnly'=>true),
			array('serie', 'length', 'max'=>30),
			array('codigo_barras', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('detalle_guia_remision_compra_serie, idguia_remision_compra, idproducto, serie, codigo_barras', 'safe', 'on'=>'search'),
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
			'idguiaRemisionCompra0' => array(self::BELONGS_TO, 'DetalleGuiaRemisionCompra', 'idguia_remision_compra'),
			'idproducto0' => array(self::BELONGS_TO, 'DetalleGuiaRemisionCompra', 'idproducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'detalle_guia_remision_compra_serie' => 'Detalle Guia Remision Compra Serie',
			'idguia_remision_compra' => 'Idguia Remision Compra',
			'idproducto' => 'Idproducto',
			'serie' => 'Serie',
			'codigo_barras' => 'Codigo Barras',
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

		$criteria->compare('detalle_guia_remision_compra_serie',$this->detalle_guia_remision_compra_serie);
		$criteria->compare('idguia_remision_compra',$this->idguia_remision_compra);
		$criteria->compare('idproducto',$this->idproducto);
		$criteria->compare('serie',$this->serie,true);
		$criteria->compare('codigo_barras',$this->codigo_barras,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}