<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">MENU</label>
    <div class="br-sideleft-menu">
        <!--<a href="index.html" class="br-menu-link">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Resumen</span>
            </div>
        </a>-->


        <a href="#" class="br-menu-link active show-sub">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Teletrabajo</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="<?php echo base_url('inicio/fechas') ?>" class="nav-link <?php echo ($menuact == 1) ? 'active' : ''; ?>">Informes por Fecha</a></li>
            <li class="nav-item"><a href="<?php echo base_url('inicio/actividad') ?>" class="nav-link <?php echo ($menuact == 2) ? 'active' : ''; ?>">Registrar Actividad</a></li>

        </ul>  
        <?php 
        
        if(count($this->M_admin->obtener_rol($this->session->userdata('username')))==1){
            if($this->M_admin->obtener_rol($this->session->userdata('username'))[0]['rol']==2){?>
        <a href="#" class="br-menu-link active show-sub">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Supervision</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">            
            <li class="nav-item"><a href="<?php echo base_url('inicio/listar_supervisados') ?>" class="nav-link <?php echo ($menuact == 3) ? 'active' : ''; ?>">Funcionario Supervisados</a></li>
        </ul> 
            <?php }}?>
    </div><!-- br-sideleft-menu -->   
    
    <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->