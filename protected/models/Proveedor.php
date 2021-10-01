<?php

/**
 * This is the model class for table "proveedor".
 *
 * The followings are the available columns in table 'proveedor':
 * @property integer $idproveedor
 * @property integer $proveedor
 * @property string $ruc
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property Compra[] $compras
 * @property OrdenCompra[] $ordenCompras
 * @property Persona $proveedor0
 */
class Proveedor extends CActiveRecord
{
    public $linkCompra;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Proveedor the static model class
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
		return 'proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proveedor, ruc, usuario', 'required'),
			array('proveedor', 'numerical', 'integerOnly'=>true),
			array('ruc', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idproveedor, proveedor, ruc, estado, usuario', 'safe', 'on'=>'search'),
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
			'compras' => array(self::HAS_MANY, 'Compra', 'idproveedor'),
			'ordenCompras' => array(self::HAS_MANY, 'OrdenCompra', 'proveedor'),
			'proveedor0' => array(self::BELONGS_TO, 'Persona', 'proveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproveedor' => 'Idproveedor',
			'proveedor' => 'Proveedor',
			'ruc' => 'Ruc',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
		);
	}

        public static function getListProveedores()
        {
            $numProve = array();
            $criterioBusqueda = new CDbCriteria;
            //empleado  INNER JOIN departamento   ON empleado.IDdepartamento = departamento.IDdepartamento

            //$criterioBusqueda->join = 'proveedor.proveedor = persona.idpersona';
             $listaProveedore = Persona::model()->findAllBySql("select * from persona, proveedor where persona.idpersona=proveedor.proveedor");
             $atmp = CHtml::listData($listaProveedore,'idpersona','nombrecompleto');
             $count = 0;
             foreach($atmp as $key=>$values)
             {
                 $numProve[$count] = $values;
                 $count++;
             }
             return  $numProve;

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

		$criteria->compare('idproveedor',$this->idproveedor);
		$criteria->compare('proveedor',$this->proveedor);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>20),
		));
	}

        public static function getListProveedor()
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(pr.idproveedor, ' - ', pe.nombrecompleto) FROM proveedor pr INNER JOIN persona pe ON pe.idpersona=pr.proveedor ORDER BY pe.nombrecompleto ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();
            
            $idnomProv = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {                        
                            array_push($idnomProv, $value);
                    }
                }
            return $idnomProv;

        }


        public static function nombProveedor($idprove)
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(pr.idproveedor, ' - ', pe.nombrecompleto) FROM proveedor pr INNER JOIN persona pe ON pe.idpersona=pr.proveedor where pr.idproveedor=$idprove ORDER BY pe.nombrecompleto ASC limit 1;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();

            $idnomProv = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            $idnomProv=$value;
                    }
                }
            return $idnomProv;

        }
}