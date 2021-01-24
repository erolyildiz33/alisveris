<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <a href="<?php echo base_url("backend/product/new_form"); ?>"
               class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                                href="<?php echo base_url("backend/product/new_form"); ?>">tıklayınız</a></p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">Sıra</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Açıklama</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("backend/product/rankSetter"); ?>">

                    <?php $i = 1;
                    foreach ($items as $item) { ?>

                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="order"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center sirano"><?php echo $i++; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td><?php echo character_limiter(strip_tags($item->description), 200); ?></td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("backend/product/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                />
                            </td>
                            <td class="text-center w300">
                                <button
                                        data-url="<?php echo base_url("backend/product/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn"  data-analiste="evet">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <a href="<?php echo base_url("backend/product/update_form/$item->id"); ?>"
                                   class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                <a href="<?php echo base_url("backend/product/image_form/$item->id"); ?>"
                                   class="btn btn-sm btn-dark btn-outline"><i class="fa fa-image"></i> Resimler</a>
                            </td>
                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>