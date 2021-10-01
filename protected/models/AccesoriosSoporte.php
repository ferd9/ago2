<?php

/**
 * This is the model class for table "accesorios_soporte".
 *
 * The followings are the available columns in table 'accesorios_soporte':
 * @property integer $idacce_soporte
 * @property string $cantidad_soporte
 * @property string $descripcion_soporte
 * @property string $serie_soporte
 * @property string $codigobarras_soporte
 * @property string $usuario_sopore
 */
class AccesoriosSoporte extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AccesoriosSoporte the static model class
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
		return 'accesorios_soporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad_soporte', 'length', 'max'=>6),
			array('descripcion_soporte', 'length', 'max'=>200),
			array('serie_soporte, codigobarras_soporte, usuario_sopore', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idacce_soporte, cantidad_soporte, descripcion_soporte, serie_soporte, codigobarras_soporte, usuario_sopore', 'safe', 'on'=>'search'),
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
			'idacce_soporte' => 'Idacce Soporte',
			'cantidad_soporte' => 'Cantidad Soporte',
			'descripcion_soporte' => 'Descripcion Soporte',
			'serie_soporte' => 'Serie Soporte',
			'codigobarras_soporte' => 'Codigobarras Soporte',
			'usuario_sopore' => 'Usuario Sopore',
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
		$criteria->compare('idacce_soporte',$this->idacce_soporte);
		$criteria->compare('cantidad_soporte',$this->cantidad_soporte);
		$criteria->compare('descripcion_soporte',$this->descripcion_soporte);
		$criteria->compare('serie_soporte',$this->serie_soporte);
		$criteria->compare('codigobarras_soporte',$this->codigobarras_soporte);
		$criteria->compare('usuario_sopore',$this->usuario_sopore);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}



        public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->condition="usuario_sopore='$usuario'";
		$criteria->compare('idacce_soporte',$this->idacce_soporte);
		$criteria->compare('cantidad_soporte',$this->cantidad_soporte);
		$criteria->compare('descripcion_soporte',$this->descripcion_soporte);
		$criteria->compare('serie_soporte',$this->serie_soporte);
		$criteria->compare('codigobarras_soporte',$this->codigobarras_soporte);
		$criteria->compare('usuario_sopore',$this->usuario_sopore);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


}