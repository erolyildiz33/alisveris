<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Kategori Listesi
            <a href="<?php echo base_url("backend/product_categories/new_form"); ?>"
             class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
         </h4>
     </div><!-- END column -->
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
                            <th class="w50">Sıra</th>
                            <th>Başlık</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody>

                            <?php $i=1; foreach ($items as $item) { ?>

                                <tr>
                                    <td class="w50 text-center"><?php echo $i++ ?></td>
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
                                    <td class="text-center w300" >
                                        <?php if (get_sub_category_title($item->id)) { ?>
                                           <button data-altid="<?=$item->id?>"

                                               class="btn btn-sm btn-warning btn-outline add-btn altgetir" data-analiste="evet">
                                               <i class="fa fa-add"></i> Alt Menü İşlemleri
                                           </button>
                                       <?php } ?>
                                       <button style="float:right" 
                                       data-url="<?php echo base_url("backend/product_categories/delete/$item->id"); ?>"
                                       class="btn btn-sm btn-danger btn-outline remove-btn" data-analiste="evet">
                                       <i class="fa fa-trash"></i> Sil
                                   </button>
                                   <a href="<?php echo base_url("backend/product_categories/update_form/$item->id"); ?>" style="float:right" 
                                     class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                 </td>
                             </tr>

                         <?php } ?>

                     </tbody>

                 </table>

             <?php } ?>

         </div><!-- .widget -->
     </div><!-- END column -->
 </div>

 <div data-role="collapsible-set" data-content-theme="d" id="alticerik">
 </div>


 <div class="collapse altmenu">
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
                <?php echo "<b>$altitem->title</b>";?> Alt Kategori Listesi                   
            </h4>
        </div>
        <div class="col-md-12">
            <div class="widget p-lg">

                <?php if (empty($altitems)) { ?>

                    <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                            href="<?php echo base_url("backend/product_categories/new_sub_form/$item->id"); ?>">tıklayınız</a></p>
                        </div>

                    <?php } else { ?>

                        <table class="table table-hover table-striped table-bordered content-container">
                            <thead>
                                <th class="w50">Sıra</th>
                                <th>Başlık</th>
                                <th>Durumu</th>
                                <th>İşlem</th>
                            </thead>
                            <tbody>

                                <?php $i=1; foreach ($altitems as $altitem) { ?>

                                    <tr>
                                        <td class="w50 text-center">#<?php echo $altitem->id; ?></td>
                                        <td><?php echo $altitem->title; ?></td>
                                        <td class="text-center w100">
                                            <input
                                            data-url="<?php echo base_url("backend/product_categories/isActiveSetter/$altitem->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#10c469"
                                            <?php echo ($altitem->isActive) ? "checked" : ""; ?>
                                            />
                                        </td>
                                        <td class="text-center w300">
                                           <a data-altid=""
                                           href="#altmenu<?=$altitem->id?>" data-toggle="collapse"
                                           class="btn btn-sm btn-warning btn-outline add-btn" data-analiste="evet">
                                           <i class="fa fa-add"></i> Alt Menü İşlemleri
                                       </a>
                                       <button
                                       data-url="<?php echo base_url("backend/product_categories/delete/$altitem->id"); ?>"
                                       class="btn btn-sm btn-danger btn-outline remove-btn" data-analiste="evet">
                                       <i class="fa fa-trash"></i> Sil
                                   </button>
                                   <a href="<?php echo base_url("backend/product_categories/update_form/$altitem->id"); ?>"
                                     class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                 </td>
                             </tr>

                         <?php } ?>

                     </tbody>

                 </table>

             <?php } ?>

         </div><!-- .widget -->
     </div><!-- END column -->
 </div>
</div>

