<?php
class IndexControl extends GenericoControl
{	
	/**
	 * Metodo index.
	 * El usuario debe escribr el metodo.
	 * @access 	public
	 * @return 	void
	 */
	public function index()
	{	$this->vista->cargar(array('plantilla' => 'index.tpl'));
        $html       = @file_get_contents('http://objetivophp.com/datos.ini');
        $datos      = explode('|', $html);
        // Datos de la ultima Version disponible
        $version    = $datos[0];
        $fecha      = $datos[1];
        $revision   = $datos[2];
        $url        = $datos[3];
        $mensaje    = $datos[4];

        $actualizacion      = '.';
        
        if ($revision > DM3P_RVSN) {
            $actualizacion  = '<br>'
                            . 'Version: ' . $version . '<br />'
                            . 'Fecha: ' . $fecha . '<br />'
                            . 'Revision: ' . $revision . '<br /><br />'
                            . $mensaje . '<br /> Descargalo de : '
                            . '<a href="' . $url . '">ObjetivoPHP.com</a>';
        }
        $this->vista->AsignarVar('actualizacion', $actualizacion);
        $this->vista->AsignarVar('version', DM3P_VRSN);
		$this->vista->mostrar('plantilla');
	}
	
	/**
	 * Muestra un mensaje cuando no se encuentra el controlador.
	 * @return 		void
	 */
	public function errorControlador()
	{	echo 'No se encontro el controlador correspondiente.';	
	}
	
	/**
	 * Muestra un mensaje de error cuando no se encuentra la accion.
	 * @return 		void
	 */
	public function errorAccion()
	{	echo 'No se encontro la accion correspondiente.';
	}
	
	/**
	 * Muestra un mensaje de que se nego el acceso.
	 * @return 		void
	 */
	public function accesoDenegado()
	{	echo 'Acceso Denegado';
		
	}
	
}