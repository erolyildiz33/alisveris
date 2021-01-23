<script>

    var LIBS = {
        // Chart libraries
        plot: [
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.pie.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.stack.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.resize.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.curvedLines.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.tooltip.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/flot/jquery.flot.categories.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        chart: [
            '<?php echo base_url("assets");?>/libs/misc/echarts/build/dist/echarts-all.js',
            '<?php echo base_url("assets");?>/libs/misc/echarts/build/dist/theme.js',
            '<?php echo base_url("assets");?>/libs/misc/echarts/build/dist/jquery.echarts.js'
        ],
        circleProgress: [
            "<?php echo base_url("assets");?>/libs/bower/jquery-circle-progress/dist/circle-progress.js?v=<?php echo PROJE_VERSION;?>"
        ],
        sparkline: [
            "<?php echo base_url("assets");?>/libs/misc/jquery.sparkline.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        maxlength: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-maxlength/src/bootstrap-maxlength.js?v=<?php echo PROJE_VERSION;?>"
        ],
        tagsinput: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js?v=<?php echo PROJE_VERSION;?>",
        ],
        TouchSpin: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        selectpicker: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-select/dist/css/bootstrap-select.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-select/dist/js/bootstrap-select.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        filestyle: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-filestyle/src/bootstrap-filestyle.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        timepicker: [
            "<?php echo base_url("assets");?>/libs/bower/bootstrap-timepicker/js/bootstrap-timepicker.js?v=<?php echo PROJE_VERSION;?>"
        ],
        datetimepicker: [
            "<?php echo base_url("assets");?>/libs/bower/moment/moment.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        select2: [
            "<?php echo base_url("assets");?>/libs/bower/select2/dist/css/select2.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/select2/dist/js/select2.full.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        vectorMap: [
            "<?php echo base_url("assets");?>/libs/misc/jvectormap/jquery-jvectormap.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/jvectormap/jquery-jvectormap.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/jvectormap/maps/jquery-jvectormap-us-mill.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/jvectormap/maps/jquery-jvectormap-world-mill.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/jvectormap/maps/jquery-jvectormap-africa-mill.js?v=<?php echo PROJE_VERSION;?>"
        ],
        summernote: [
            "<?php echo base_url("assets");?>/libs/bower/summernote/dist/summernote.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/summernote/dist/summernote.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        DataTable: [
            "<?php echo base_url("assets");?>/libs/misc/datatables/datatables.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/misc/datatables/datatables.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        fullCalendar: [
            "<?php echo base_url("assets");?>/libs/bower/moment/moment.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/fullcalendar/dist/fullcalendar.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/fullcalendar/dist/fullcalendar.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        dropzone: [
            "<?php echo base_url("assets");?>/libs/bower/dropzone/dist/min/dropzone.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/dropzone/dist/min/dropzone.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        counterUp: [
            "<?php echo base_url("assets");?>/libs/bower/waypoints/lib/jquery.waypoints.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/counterup/jquery.counterup.min.js?v=<?php echo PROJE_VERSION;?>"
        ],
        others: [
            "<?php echo base_url("assets");?>/libs/bower/switchery/dist/switchery.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/switchery/dist/switchery.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/lightbox2/dist/css/lightbox.min.css?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets");?>/libs/bower/lightbox2/dist/js/lightbox.min.js?v=<?php echo PROJE_VERSION;?>",
            "<?php echo base_url("assets"); ?>/assets/js/custom.js?v=<?php echo PROJE_VERSION;?>"
        ]
    };

</script>
