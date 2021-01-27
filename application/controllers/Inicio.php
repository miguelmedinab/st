<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function autenticar() {

        $username = strtolower($this->input->post('usuario'));
        $password = $this->input->post('password');

        if ($this->auth_ad->login($username, $password)) {

            $this->fechas();
            //$this->eventos->registrar('Inicio  de sesion',$this->session->userdata('username'));
        } else {

            header("Location: " . base_url());
        }
    }

    public function cargar_resumen() {

        if (!is_null($this->session->userdata('username'))) {

            $data['contenido'] = 'resumen';
            $data['menuact'] = 1;
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function actividad() {

        if (!is_null($this->session->userdata('username'))) {

            $data['contenido'] = 'actividad_1';
            $data['actividades'] = $this->M_admin->obtener_actividades($this->session->userdata('username'));
            $data['menuact'] = 2;
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function salir() {
        //$this->eventos->registrar('Cierre de sesion', $this->session->userdata('username'));
        $this->session->sess_destroy();
        header("Location: " . base_url());
    }

    /* public function guardar_actividad() {

      if (!is_null($this->session->userdata('username'))) {
      $datos_actividad = array(
      'actividad' => $this->input->post('actividad'),
      'avance' => $this->input->post('porcentaje'),
      'medioverificacion' => $this->input->post('verificacion'),
      'fecha' => '01-01-2020',
      'usuario' => $this->session->userdata('username')
      );
      $this->db->insert('actividades', $datos_actividad);
      header("Location: " . base_url('inicio/actividad'));
      } else {
      header("Location: " . base_url());
      }
      } */

    public function guardar_actividad() {
        //$sess = $this->session->userdata();
        if (!is_null($this->session->userdata('username'))) {

            $timezone = "America/La_Paz";
            date_default_timezone_set($timezone);
            $mi_archivo = 'file';
            
            $config['upload_path'] = "uploads/";
            $config['file_name'] = $this->input->post('verificacion');
            $config['allowed_types'] = "*";
            $config['max_size'] = "100000";
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($mi_archivo)) {
                //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            } else {
                //$archivo = $_FILES['file']['name'];
                //$trozos = explode(".", $archivo);
                //$extension = end($trozos);
                $datos_actividad = array(
                    'actividad' => $this->input->post('actividad'),
                    'avance' => $this->input->post('porcentaje'),
                    'medioverificacion' => $this->input->post('verificacion'),
                    'fecha' => '01-01-2020',
                    'usuario' => $this->session->userdata('username')
                );
                $this->db->insert('actividades', $datos_actividad);
                //$this->eventos->registrar('subida de imagen ' . $this->input->post('hr') . '-' . $this->input->post('gestion') . '_' . $fh . "." . $extension, $this->session->userdata('username'));
            }

            $data['uploadSuccess'] = $this->upload->data();

            header("Location: " . base_url('inicio/actividad'));
        } else {
            header("Location: " . base_url());
        }
    }

    public function eliminar_actividad($id) {
        if (!is_null($this->session->userdata('username'))) {
            $this->db->delete('actividades', array('id' => $id));
            header("Location: " . base_url('inicio/actividad'));
        } else {
            header("Location: " . base_url());
        }
    }

    public function fechas() {
        if (!is_null($this->session->userdata('username'))) {
            $data['contenido'] = 'fechasteletrabajo';
            $data['menuact'] = 1;
            $data['fechas'] = $this->M_admin->obtener_fechas_informe($this->session->userdata('username'));
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }
    
    public function listar_supervisados() {
        if (!is_null($this->session->userdata('username'))) {
            $data['contenido'] = 'lista_supervisados';
            $data['menuact'] = 3;
            $data['fechas'] = $this->M_admin->obtener_supervisados($this->session->userdata('username'));
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

}
