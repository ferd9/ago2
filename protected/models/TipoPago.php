<?php

/**
 * This is the model class for table "ago.tipo_pago".
 *
 * The followings are the available columns in table 'ago.tipo_pago':
 * @property integer $idtipo_pago
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 * @property Venta[] $ventas
 */
class TipoPago extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoPago the static model class
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
		return 'tipo_pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo_pago, descripcion', 'safe', 'on'=>'search'),
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
			'compras' => array(self::HAS_MANY, 'Compra', 'idtipo_pago'),
			'ventas' => array(self::HAS_MANY, 'Venta', 'idtipo_pago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo_pago' => 'Idtipo Pago',
			'descripcion' => 'Descripcion',
		);
	}

        public static  function getTipoPago()
        {
            $tipoPagos = self::model()->findAll(); 
            return  CHtml::listData($tipoPagos,'idtipo_pago','descripcion');
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

		$criteria->compare('idtipo_pago',$this->idtipo_pago);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

         public static function getTipoPagos()
        {
            $tipodocumento = new CDbCriteria;
            $tipodocumento->condition = "idtipo_pago<3";
            $tipodocumentoa = self::model()->findAll($tipodocumento);
            $listTipoPago = array();
            $listTipoPago = CHtml::listData($tipodocumentoa,'idtipo_pago','descripcion');
            array_unshift($listTipoPago, 'Seleccionar');
            return $listTipoPago;
        }

}