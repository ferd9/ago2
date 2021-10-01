<?php

/**
 * This is the model class for table "ago.tipo_movimiento".
 *
 * The followings are the available columns in table 'ago.tipo_movimiento':
 * @property integer $idtipo_movimiento
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Caja[] $cajas
 * @property MovimientoAlmacen[] $movimientoAlmacens
 */
class TipoMovimiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoMovimiento the static model class
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
		return 'tipo_movimiento';
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
			array('descripcion', 'length', 'max'=>35),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo_movimiento, descripcion', 'safe', 'on'=>'search'),
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
			'cajas' => array(self::HAS_MANY, 'Caja', 'idtipo_movimiento'),
			'movimientoAlmacens' => array(self::HAS_MANY, 'MovimientoAlmacen', 'idtipo_movimiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo_movimiento' => 'Idtipo Movimiento',
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

		$criteria->compare('idtipo_movimiento',$this->idtipo_movimiento);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getTipoMovimiento()
        {
            $tipodocumento = new CDbCriteria;
            $tipodocumento->condition = "idtipo_movimiento<3";
            $tipodocumentoa = self::model()->findAll($tipodocumento);
            
            return  CHtml::listData($tipodocumentoa,'idtipo_movimiento','descripcion');
        }


}