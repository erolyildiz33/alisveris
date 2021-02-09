<!-- build:js /assets/js/core.min.js -->
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery/dist/jquery.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-ui/jquery-ui.min.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/jquery-slimscroll/jquery.slimscroll.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/PACE/pace.min.js?v=<?php echo PROJE_VERSION; ?>"></script>
<!-- endbuild -->

<!-- build:js <?php echo base_url("assets"); ?>/assets/js/app.min.js -->
<!--<script src="--><?php //echo base_url("assets"); ?><!--/assets/js/library.js?v=<?php echo PROJE_VERSION; ?>"></script>-->

<?php $this->load->view("backend/includes/library"); ?>
<script src="<?php echo base_url("assets"); ?>/assets/js/plugins.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/assets/js/app.js?v=<?php echo PROJE_VERSION; ?>"></script>
<!-- endbuild -->
<script src="<?php echo base_url("assets"); ?>/libs/bower/moment/moment.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/libs/bower/fullcalendar/dist/fullcalendar.min.js?v=<?php echo PROJE_VERSION; ?>"></script>
<script src="<?php echo base_url("assets"); ?>/assets/js/fullcalendar.js?v=<?php echo PROJE_VERSION; ?>"></script>

<script src="<?php echo base_url("assets"); ?>/assets/js/sweetalert2.all.js?v=<?php echo PROJE_VERSION; ?>"></script>

<script src="<?php echo base_url("assets"); ?>/assets/js/iziToast.min.js?v=<?php echo PROJE_VERSION; ?>"></script>

<?php $this->load->view("backend/includes/alert"); ?>

<script type="text/javascript">
    $(document).ready(function () {
        var segment_2 = '<?php echo $this->uri->segment(2); ?>';
        var segment_1 = '<?php echo $this->uri->segment(1); ?>';

        if (segment_1 === 'admin' || !segment_1) {

            $('.dashboard').addClass('active');
        } else if (segment_2 === 'settings') {
            $('.settings').addClass('active');
        } else if (segment_2 === 'emailsettings') {
            $('.emailsettings').addClass('active');
        } else if (segment_2 === 'galleries') {
            $('.galleries').addClass('active');
        } else if (segment_2 === 'slides') {
            $('.slides').addClass('active');
        } else if (segment_2 === 'product') {
            $('.product').addClass('active');
        } else if (segment_2 === 'services') {
            $('.services').addClass('active');
        } else if (segment_2 === 'portfolio') {

            $('.portfoliohome').addClass('active');
            $('.portfoliohome').addClass('open');
            $('.portfolio').addClass('active');
        } else if (segment_2 === 'portfolio_categories') {

            $('.portfoliohome').addClass('active');
            $('.portfoliohome').addClass('open');
            $('.portfolio_categories').addClass('active');
        } else if (segment_2 === 'news') {
            $('.news').addClass('active');
        } else if (segment_2 === 'courses') {
            $('.courses').addClass('active');
        } else if (segment_2 === 'references') {
            $('.references').addClass('active');
        } else if (segment_2 === 'brands') {
            $('.brands').addClass('active');
        } else if (segment_2 === 'user_roles') {
            $('.user_roles').addClass('active');
        } else if (segment_2 === 'users') {
            $('.users').addClass('active');
        } else if (segment_2 === 'members') {
            $('.members').addClass('active');
        } else if (segment_2 === 'testimonials') {
            $('.testimonials').addClass('active');
        } else if (segment_2 === 'popups') {
            $('.popups').addClass('active');
        }
        


    });
</script>

