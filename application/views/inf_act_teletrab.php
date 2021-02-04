<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RPDF extends FPDF {
    /* function header() {

      $this->Image(base_url() . 'img/LOGO2.png', 80, 5, 50);
      $this->SetFont('Arial', '', 12);
      $this->Cell(65);
      $this->Cell(50, 20, '', 0, 1, 'C');
      $this->Cell(125);
      $this->Cell(60, 15, utf8_decode('INE - ASESORIA LEGAL'), 0, 1, 'C');
      $this->Cell(50, 0, '', 0, 1, 'C');
      }

      function Footer() {
      $this->SetY(-22);
      $this->SetFont('Arial', 'I', 7);
      $this->Cell(0, 10, utf8_decode('Oficina Central La Paz'), 0, 1, 'C');
      $this->SetY(-19);
      $this->Cell(0, 10, utf8_decode('Avenida José Carrasco Nº 1391 - Miraflores * Telf.: Piloto (591-2) 2222333 * Fax (591-2)2222885'), 0, 1, 'C');
      $this->SetY(-16);
      $this->Cell(0, 10, utf8_decode('www.ine.gob.bo    * @INEOficialBO    * /ineboliviaoficial    * ceninf@ine.gob.bo'), 0, 1, 'C');
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 6);
      $this->Cell(0, 10, utf8_decode('Pág.') . $this->PageNo() . '/{nb}', 0, 0, 'R');
      } */

    ////funcion para crear Tablas con fpdf
    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

}

setlocale(LC_TIME, 'es_BO.utf8');
$this->myfpdf = new RPDF('P', 'mm', 'Letter');
$this->myfpdf->SetTitle('Informe de Teletrabajo', 0);
$this->myfpdf->AliasNbPages();
$this->myfpdf->AddPage();
$this->myfpdf->Image(base_url() . 'img/LOGO2.png', 15, 15, 40);
$this->myfpdf->SetFont('Arial', 'B', 15);
$this->myfpdf->SetX(10);
$this->myfpdf->MultiCell(195, 30, utf8_decode('                            FORMULARIO DE ACTIVIDADES DE TELETRABAJO '), 1, 'C', 0);
$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(195, 5, utf8_decode('1. Datos del Funcionario Solicitante'), 1, 1, 'L');
$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(35, 5, utf8_decode('1. Direccion:'), 1, 1, 'C');
$this->myfpdf->SetY(49);
$this->myfpdf->SetX(47);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(158, 5, '', 1, 1, 'C');
$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(35, 5, utf8_decode('2. Jefatura:'), 1, 1, 'C');
$this->myfpdf->SetY(56);
$this->myfpdf->SetX(47);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(158, 5, $this->session->userdata('department'), 1, 1, 'C');
$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(35, 5, utf8_decode('3. Cargo:'), 1, 1, 'C');
$this->myfpdf->SetY(63);
$this->myfpdf->SetX(47);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(158, 5, $this->session->userdata('title'), 1, 1, 'C');
$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(35, 5, utf8_decode('4. Nombre Completo:'), 1, 1, 'C');
$this->myfpdf->SetY(70);
$this->myfpdf->SetX(47);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(120, 5, $this->session->userdata('cn'), 1, 1, 'C');

$this->myfpdf->SetY(70);
$this->myfpdf->SetX(169);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(10, 5, 'CI:', 1, 1, 'C');
$this->myfpdf->SetY(70);
$this->myfpdf->SetX(180);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(25, 5, '', 1, 1, 'C');

$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetX(10);
$this->myfpdf->SetFont('Arial', 'B', 9);
$this->myfpdf->Cell(195, 5, utf8_decode('2. Actividades realizadas en el teletrabajo'), 1, 1, 'L');
$this->myfpdf->Cell(10, 6, utf8_decode('Nro'), 1, 0, 'C');
$this->myfpdf->Cell(20, 6, utf8_decode('Fecha'), 1, 0, 'C');
$this->myfpdf->Cell(50, 6, utf8_decode('Actividad'), 1, 0, 'C');
$this->myfpdf->Cell(10, 6, utf8_decode('Av.'), 1, 0, 'C');
$this->myfpdf->Cell(60, 6, utf8_decode('Resultado'), 1, 0, 'C');
$this->myfpdf->Cell(45, 6, utf8_decode('Medio de Verificacion'), 1, 1, 'C');

$this->myfpdf->SetFont('Arial', '', 9);
$this->myfpdf->SetWidths(array(10, 20, 50, 10, 60, 45));
$this->myfpdf->SetX(10);
$n=1;
foreach($act_men as $actividad){
    
$this->myfpdf->Row(array($n, utf8_decode(strftime("%d-%m-%Y", strtotime($actividad['fecha_hora']))), utf8_decode($actividad['actividad']), utf8_decode($actividad['avance'].'%'),utf8_decode($actividad['resultado']), utf8_decode($actividad['medioverificacion'])));
$n++;
}

$this->myfpdf->Cell(0, 2, '', 0, 1, 'L');
$this->myfpdf->SetFont('Arial', '', 7);
$this->myfpdf->SetWidths(array(100, 95));
$this->myfpdf->SetX(10);

$this->myfpdf->Row(array(utf8_decode('3. Yo, teletrabajador, declaro que:
-	Cuento con los requisitos mínimos detallados en el Punto 1.del Formulario presente.
-	Me comprometo a reportar de manera diaria mis actividades con sus respectivos medios de verificación a mis inmediatos superiores empleando el formulario establecido para este fin.
-	Me comprometo a contestar los requerimientos, coordinaciones, llamadas y otros de mis inmediatos superiores y/o compañeros de trabajo.
-	Me comprometo a realizar mis funciones con responsabilidad; respetando y cumpliendo toda normativa externa e interna de la institución.
Asimismo, adjunto debidamente llenado y firmado el Acta de Confidencialidad'), utf8_decode('4. En calidad de inmediato superior del teletrabajador, autorizo  y me comprometo  a controlar, monitorear y supervisar  por la institución, las actividades que vaya a desarrollar el solicitante.')));

$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetFont('Arial', 'B', 7);
$this->myfpdf->Cell(100, 6, utf8_decode('Solicitante'), 1, 0, 'C');
$this->myfpdf->Cell(95, 6, utf8_decode('Autorizado Por'), 1, 1, 'C');


$this->myfpdf->SetFont('Arial', '', 6);
$this->myfpdf->SetWidths(array(100, 95));
$this->myfpdf->SetX(10);

$this->myfpdf->Row(array( '   
    
    
    
    
                                           Firma/Aclaracion de Firma TELETRABAJADOR', ' 
           
           
                      
           
                                     Firma Aclaracion de Firma INMEDIATO SUPERIOR'));

$this->myfpdf->Cell(0, 2, '', 0, 1, 'C');
$this->myfpdf->SetFont('Arial', '', 6);
$this->myfpdf->SetWidths(array(50,50,50,45));
$this->myfpdf->SetX(10);

$this->myfpdf->Row(array( '   
    
        

    
           DIRECCION DEL TELETRABAJADOR', utf8_decode(' 
           
           
                      
           
                                  V°B° DAS'), '
                                         

                                         
                                         
                  Fecha/Hora Recepcion URHyC','
                                             
                                             

                                             
       Sello de Recepcion de Copia DICIE'));

$nombre_informe = 'Informe_contrato.pdf';
$modo = 'I';
$this->myfpdf->Output($nombre_informe, $modo);
?>