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
        $query = $this->db->query("SELECT * FROM actividades where usuario like '" . $usuario . "' and estado order by fecha_hora desc");
        return $query->result_array();
    }

    public function obtener_fechas_informe($usuario) {
        $query = $this->db->query("select * from fn_st_get_record('" . $usuario . "')");
        return $query->result_array();
    }

    public function obtener_supervisados($usuario) {
        $query = $this->db->query("SELECT supervisado 	FROM public.supervision where supervisor='" . $usuario . "' and estado");
        return $query->result_array();
    }

    public function obtener_act_fe_fun($funcionario, $fecha) {
        $query = $this->db->query("SELECT id, fecha_hora, actividad, avance, cumplimiento, medioverificacion
	FROM public.actividades
	where CAST(fecha_hora AS date)='".$fecha."' and usuario='".$funcionario."' and estado");
        return $query->result_array();
    }

}
