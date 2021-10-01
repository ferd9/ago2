<?php

/**
 * This is the model class for table "ago.transporte".
 *
 * The followings are the available columns in table 'ago.transporte':
 * @property integer $idtransporte
 * @property string $nro_soat
 * @property string $marca_vehiculo
 * @property string $nro_placa
 * @property string $certificado_inscripcion
 * @property string $licencia_conducir
 * @property string $razon_social
 * @property string $ruc
 * @property string $usuario
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property GuiaRemisionCompra[] $guiaRemisionCompras
 * @property GuiaRemisionVenta[] $guiaRemisionVentas
 */
class Transporte extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Transporte the static model class
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
		return 'transporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_soat, marca_vehiculo, nro_placa, certificado_inscripcion, licencia_conducir, razon_social, ruc, usuario', 'required'),
			array('nro_soat', 'length', 'max'=>60),
			array('marca_vehiculo, nro_placa, certificado_inscripcion, licencia_conducir', 'length', 'max'=>45),
			array('razon_social', 'length', 'max'=>100),
			array('ruc', 'length', 'max'=>20),
                        array('ruc, razon_social', 'unique'),
			array('usuario', 'length', 'max'=>50),
			array('estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtransporte, nro_soat, marca_vehiculo, nro_placa, certificado_inscripcion, licencia_conducir, razon_social, ruc, usuario, estado', 'safe', 'on'=>'search'),
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
			'guiaRemisionCompras' => array(self::HAS_MANY, 'GuiaRemisionCompra', 'transporte'),
			'guiaRemisionVentas' => array(self::HAS_MANY, 'GuiaRemisionVenta', 'idtransporte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtransporte' => 'Idtransporte',
			'nro_soat' => 'Nro de Soat',
			'marca_vehiculo' => 'Marca del Vehículo',
			'nro_placa' => 'Nro de Placa',
			'certificado_inscripcion' => 'Certificado de Inscripcion',
			'licencia_conducir' => 'Licencia de Conducir',
			'razon_social' => 'Razon Social',
			'ruc' => 'Ruc',
			'usuario' => 'Usuario',
			'estado' => 'Estado',
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

		$criteria->compare('idtransporte',$this->idtransporte);
		$criteria->compare('nro_soat',$this->nro_soat,true);
		$criteria->compare('marca_vehiculo',$this->marca_vehiculo,true);
		$criteria->compare('nro_placa',$this->nro_placa,true);
		$criteria->compare('certificado_inscripcion',$this->certificado_inscripcion,true);
		$criteria->compare('licencia_conducir',$this->licencia_conducir,true);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getListTransporte()
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(idtransporte, ' - ', razon_social) FROM transporte ORDER BY razon_social ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();
            
            $idnomTrans = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomTrans, $value);
                    }
                }
            return $idnomTrans;

        }

}