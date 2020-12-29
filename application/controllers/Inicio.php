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

            $this->cargar_resumen();
            //$this->eventos->registrar('Inicio  de sesion',$this->session->userdata('username'));
        } else {

            header("Location: " . base_url());
            
        }
    }

    public function cargar_resumen() {

        if (!is_null($this->session->userdata('username'))) {

            $data['contenido'] = 'fechasteletrabajo';
            $data['menuact']=1;
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }
    
    public function actividad() {

        if (!is_null($this->session->userdata('username'))) {

            $data['contenido'] = 'actividad_1';
            $data['menuact']=2;
            $this->load->view('plantilla/template', $data);
        } else {
            header("Location: " . base_url());
        }
    }

    public function salir() {
        $this->eventos->registrar('Cierre de sesion',$this->session->userdata('username'));
        $this->session->sess_destroy();
        header("Location: " . base_url());
    }

}
