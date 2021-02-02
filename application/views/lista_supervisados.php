<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Informes de Teletrabajo por Fecha</h6>
        
        <p class="mg-b-25 mg-lg-b-50"></p> 
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">N°</th>
                        <th class="wd-15p">Funcionario</th>
                       
                        <th class="wd-5p">Accion</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $n = 1;
                    foreach ($supervisados as $supervisado):
                        ?>
                        <tr>
                            <td><?php echo $n ?></td>
                            <td><?php print_r($this->auth_ad->get_all_user_data($supervisado['supervisado'])['cn'][0]) ; ?></td>
                            <td><a href="<?php echo base_url('inicio/lfs/').$supervisado['supervisado'] ?>" class="btn btn-info btn-icon"> <div><i class="fa fa-eye"></i></div></a></td>                  
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