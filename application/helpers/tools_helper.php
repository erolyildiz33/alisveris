<?php
define('PROJE_VERSION', '1.0.0.0.11');

function get_product_cover_image($product_id){

    $t = &get_instance();

    $t->load->model("frontend/product_image_model");

    $cover_image = $t->product_image_model->get(
        array(
            "isCover"       => 1,
            "product_id"    => $product_id
        )
    );

    if(empty($cover_image)){

        $cover_image = $t->product_image_model->get(
            array(
                "product_id"    => $product_id
            )
        );

    }

    return !empty($cover_image) ? $cover_image->img_url : "";

}


function get_readable_date($date){

    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}

function get_portfolio_category_title($id){

    $t = &get_instance();

    $t->load->model("frontend/portfolio_category_model");

    $portfolio = $t->portfolio_category_model->get(
        array(
            "id"    => $id

        )
    );

    return (empty($portfolio)) ? false : $portfolio->title;


}

function get_portfolio_cover_image($id){

    $t = &get_instance();

    $t->load->model("frontend/portfolio_image_model");

    $cover_image = $t->portfolio_image_model->get(
        array(
            "isCover"       => 1,
            "portfolio_id"    => $id
        )
    );

    if(empty($cover_image)){

        $cover_image = $t->portfolio_image_model->get(
            array(
                "portfolio_id"    => $id
            )
        );

    }

    return !empty($cover_image) ? $cover_image->img_url : "";

}

function send_email($toEmail = "", $subject = "", $message = ""){

    $t = &get_instance();

    $t->load->model("frontend/emailsettings_model");

    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive"  => 1
        )
    );

    if(empty($toEmail))
        $toEmail = $email_settings->to;

    $config = array(

        "protocol"   => $email_settings->protocol,
        "smtp_host"  => $email_settings->host,
        "smtp_port"  => $email_settings->port,
        "smtp_user"  => $email_settings->user,
        "smtp_pass"  => $email_settings->password,
        "starttls"   => true,
        "charset"    => "utf-8",
        "mailtype"   => "html",
        "wordwrap"   => true,
        "newline"    => "\r\n"
    );

    $t->load->library("email", $config);

    $t->email->from($email_settings->from, $email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $t->email->send();

}

function get_picture($path = "", $picture = "", $resolution = "50x50"){


    if($picture != ""){

        if(file_exists(FCPATH . "uploads/$path/$resolution/$picture")){
            $picture = (base_url()."uploads/$path/$resolution/$picture");
        } else {
            $picture = (base_url()."assets/images/default_image_$resolution.png");

        }

    } else {


        //construction-service-1.jpg
        $picture = (base_url()."assets/images/default_image_$resolution.png");

    }

    return $picture;

}

function get_gallery_cover_image($folderName){

    $path = "uploads/galleries_v/images/$folderName/350x216";

    if($handle = opendir($path)){
        while(($file = readdir($handle)) !== false){

            if($file != "." & $file != ".."){
                return $file;
            }

        }


    }


}

function get_popup_service($page = ""){

    $t = &get_instance();

    $t->load->model("frontend/popup_model");
    $popup = $t->popup_model->get(
        array(
            "isActive"  => 1,
            "page"      => $page
        )
    );

    return (!empty($popup)) ? $popup : false;

}

function get_gallery_by_url($url = ""){

    $t = &get_instance();
    $t->load->model("frontend/gallery_model");

    $gallery = $t->gallery_model->get(
        array(
            "isActive"  => 1,
            "url"       => $url
        )
    );

    return ($gallery) ? $gallery : false;

}


function convertToSEO($text)
{

    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));

}

function get_active_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user)
        return $user;
    else
        return false;

}

function isAdmin(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    return true;

    if($user->user_role == "admin")
        return true;
    else
        return false;
}

function get_user_roles(){

    $t = &get_instance();
    return $t->session->userdata("user_roles");
}

function setUserRoles(){

    $t = &get_instance();

    $t->load->model("backend/user_role_model");

    $user_roles = $t->user_role_model->get_all(
        array(
            "isActive"  => 1
        )
    );

    $roles = [];
    foreach ($user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("user_roles", $roles);

}

function getControllerList(){

    $t = &get_instance();

    $controllers = array();
    $t->load->helper("file");

    $files = get_dir_file_info(APPPATH. "controllers/backend", FALSE);

    foreach (array_keys($files) as $file){
        if($file !== "index.html"){
            $controllers[] = strtolower(str_replace(".php", '', $file));
        }
    }

    return $controllers;

}

function get_settings(){

    $t = &get_instance();

    $t->load->model("frontend/settings_model");

    if($t->session->userdata("settings")){
        $settings = $t->session->userdata("settings");
    } else {

        $settings = $t->settings_model->get();

        if(!$settings) {

            $settings = new stdClass();
            $settings->company_name = "kablosuzkedi";
            $settings->logo         = "default";
            
        }

        $t->session->set_userdata("settings", $settings);

    }

    return $settings;

}
function get_sub_category_title($category_id = 0){

    $t = &get_instance();

    $t->load->model("backend/product_category_model");

    $category = $t->product_category_model->get(
        array(
            "ustmenu"    => $category_id
        )
    );


    return $category;

}

function get_category_title($category_id = 0){

    $t = &get_instance();

    $t->load->model("frontend/portfolio_category_model");

    $category = $t->portfolio_category_model->get(
        array(
            "id"    => $category_id
        )
    );

    if($category)
        return $category->title;
    else
        return "<b style='color:red'>Tanımlı Değil</b>";

}
function upload_picture($file, $uploadPath, $width, $height, $name){

    $t = &get_instance();
    $t->load->library("simpleimagelib");


    if(!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }

    $upload_error = false;
    try {

        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
        ->fromFile($file)
        ->thumbnail($width,$height,'center')
        ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);

    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }

    if($upload_error){
        echo $error;
    } else {
        return true;
    }


}

function get_page_list($page=null){

    $page_list = array(
        "home_v"                => "Anasayfa",
        "about_v"               => "Hakkımızda Sayfası",
        "news_list_v"           => "Haberler Sayfası",
        "galleries"             => "Galeri Sayfası",
        "portfolio_list_v"      => "Portfolyo Sayfası",
        "reference_list_v"      => "Referanslar Sayfası",
        "service_list_v"        => "Hizmetler Sayfası",
        "course_list_v"         => "Eğitimler Sayfası",
        "brand_list_v"          => "Markalar Sayfası",
        "contact_v"             => "İletişim Sayfası",

    );


    return (empty($page)) ? $page_list : $page_list[$page];
}