<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Informes de Teletrabajo por Mes</h6>

        <p class="mg-b-25 mg-lg-b-50"></p> 
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">N°</th>
                        <th class="wd-15p">Gestion</th>
                        <th class="wd-15p">Mes</th>
                        <th class="wd-20p">Actividades Realizadas</th>
                        <th class="wd-15p">Actividades Aprobadas</th>
                        <th class="wd-10p">Actividades Rechazadas</th>
                        <th class="wd-25p">Actividades sin revisar</th>
                        <th class="wd-25p">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($fechas as $fecha):
                        ?>
                        <tr>
                            <td><?php echo $n ?></td>
                            <td><?php echo $fecha['o_gestion']; ?></td>
                            <td><?php echo $fecha['o_mes']; ?></td>
                            <td><?php echo $fecha['o_total']; ?></td>
                            <td><?php echo $fecha['o_cumple']; ?></td>
                            <td><?php echo $fecha['o_no_cumple']; ?></td>
                            <td><?php echo $fecha['o_no_supervisado']; ?></td>
                            <td><?php if ($fecha['o_total']==$fecha['o_cumple']){ echo '<a href="'. base_url('inicio/generar_informe/').$fecha['o_gestion'].'-'.$fecha['o_mes'].'-1" target = "_blank" class="btn btn-success btn-icon"> <div><i class="fa fa-print"></i></div></a>'; }?></td>                  
                        </tr>
                        <?php
                        $n++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->