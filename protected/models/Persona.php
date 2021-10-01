<?php

/**
 * This is the model class for table "ago.persona".
 *
 * The followings are the available columns in table 'ago.persona':
 * @property integer $idpersona
 * @property integer $ubigeo
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $email
 * @property string $telefono
 * @property string $celular
 * @property string $direccion
 * @property string $zona
 * @property string $sexo
 * @property string $estado_civil
 * @property string $fax
 * @property string $anexo
 * @property string $nombrecompleto
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property Empresa[] $empresas
 * @property Ubigeo $ubigeo0
 * @property Proveedor[] $proveedors
 * @property Usuario[] $usuarios
 */
class Persona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Persona the static model class
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
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ubigeo', 'numerical', 'integerOnly'=>true),
			array('nombre, apaterno, direccion', 'length', 'max'=>200),
			array('amaterno, email', 'length', 'max'=>45),
			array('telefono, celular, fax, anexo', 'length', 'max'=>20),
			array('zona', 'length', 'max'=>100),
			array('sexo, estado_civil', 'length', 'max'=>1),
			array('nombrecompleto', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpersona, ubigeo, nombre, apaterno, amaterno, email, telefono, celular, direccion, zona, sexo, estado_civil, fax, anexo, nombrecompleto', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Cliente', 'cliente'),
			'empresas' => array(self::HAS_MANY, 'Empresa', 'empresa'),
			'ubigeo0' => array(self::BELONGS_TO, 'Ubigeo', 'ubigeo'),
			'proveedors' => array(self::HAS_MANY, 'Proveedor', 'proveedor'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpersona' => 'Idpersona',
			'ubigeo' => 'Ubigeo',
			'nombre' => 'Nombre',
			'apaterno' => 'Apaterno',
			'amaterno' => 'Amaterno',
			'email' => 'Email',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'direccion' => 'Direccion',
			'zona' => 'Zona',
			'sexo' => 'Sexo',
			'estado_civil' => 'Estado Civil',
			'fax' => 'Fax',
			'anexo' => 'Anexo',
			'nombrecompleto' => 'Nombrecompleto',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

          public function getEstadoCivil()
        {

            $estados=array('s'=>'Soltero/a','c'=>'Casado/a','b'=>'Conviviente','v'=>'Viudo/a','d'=>'Divorciado/a','r'=>'Separado/a');
            return $estados;
        }

        public function getSexo()
        {

            $sexo=array('m'=>'Masculino','f'=>'Femenino');
            return $sexo;
        }

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idpersona',$this->idpersona);
		$criteria->compare('ubigeo',$this->ubigeo);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apaterno',$this->apaterno,true);
		$criteria->compare('amaterno',$this->amaterno,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('zona',$this->zona,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('anexo',$this->anexo,true);
		$criteria->compare('nombrecompleto',$this->nombrecompleto,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}