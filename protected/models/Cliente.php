<?php

/**
 * This is the model class for table "ago.cliente".
 *
 * The followings are the available columns in table 'ago.cliente':
 * @property integer $idcliente
 * @property integer $cliente
 * @property integer $idtipo_cliente
 * @property string $numero_documento
 * @property string $estado
 * @property string $usuario
 * @property integer $puntos
 *
 * The followings are the available model relations:
 * @property Persona $cliente0
 * @property TipoCliente $idtipoCliente0
 * @property GuiaRemisionVenta[] $guiaRemisionVentas
 * @property Puntos[] $puntoses
 * @property Soporte[] $soportes
 * @property Venta[] $ventas
 */
class Cliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cliente the static model class
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
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cliente, idtipo_cliente, usuario,numero_documento', 'required'),
			array('cliente, idtipo_cliente, puntos', 'numerical', 'integerOnly'=>true),
			array('numero_documento', 'length', 'max'=>20),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcliente, cliente, idtipo_cliente, numero_documento, estado, usuario, puntos', 'safe', 'on'=>'search'),
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
			'cliente0' => array(self::BELONGS_TO, 'Persona', 'cliente'),
			'idtipoCliente0' => array(self::BELONGS_TO, 'TipoCliente', 'idtipo_cliente'),
			'guiaRemisionVentas' => array(self::HAS_MANY, 'GuiaRemisionVenta', 'idcliente'),
			'puntoses' => array(self::HAS_MANY, 'Puntos', 'idcliente'),
			'soportes' => array(self::HAS_MANY, 'Soporte', 'idcliente'),
			'ventas' => array(self::HAS_MANY, 'Venta', 'idcliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcliente' => 'Idcliente',
			'cliente' => 'Cliente',
			'idtipo_cliente' => 'Idtipo Cliente',
			'numero_documento' => 'Numero Documento',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
			'puntos' => 'Puntos',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
        public static function getListClientes()
        {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(c.idcliente, ' - ', p.nombrecompleto) FROM cliente c INNER JOIN persona p ON p.idpersona=c.cliente WHERE p.nombrecompleto <> '' ORDER BY p.nombrecompleto ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();
            
            $idnomCli = array();            
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomCli, $value);
                    }
                }            
            return $idnomCli;

        }


        public static function getnomClienteGuiaVenta($idguia)
            {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(c.idcliente, ' - ', p.nombrecompleto) FROM guia_remision_venta g INNER JOIN cliente c ON g.idcliente=c.idcliente INNER JOIN persona p ON p.idpersona=c.cliente WHERE p.nombrecompleto <> '' AND g.idguia_remision_venta=$idguia ORDER BY p.nombrecompleto ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();
            $abc;
            $idnomCli = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomCli, $value);
                    }
                }
               foreach($idnomCli as $idcliente=>$nomcliente)
               {
                   $abc = $nomcliente;
               }
            return $abc;

        }



//--------------------------------------------------------------------------------


         public static function getnomClienteCotizacion($idcotiza)
            {
            $connection=  Yii::app()->db;
            $sqlStatement="SELECT CONCAT(c.idcliente, ' - ', p.nombrecompleto) FROM venta g INNER JOIN cliente c ON g.idcliente=c.idcliente INNER JOIN persona p ON p.idpersona=c.cliente WHERE p.nombrecompleto <> '' AND g.idventa=$idcotiza ORDER BY p.nombrecompleto ASC;";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
            $reader=$command->query();
            $abc;
            $idnomCli = array();
            foreach($reader as $row)
                {
                foreach ($row as $fila=>$value)
                    {
                            array_push($idnomCli, $value);
                    }
                }
               foreach($idnomCli as $idcliente=>$nomcliente)
               {
                   $abc = $nomcliente;
               }
            return $abc;

        }



	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.idcliente',$this->idcliente, true);
		$criteria->compare('cliente0.nombre',$this->cliente, true);
		$criteria->compare('idtipoCliente0.descripcion',$this->idtipo_cliente, true);
		$criteria->compare('t.numero_documento',$this->numero_documento,true);
		$criteria->compare('t.estado',$this->estado,true);
		$criteria->compare('t.usuario',$this->usuario,true);
                 $criteria->with=array('cliente0','idtipoCliente0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}