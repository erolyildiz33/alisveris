<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form data-csrf-value="<?= $this->security->get_csrf_hash(); ?>"
                      data-csrf="<?= $this->security->get_csrf_hash(); ?>"
                      data-url="<?php echo base_url("backend/galleries/refresh_file_list/$item->id/$item->gallery_type/$item->folder_name"); ?>"
                      action="<?php echo base_url("backend/galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>"
                      id="dropzone" class="dropzone" data-plugin="dropzone"
                      data-options="{ url: '<?php echo base_url("backend/galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>'}">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                           value="<?= $this->security->get_csrf_hash(); ?>"/>

                    <div class="dz-message">
                        <h3 class="m-h-lg">Yüklemek istediğiniz dosyaları buraya sürükleyiniz</h3>
                        <p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyiniz yada buraya
                            tıklayınız)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->title; ?></b> kaydına ait Dosyalar
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body image_list_container">

                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/file_list_v"); ?>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

