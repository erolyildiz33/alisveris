<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["login"]           = "backend/userop/login";
$route["admin"]           = "backend/dashboard";

$route["logout"]          = "backend/userop/logout";
$route["sifremi-unuttum"] = "backend/userop/forget_password";
$route["reset-password"]  = "backend/userop/reset_password";



$route["urun-listesi"] = "home/product_list";
$route["urun-detay/(:any)"] = "home/product_detail/$1";

$route["portfolyo-listesi"]      = "home/portfolio_list";
$route["portfolyo-detay/(:any)"] = "home/portfolio_detail/$1";

$route["egitim-listesi"] = "home/course_list";
$route["egitim-detay/(:any)"] = "home/course_detail/$1";

$route["referanslar"]   = "home/reference_list";
$route["markalar"]      = "home/brand_list";
$route["hizmetlerimiz"] = "home/service_list";
$route["hakkimizda"]    = "home/about_us";

$route["iletisim"]        = "home/contact";
$route["mesaj-gonder"]    = "home/send_contact_message";
$route["abone-ol"]        = "home/make_me_member";

$route["haberler"]        = "home/news_list";
$route["haber/(:any)"]    = "home/news/$1";

$route["bir-daha-gosterme"]  = "home/popup_never_show_again";

$route["fotograf-galerisi"]        = "home/image_gallery_list";
$route["fotograf-galerisi/(:any)"] = "home/image_gallery/$1";

$route["video-galerisi"]        = "home/video_gallery_list";
$route["video-galerisi/(:any)"] = "home/video_gallery/$1";

$route["dosya-galerisi"]        = "home/file_gallery_list";
$route["dosya-galerisi/(:any)"] = "home/file_gallery/$1";

