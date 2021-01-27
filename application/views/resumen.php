<?php
$funcionarios=$this->auth_ad->get_all_users();
foreach ($funcionarios as $funcionario){
    
    //foreach ($funcionario as $funci){
        
        //
        echo $funcionario['count'];
        echo '<br> _________________________________________<br>';
   // }
        print_r($funcionario);
    echo '<br> *********************************************<br>';
    //print_r($funcionario);
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
