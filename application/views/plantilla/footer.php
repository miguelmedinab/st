<footer class="br-footer">
    <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2021. Unidad de Informatica.</div>
        <div>Direccion de Informatica Cartografia e Infraestructura Espacial</div>
    </div>
    <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>
        <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>
    </div>
</footer>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="<?php echo base_url() ?>lib/jquery/jquery.js"></script>
<script src="<?php echo base_url() ?>lib/popper.js/popper.js"></script>
<script src="<?php echo base_url() ?>lib/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url() ?>lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url() ?>lib/moment/moment.js"></script>
<script src="<?php echo base_url() ?>lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="<?php echo base_url() ?>lib/peity/jquery.peity.js"></script>
<script src="<?php echo base_url() ?>lib/highlightjs/highlight.pack.js"></script>
<script src="<?php echo base_url() ?>lib/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url() ?>lib/select2/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>js/bracket.js"></script>
<script>
    $(function () {

        // showing modal with effect
        $('.modal-effect').on('click', function () {
            var effect = $(this).attr('data-effect');
            $('#modaldemo8').addClass(effect, function () {
                $('#modaldemo8').modal('show');
            });
            return false;
        });

        // hide modal with effect
        $('#modaldemo8').on('hidden.bs.modal', function (e) {
            $(this).removeClass(function (index, className) {
                return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
            });
        });
    });
</script>
<script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
</body>
</html>