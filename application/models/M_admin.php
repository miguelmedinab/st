<?php

class M_admin extends CI_Model {

    public function obtener_usuario($usuario) {

        $query = $this->db->query('SELECT * FROM usuario where cuenta=?', array($usuario));
        return $query->result_array();
    }
    
    public function registrar_log($datos) {

       try {
            $this->db->insert('logs', $datos);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}
