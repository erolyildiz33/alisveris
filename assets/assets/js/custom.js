$(document).ready(function () {
    var csrf_value = $("#csrf_test_name").data("csrf");
 var csrf_test_name='csrf_test_name';
    $(".sortable").sortable();

    $(".content-container, .image_list_container").on('click', '.remove-btn', function () {
        var $ana = $(this).data("analiste");
        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: "Hayır"
        }).then(function (result) {
            if (result.value) {
                if ($ana) {
                    window.location.href = $data_url;
                } else {
                    $.post($data_url, {
                        csrf_test_name: csrf_value,
                    }, function (response) {

                        $(".image_list_container").html(response);

                        $('[data-switchery]').each(function () {
                            var $this = $(this),
                                color = $this.attr('data-color') || '#188ae2',
                                jackColor = $this.attr('data-jackColor') || '#ffffff',
                                size = $this.attr('data-size') || 'default'

                            new Switchery(this, {
                                color: color,
                                size: size,
                                jackColor: jackColor
                            });
                        });
                        uploadSection.removeAllFiles();

                        $(".sortable").sortable();
                        iziToast.success({
                            title: 'Resim Silme',
                            message: 'Başarılı',
                            position: 'topRight',

                        });

                    });
                }

            }
        });

    })

    $(".content-container, .image_list_container").on('change', '.isActive', function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");


        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, {
                data: $data, csrf_test_name: csrf_value

            }, function (response) {
                iziToast.success({
                    title: 'Durum Değiştirme',
                    message: 'Başarılı',
                    position: 'topRight',

                });
            });

        }

    })

    $(".image_list_container").on('change', '.isCover', function () {

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, {data: $data, csrf_test_name: csrf_value}, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();
                iziToast.success({
                    title: 'Kapak Durumu Değiştirme',
                    message: 'Başarılı',
                    position: 'topRight',

                });
            });

        }

    })

    $(".content-container, .image_list_container").on("sortupdate", '.sortable', function (event, ui) {

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");


        $.post($data_url, {data: $data, csrf_test_name: csrf_value}, function (response) {

            $('.sortable .sirano').each(function (i) {
                var humanNum = i + 1;
                $(this).html(humanNum + '');
            });
            iziToast.success({
                title: 'Sıralama Değiştirme',
                message: 'Başarılı',
                position: 'topRight',

            });


        })

    })


    $(".button_usage_btn").change(function () {

        $(".button-information-container").slideToggle();

    })

    Dropzone.autoDiscover = false;
    var uploadSection = Dropzone.forElement("#dropzone");
    uploadSection.on("sending", function (file, xhr, formData) {


        formData.append(csrf_test_name, csrf_value);

    });
    uploadSection.on("complete", function (file) {

        var $data_url = $("#dropzone").data("url");


        $.post($data_url, {
            csrf_test_name: csrf_value,
        }, function (response) {

            $(".image_list_container").html(response);

            $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });
            uploadSection.removeAllFiles();

            $(".sortable").sortable();
            iziToast.success({
                title: 'Resim Ekleme',
                message: 'Başarılı',
                position: 'topRight',

            });

        });

    })

})