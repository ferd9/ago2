<?php

/**
 * This is the model class for table "precio_venta_tmp".
 *
 * The followings are the available columns in table 'precio_venta_tmp':
 * @property string $sutbotal
 * @property string $igv
 * @property string $total
 * @property string $usuario
 */
class PrecioVentaTmp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PrecioVentaTmp the static model class
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
		return 'precio_venta_tmp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario', 'required'),
			array('sutbotal, igv, total', 'length', 'max'=>9),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sutbotal, igv, total, usuario', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sutbotal' => 'Sutbotal',
			'igv' => 'Igv',
			'total' => 'Total',
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
                $userito = Yii::app()->user->name;
                $criteria->condition = "usuario='$userito'";
		$criteria->compare('sutbotal',$this->sutbotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}