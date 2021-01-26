<?php

class M_admin extends CI_Model {
    
    public function registrar_log($datos) {
       try {
            $this->db->insert('logs', $datos);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
    
    public function obtener_actividades($usuario) {
        $query = $this->db->query("SELECT * FROM actividades where usuario like '".$usuario."' and estado order by fecha_hora desc");
        return $query->result_array();
    }
    
    public function obtener_fechas_informe($usuario) {
        $query = $this->db->query("select distinct  CAST(fecha_hora AS date) FROM actividades where usuario like '".$usuario."' and estado order by fecha_hora desc");
        return $query->result_array();
    }
    
    
}
