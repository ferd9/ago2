<?php
/**
 * Responsable de formar las consultas mysql y ejecutarlas para realizar la exportacion.
 */
class ExcelAMysqlModelo extends GenericoModelo
{	/**
	 * Contiene una instancia de la clase exportar.
	 * @var		object
	 */
	private	$exportar;
	
	/**
	 * Contiene una instancia del objeto worksheet.
	 * @var 	object
	 */
	private	$workSheet;
	
	/**
	 * Modo de insercion.
	 * I = Solo INSERT
	 * U = Si clave duplicada UPDATE
	 * @var 	char
	 */
	private $modo;
	
	/**
	 * Contiene la cantidad de filas a exportar.
	 * @var 	integer
	 */
	private $cantFilas;

	/**
	 * Contiene la cantidad de columnas de la planilla excel.
	 * @var 	integer
	 */
	private $cantColum;
	
	/**
	 * Contiene el prearmado de la consulta INSERT.
	 * @var 	String
	 */	
	private $preConsulta		= "INSERT INTO ";
	
	/**
	 * Contiene el final de la consulta INSERT cuando el modo es U.
	 * @var 	String
	 * @deprecated
	 */
	private $duplicateKey		= " ON DUPLICATE KEY UPDATE ";
	
	/**
	 * Recupera los errores por tipo. el 0 es correcto.
	 * y despues cada error corresponde a un tipo.
	 * @var 	array
	 */
	private $errores			= array(0   => 0);
	
	/**
	 * Contador de las consultas que se van realizando.
	 * @var		Integer
	 */
	private $cntConsultas		= 0;
	
	/**
	 * Nombre de la tabla a la cual se exportaran los datos.
	 * @var		String
	 */
	private $tabla;
	
	/**
	 * Contiene el modo de visualizacion de Deame3p.
	 * @var		Integer
	 */
	private $modoDeame3p;
	
	/**
	 * Contiene la salida para el textarea en caso de ser necesaria.
	 * @var		String
	 */
	private $textArea			= "";
	
	/**
	 * Comprueba y carga las variables necesarias para llevar adelante la exportacion.
	 *
	 * @param	object		$obj_Exportar	Es la instancia a la clase exportar. 
	 * @param 	object		$obj_Worksheet	Es la instancia a la clase excel.
	 * @param 	String		$tabla			nombre de la Tabla MySQL que recibira los datos.
	 * @param 	Integer		$modoDeame3p	Modo de visualizacion
	 * @param 	char		$modo			Es el modo de insercion.
	 */
	function comprobarSistema(Exportar $obj_Exportar, $obj_Worksheet,$tabla,$modoDeame3p,$modo='I')
	{	$this->dbMysqli->select_db($_SESSION['baseDeDatos']);
        $this->exportar				= $obj_Exportar;
		$this->workSheet			= $obj_Worksheet;
		$this->modoDeame3p			= $modoDeame3p;
		$this->tabla				= $tabla;
		$this->modo					= $modo;
		$this->cantFilas			= $obj_Worksheet->getHighestRow();
		$this->cantColum			= PHPExcel_Cell::columnIndexFromString($obj_Worksheet->getHighestColumn());
		// No utilizo Vista para que Tire los resultados antes
		echo '<br /><b> Se cargo el Modulo Insertar Correctamente.-';
		echo '<br /> Se Exportaran ' . ($this->cantFilas-1) . ' filas.-';
		echo '<br /> Cantidad maxima de columnas por fila ' . $this->cantColum . '.-</b><br />';
		echo '<br />';
		$this->preConsultaInsertar();
		$this->exportar();
	}
	
