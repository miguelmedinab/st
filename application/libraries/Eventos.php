<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Eventos {

    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->model('M_admin');
    }

    public function registrar($descripcion, $usuario) {
        
        $datos_nuevos = array(
            'descripcion' => $descripcion,
            'usuario' => $usuario,
        );
        $this->ci->M_admin->registrar_log($datos_nuevos);
    }

}
