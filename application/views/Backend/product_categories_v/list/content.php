<div class="row">

  <a data-altid="0"
    data-url='<?php echo base_url("backend/product_categories/save"); ?>'
    class="btn btn-outline btn-primary btn-xs pull-right yeniekle" data-analiste="evet">
    <i class="fa fa-plus"></i>  Yeni Ekle
  </a>


   <div class="col-md-8">
    <div class="row">

      <div class="col-md-8">
        <h4 class="m-b-lg">
          Ürün Kategori Listesi

        </h4>

      </div>

    

      <div class="col-md-12">
        <div class="widget p-lg">

          <?php if (empty($items)) { ?>

            <div class="alert alert-info text-center">
              <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                href="<?php echo base_url("backend/product_categories/new_form"); ?>">tıklayınız</a></p>
              </div>

            <?php } else { ?>

              <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                 <th class="order"><i class="fa fa-reorder"></i></th>
                 <th class="w50">Sıra</th>
                 <th>Üst Kategori</th>
                 <th>Başlık</th>
                 <th>Durumu</th>
                 <th>Alt Kategori</th>
                 <th>İşlem</th>
               </thead>
               <tbody class="sortable" data-sirano="0" data-url="<?php echo base_url("backend/product_categories/rankSetter"); ?>">

                <?php $i=1; foreach ($items as $item) { ?>

                 <tr id="ord-<?php echo $item->id; ?>">
                  <td class="order"><i class="fa fa-reorder"></i></td>
                  <td class="w50 text-center sirano"><?php echo $i++; ?></td>
                  <th>Ana Kategori</th>
                  <td><?php echo $item->title; ?></td>
                  <td class="text-center w100">
                    <input
                    data-url="<?php echo base_url("backend/product_categories/isActiveSetter/$item->id"); ?>"
                    class="isActive"
                    type="checkbox"
                    data-switchery
                    data-color="#10c469"
                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                    />
                  </td>
                  <td class="w400 text-center">
                    <div class="text-center" style="margin-left: 30px;">
                      <a data-altid="<?=$item->id?>" 
                        data-title="<?=$item->title?>"
                        data-url='<?php echo base_url("backend/product_categories/save_sub"); ?>'
                        style="float: left;"
                        class="btn btn-sm btn-success btn-outline add-btn altekle" data-analiste="evet">
                        <i class="fa fa-plus"></i> Alt Kategori Ekle
                      </a>
                      <?php if (get_sub_category_title($item->id)) { ?>
                        <button data-altid="<?=$item->id?>" data-getustid="0" style="margin-left: 10px;float: left;"
                         data-title="<?=$item->title?>"
                         data-geturl='<?php echo base_url("backend/product_categories/"); ?>'
                         class="btn btn-sm btn-warning btn-outline add-btn altgetir" data-analiste="evet">
                         <i class="fa fa-cog"></i> Alt Kategori İşlemleri
                       </button>
                     <?php } ?>
                   </div>
                 </td>
                 <td class="text-center w300" >

                   <button 
                   data-url="<?php echo base_url("backend/product_categories/delete/$item->id"); ?>"
                   class="btn btn-sm btn-danger btn-outline remove-btn" style="margin-left: 30px;" data-analiste="evet">
                   <i class="fa fa-trash"></i> Sil 
                 </button>
                 <button data-altid="<?=$item->id?>"
                   data-title="<?=$item->title?>"
                   data-url='<?php echo base_url("backend/product_categories/update/").$item->id; ?>'
                   class="btn btn-sm btn-info btn-outline altguncelle" data-analiste="evet">
                   <i class="fa fa-pencil-square-o"></i> Düzenle
                 </button>





               </td>
             </tr>

           <?php } ?>

         </tbody>

       </table>

     <?php } ?>

   </div><!-- .widget -->
 </div><!-- END column -->
</div>

<div id="altliste" status="false">

</div>
</div>
<div class="col-md-4">
  <div id="altekle" status="false">

  </div>
</div>
</div>