	/**
	 * Genera la parte Estatica de la consulta INSERT.
	 * INSERT INTO table ( campo1, ...., campoN) VALUES (
	 * @return 		String	Conteniendo la Cadena Inicial de INSERT.
	 */
	private function preConsultaInsertar()
	{
            $this->preConsulta.=" $this->tabla ( ";
            foreach ($this->exportar->getDatosPost() as $clave => $valor) {
                $this->preConsulta.="`$valor[2]`, ";
            }
            $this->preConsulta	= substr($this->preConsulta,0,strlen($this->preConsulta)-2);
            $this->preConsulta	= $this->preConsulta." ) VALUES (";
            
		return $this->preConsulta;	
	}
	
	
	private function exportar()
	{
        $datosExport        = $_SESSION['patronExportacion'];
        $datosExport[0][0]  = $datosExport[0][0]+1; // Pues el titulo ya esta cargado
        foreach ($datosExport as $filas) {
            $ini    = $filas[0];
            $fin    = ($filas[1] > $this->cantFilas)? $this->cantFilas : $filas[1];

        for($fila=$ini; $fila <= $fin;$fila++)
		{	// Preparo Variables de Generacion de Consultas
			$cargoDatos		= array();
			$consultaFin	= "";	
			$consultaUPDT	= "";
			
			foreach ($this->exportar->getDatosPost() as $clave => $datos)
			{	
                $columna	= $datos[0]-1;
                // Por defecto asumo que siempre se quiere exportar el valor crudo de excel
                // Si es formula que se envia la formula. Esto lo hago por ser mucho mas ligero.
                $valor      = $this->workSheet->getCellByColumnAndRow($columna, $fila)->getValue();

                //$value = $objPHPExcel->getActiveSheet()->getCell('B8')->getCalculatedValue();
                if ($_SESSION['formulaValor']) {
                    $valor  = $this->workSheet->getCellByColumnAndRow($columna, $fila)->getCalculatedValue();
                }
                
                $valor		= $this->exportar->formatearCampo($clave,$valor);
				$cargoDatos[]= array($datos[2],$valor);
			}
			$cant			= count($cargoDatos);
			for($f=0;$f<$cant;$f++)
			{	$clave			= $cargoDatos[$f][0];
				$valor			= $cargoDatos[$f][1];
				$consultaFin	= $consultaFin." '".$valor."',";
				$consultaUPDT	= $consultaUPDT." $clave = '".$valor."',";
			}
			$consultaFin	= substr($consultaFin,0,strlen($consultaFin)-1).")";
			if($this->modo=="U")
			{	$consultaUPDT	= substr($consultaUPDT,0,strlen($consultaUPDT)-1);
				$consultaFin	= $consultaFin.$this->duplicateKey.$consultaUPDT;
			}
			
			$consultaFin	= $this->preConsulta.$consultaFin;
			$this->ejecutarConsulta($consultaFin);
		
		}
        } // export filtro
		if($this->modoDeame3p==4)
		{	$this->textArea	= "<textarea  style='width:95%; font-family:'Trebuchet MS, Verdana' rows='15'  >".$this->textArea."</textarea>";
			echo $this->textArea;
		}


	}
	
	/**
	 * Ejecuta una consulta Mysql, y verifica si salio bien o da error para pasarsela a las
	 * estadisticas.
	 * 
	 * @param 	String		$consulta	Consulta Mysql
	 * @return 	void
	 */
	private function ejecutarConsulta($consulta)
	{	if($this->modoDeame3p==4)
		{	$this->textArea.=$consulta."\n";
			return ;
		}
		$this->cntConsultas++;
		$sw_muestra			= false;
		$salidaPantalla		= "<table align='center' class='bordeTablaRedondeado' width='700' ><tr><td><samp class='bodytext'>";
		$salidaPantalla		= $salidaPantalla . '<b>Consulta N.:' . $this->cntConsultas . '</b><br />' . $consulta."<br />";
		$resultado			= $this->dbMysqli->query($consulta);
		if($resultado)
		{	$this->errores[0]++;
			$salidaPantalla	= $salidaPantalla."<b>Correcto</b>";
			$sw_muestra		= true;
		}
		else
		{	@$this->errores[$this->dbMysqli->errno]++;
			$salidaPantalla	= $salidaPantalla."<b>Error: </b>" . $this->dbMysqli->error;
		}
		$salidaPantalla		= $salidaPantalla."</samp></td></tr></table><br />";
			
		ob_start('mostrarPantalla', 12);
		switch ($this->modoDeame3p)
		{	case 1:	if($sw_muestra)		{	echo $salidaPantalla;	}
					break;
			case 2: if(!$sw_muestra) 	{	echo $salidaPantalla;	} 
					break;
			case 3: echo $salidaPantalla;
					break;
			case 4: $this->textArea.=$consulta."\n";
		}
		@ob_end_flush();
	}
	
	/**
	 * Muestra por Pantalla lo almacenda en el bufer mediante la funcion ob_start().
	 * @param		String		$bufer	Contenido de salida HTML capturado.
	 * @return 		void		volcado a pantalla del HTML capturado.
	 */
	private function mostrarPantalla($bufer)
	{	echo $bufer;	}

	/**
	 * Retorna un arreglo con los errores o exitos producidos y su codigo de error.
	 * El 0 (cero) es correcto.
	 * 
	 * @return		Array	Arreglo con los errores.
	 */
	public function getErrores()
	{	return $this->errores;	}


    public function reset()
    {
       $this->exportar          = null;
       $this->workSheet         = null;
       $this->cantFilas         = null;
       $this->cantColum         = null;
       $this->preConsulta		= "INSERT INTO ";
       $this->duplicateKey		= " ON DUPLICATE KEY UPDATE ";
       unset($this->errores);
       $this->errores			= array(0   => 0);
       $this->cntConsultas		= 0;
       $this->textArea			= "";
       return;
    }
}