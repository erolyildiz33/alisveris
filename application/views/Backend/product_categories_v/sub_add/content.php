<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
          <?php echo "<b>$item->title</b>";?> Menüsüne Alt Kategorisi Ekle
      </h4>
  </div><!-- END column -->
  <div class="col-md-12">
    <div class="widget">
        <div class="widget-body">
            <form action="<?php echo base_url("backend/product_categories/save_sub"); ?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="anamenu" value="<?=$item->id;?>">
                <div class="form-group">
                    <label>Başlık</label>
                    <input class="form-control" placeholder="Başlık" name="title">
                    <?php if(isset($form_error)){ ?>
                        <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                <a href="<?php echo base_url("backend/product_categories"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            </form>
        </div><!-- .widget-body -->
    </div><!-- .widget -->
</div><!-- END column -->
</div>