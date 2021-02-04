<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Actividades de Teletrabajo</h6>
        <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo3">Agregar</a>
        <p class="mg-b-25 mg-lg-b-50"></p> 
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">N°</th>
                        <th class="wd-15p">Fecha</th>
                        <th class="wd-20p">Actividad</th>
                        <th class="wd-10p">Resultado</th>
                        <th class="wd-15p">Avance</th>
                        <th class="wd-10p">Medio de Verificacion</th>
                        <th class="wd-25p">Estado</th>
                        <th class="wd-25p">Accion</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $n = 1;
                    foreach ($actividades as $actividad):
                        ?>
                        <tr>
                            <td><?php echo $n ?></td>
                            <td><?php echo strftime("%d-%m-%Y    %H:%M", strtotime($actividad['fecha_hora'])); ?></td>
                            <td><?php echo $actividad['actividad'] ?></td>
                            <td><?php echo $actividad['resultado'] ?></td>       
                            <td><?php echo $actividad['avance'] . '%' ?></td>
                            <td><?php echo $actividad['medioverificacion'] ?></td>
                            <td><?php
                                if ($actividad['cumplimiento']) {
                                    if ($actividad['cumplimiento'] == 'f') {
                                        echo 'Rechazado';
                                    } else {
                                        echo 'Aprobado';
                                    };
                                } else {
                                    echo 'No revisado';
                                }
                                ?></td>
                            <td>
                                
                                <?php
                                if ($actividad['cumplimiento'] == 'f' || is_null($actividad['cumplimiento'])) {
                                    echo
                                    '<a href="" class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modaldemo4"> <div><i class="fa fa-edit"></i></div></a>
                                    <a href="' . base_url('inicio/eliminar_actividad/') . $actividad['id'] . '" class="btn btn-danger btn-icon"> <div><i class="fa fa-trash"></i></div></a>';
                                }
                                ?>
                            </td>                    
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

<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <?php echo form_open(base_url() . 'inicio/guardar_actividad'); ?>
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Registro de Actividad</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <!--<div class="form-layout form-layout-1">-->
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Actividad: <span class="tx-danger">*</span></label>
                            <textarea id="actividad" name="actividad" rows="3" class="form-control" placeholder="Actividad segun POAI o TDR"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Resultado: <span class="tx-danger">*</span></label>
                            <textarea id="resultado" name="resultado" rows="3" class="form-control" placeholder="Resultado obtenido de la Actividad"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Avance <span class="tx-danger">*</span></label>
                            <div class="input-group">

                                <input id="porcentaje" name="porcentaje" type="number" min="1" max="100" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-addon tx-size-sm lh-2">%</span>
                            </div>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-10">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Medio de Verificacion<span class="tx-danger">*</span></label>
                            <input id="verificacion" name="verificacion" class="form-control" placeholder="Descripcion" type="text">

                        </div>
                    </div><!-- col-8 -->

                    <!--<div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Adjunte archivo(s) si es necesario<span class="tx-danger">*</span></label>
                           
                            <input type="file" id="file" name="file" accept="image/* ,.pdf,.docx, .doc, .xls, .xlsx , .pptx"  required/>

                        </div>
                    </div>-->





                </div><!-- form-layout -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs">Registrar Actividad</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
        <?php echo form_close() ?>
    </div><!-- modal-dialog -->
</div><!-- modal -->


<!--Edicion-->

<div id="modaldemo4" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <?php echo form_open(base_url() . 'inicio/guardar_actividad'); ?>
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edicion de Actividad</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <!--<div class="form-layout form-layout-1">-->
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Actividad: <span class="tx-danger">*</span></label>
                            <textarea id="actividad" name="actividad" rows="3" class="form-control" placeholder="Actividad segun POAI o TDR"><?php echo $actividad['actividad'] ?></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Resultado: <span class="tx-danger">*</span></label>
                            <textarea id="resultado" name="resultado" rows="3" class="form-control" placeholder="Resultado obtenido de la Actividad"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-control-label">Avance <span class="tx-danger">*</span></label>
                            <div class="input-group">

                                <input id="porcentaje" name="porcentaje" type="number" min="1" max="100" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-addon tx-size-sm lh-2">%</span>
                            </div>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-10">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Medio de Verificacion<span class="tx-danger">*</span></label>
                            <input id="verificacion" name="verificacion" class="form-control" placeholder="Descripcion" type="text">

                        </div>
                    </div><!-- col-8 -->

                    <!--<div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Adjunte archivo(s) si es necesario<span class="tx-danger">*</span></label>
                           
                            <input type="file" id="file" name="file" accept="image/* ,.pdf,.docx, .doc, .xls, .xlsx , .pptx"  required/>

                        </div>
                    </div>-->





                </div><!-- form-layout -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-size-xs">Registrar Actividad</button>
                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
        <?php echo form_close() ?>
    </div><!-- modal-dialog -->
</div><!-- modal -->
