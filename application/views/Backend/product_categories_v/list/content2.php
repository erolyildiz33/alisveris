 <?php $this->load->view("backend/includes/bootstrap"); ?>
 <div class="row">
    <div class="col-md-4">
        <?php echo isset($mesaj) ? $mesaj : null; ?>
        <form action="<?php echo base_url("kategori/ekle") ?>" method="post">
            <div class="form-group">
                <label for="exampleInput1">Kategori Adı</label>
                <input type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Kategori Adını Yazın" name="kategori_adi">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect">Kategori Listesi</label>
                <select class="selectpicker" data-live-search="true" data-width="100%" data-style="btn-danger" name="kategori_ustid">
                    <option value="0">Ana Kategori</option>
                    <?php $this->product_category_model->selectBoxKategori(); ?>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Kategorileri Listelemek</div>
            <div class="card-body bg-light">
               <table   id="roottable"></table> 
    
           </div>
       </div>
   </div>
</div>

