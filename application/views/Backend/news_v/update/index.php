<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("backend/includes/head"); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <?php $this->load->view("backend/includes/navbar"); ?>
    <!--========== END app navbar -->

    <!-- APP ASIDE ==========-->
    <?php $this->load->view("backend/includes/aside"); ?>
    <!--========== END app aside -->

    <!-- navbar search -->
    <?php $this->load->view("backend/includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <!-- APP FOOTER -->
        <?php $this->load->view("backend/includes/footer"); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php $this->load->view("backend/includes/include_script"); ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script"); ?>

</body>
</html>