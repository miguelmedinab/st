<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Informes de Teletrabajo por Fecha</h6>
        
        <p class="mg-b-25 mg-lg-b-50"></p> 
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">N°</th>
                        <th class="wd-15p">Fecha</th>
                        <!--<th class="wd-20p">Actividad</th>
                        <th class="wd-15p">Avance</th>
                        <th class="wd-10p">Resultado</th>
                        <th class="wd-25p">Cumplimiento</th>-->
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
                            <td><?php echo strftime("%d-%m-%Y", strtotime($fecha['fecha_hora'])); ?></td>
                            <td><a href="#" class="btn btn-success btn-icon"> <div><i class="fa fa-print"></i></div></a></td>                  
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