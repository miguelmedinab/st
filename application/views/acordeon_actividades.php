<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Actividades de Teletrabajo de: <?php echo $funcionario ?></h6>

        <p class="mg-b-25 mg-lg-b-50"></p> 
        <div class="table-wrapper">
            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                <?php
                setlocale(LC_TIME, 'es_BO.utf8');
                $n = 1;
                foreach ($fechas as $fecha) {
                    ?>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h6 class="mg-b-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $n ?>" aria-expanded="false" aria-controls="collapseOne" class="tx-gray-800 transition collapsed">
                                    <?php echo strftime("%d de %B de %Y", strtotime($fecha['o_fecha'])); ?>
                                </a>
                            </h6>
                        </div><!-- card-header -->

                        <div id="collapse<?php echo $n ?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                            <div class="card-block pd-20">
                                <table id="datatable" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-5p">N°</th>
                                            <th class="wd-15p">Fecha</th>
                                            <th class="wd-20p">Actividad</th>
                                            <th class="wd-15p">Avance</th>
                                            <th class="wd-10p">Resultado</th>
                                            <th class="wd-25p">Cumplimiento</th>
                                            <th class="wd-25p">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $n = 1;
                                        $actividades = $this->M_admin->obtener_act_fe_fun($funcionario, $fecha['o_fecha']);
                                        foreach ($actividades as $actividad):
                                            ?>
                                            <tr>
                                                <td><?php echo $n ?> </td>
                                                <td><?php echo strftime("%d-%m-%Y    %H:%M", strtotime($actividad['fecha_hora'])); ?></td>
                                                <td><?php echo $actividad['actividad'] ?></td>
                                                <td><?php echo $actividad['avance'] . '%' ?></td>
                                                <td><?php echo $actividad['medioverificacion'] ?></td>
                                                <td><?php
                                                    if ($actividad['cumplimiento']) {
                                                        if ($actividad['cumplimiento'] == 'f') {
                                                            echo 'No cumple';
                                                        } else {
                                                            echo 'Cumple';
                                                        };
                                                    } else {
                                                        echo 'No revisado';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    if ($actividad['cumplimiento'] == 'f' || is_null($actividad['cumplimiento'])) {
                                                        echo '<a href="'.base_url('inicio/ap_re/').$actividad['id'].'" class="btn btn-success btn-block mg-b-10"><i class="fa fa-check mg-r-10"></i> Aprobar</a>';
                                                        
                                                    }
                                                    else
                                                    { echo '<a href="'.base_url('inicio/ap_re/').$actividad['id'].'" class="btn btn-danger btn-block mg-b-10"><i class="fa fa-close mg-r-10"></i> Rechazar</a>';}
                                                    ?>
                                                </td>                    
                                            </tr>
                                            <?php
                                            $n++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>




                            </div>
                        </div>
                    </div>
                    <?php $n++;
                }
                ?>


            </div>
        </div><!-- table-wrapper -->
    </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->



