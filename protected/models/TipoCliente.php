<?php

/**
 * This is the model class for table "ago.tipo_cliente".
 *
 * The followings are the available columns in table 'ago.tipo_cliente':
 * @property integer $idtipo_cliente
 * @property string $descripcion
 * @property string $tipo_documento
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 */
class TipoCliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoCliente the static model class
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
		return 'tipo_cliente';
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
			array('descripcion, tipo_documento', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo_cliente, descripcion, tipo_documento', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Cliente', 'idtipo_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo_cliente' => 'Idtipo Cliente',
			'descripcion' => 'Descripcion',
			'tipo_documento' => 'Tipo Documento',
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

		$criteria->compare('idtipo_cliente',$this->idtipo_cliente);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo_documento',$this->tipo_documento,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}