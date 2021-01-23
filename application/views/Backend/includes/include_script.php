<!-- build:js /assets/js/core.min.js -->
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery/dist/jquery.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-ui/jquery-ui.min.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-slimscroll/jquery.slimscroll.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/PACE/pace.min.js?v=<?php echo PROJE_VERSION;?>"></script>
<!-- endbuild -->

<!-- build:js <?php echo base_url("assets"); ?>/assets/js/app.min.js -->
<!--<script src="--><?php //echo base_url("assets"); ?><!--/assets/js/library.js?v=<?php echo PROJE_VERSION;?>"></script>-->

<?php $this->load->view("backend/includes/library"); ?>
<script src="<?php echo base_url("assets"); ?>/assets/js/plugins.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/assets/js/app.js?v=<?php echo PROJE_VERSION;?>"></script>
<!-- endbuild -->
<script src="<?php echo base_url("assets"); ?>/libs/bower/moment/moment.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/fullcalendar/dist/fullcalendar.min.js?v=<?php echo PROJE_VERSION;?>"></script>
<script src="<?php echo base_url("assets"); ?>/assets/js/fullcalendar.js?v=<?php echo PROJE_VERSION;?>"></script>

<script src="<?php echo base_url("assets"); ?>/assets/js/sweetalert2.all.js?v=<?php echo PROJE_VERSION;?>"></script>

<script src="<?php echo base_url("assets"); ?>/assets/js/iziToast.min.js?v=<?php echo PROJE_VERSION;?>"></script>

<?php $this->load->view("backend/includes/alert"); ?>


<!--<script src="--><?php //echo base_url("assets"); ?><!--/assets/js/custom.js?v=<?php echo PROJE_VERSION;?>"></script>-->
