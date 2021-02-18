<?php

class product_categories extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "backend/product_categories_v";

        $this->load->model("backend/product_category_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->product_category_model->get_all(
            array("ustmenu"=>0), "rank ASC"
        );
        $altitems = $this->product_category_model->get_all(
            array("ustmenu !="=>0), "rank ASC"
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->altitems = $altitems;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function findKategori(){

       $result = $this->product_category_model->get_like(array("title"=>$this->input->post("title")));
       if($result)
        echo json_encode($result);
   }
   public function getAltKategori($ustmenuid=null){
    $result=$this->product_category_model->get_all(
        array("ustmenu"=>$ustmenuid), "rank ASC"
    );
    if($result)
        echo json_encode($result);

}
public function tumkategori($ustmenu = 0) {


    $data = $this->product_category_model->get_categories($ustmenu);

    echo json_encode($data);
}



public function new_form(){

    $viewData = new stdClass();

    /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
    $viewData->viewFolder = $this->viewFolder;
    $viewData->subViewFolder = "add";

    $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

}

public function new_sub_form($id){

    $viewData = new stdClass();
    $item = $this->product_category_model->get(
        array(
            "id"    => $id,
        )
    );
    /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
    $viewData->viewFolder = $this->viewFolder;
    $viewData->subViewFolder = "sub_add";
    $viewData->item = $item;
    $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

}

public function save(){

    $this->load->library("form_validation");

        // Kurallar yazilir..

    $this->form_validation->set_rules("title", "Başlık", "required|trim");

    $this->form_validation->set_message(
        array(
            "required"  => "<b>{field}</b> alanı doldurulmalıdır"
        )
    );

        // Form Validation Calistirilir..
    $validate = $this->form_validation->run();

    if($validate){
        $rank=$this->db->select("rank")->from("product_categories")->where("ustmenu",0)->limit(1)->order_by("rank","desc")->get()->row();

            // Upload Süreci...
        $insert = $this->product_category_model->add(
            array(
                "title"         => $this->input->post("title"),
                "isActive"      => 1,
                "createdAt"     => date("Y-m-d H:i:s"),
                "rank"          =>$rank->rank+1,
            )
        );

            // TODO Alert sistemi eklenecek...
        if($insert){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde eklendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

            // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("backend/product_categories"));

    } else {

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->form_error = true;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}



public function save_sub(){
    if (!strlen(trim($this->input->post('title')))>0){
       $alert = array(
        "title" => "İşlem Başarısız",
        "text" => "<b> Başlık </b> alanı doldurulmalıdır",
        "type"  => "error"
    );
       $this->session->set_flashdata("alert", $alert);

       redirect(base_url("backend/product_categories"));


   }
   else{

     $rank=$this->db->select("rank")->from("product_categories")->where("ustmenu",$this->input->post("anamenu"))->limit(1)->order_by("rank","desc")->get()->row();




     $insert = $this->product_category_model->add(
        array(
            "title"         => $this->input->post("title"),
            "isActive"      => 1,
            "createdAt"     => date("Y-m-d H:i:s"),
            "ustmenu" =>$this->input->post("anamenu"),
            "rank"          =>(($rank)?$rank->rank+1:0),
        )
    );

            // TODO Alert sistemi eklenecek...
     if($insert){

        $alert = array(
            "title" => "İşlem Başarılı",
            "text" => "Kayıt başarılı bir şekilde eklendi",
            "type"  => "success"
        );

    } else {

        $alert = array(
            "title" => "İşlem Başarısız",
            "text" => "Kayıt Ekleme sırasında bir problem oluştu",
            "type"  => "error"
        );
    }

            // İşlemin Sonucunu Session'a yazma işlemi...
    $this->session->set_flashdata("alert", $alert);

    redirect(base_url("backend/product_categories"));


}
}

public function update_form($id){

    $viewData = new stdClass();

    /** Tablodan Verilerin Getirilmesi.. */
    $item = $this->product_category_model->get(
        array(
            "id"    => $id,
        )
    );

    /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
    $viewData->viewFolder = $this->viewFolder;
    $viewData->subViewFolder = "update";
    $viewData->item = $item;

    $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


}

public function rankSetter(){


    $data = $this->input->post("data");

    parse_str($data, $order);

    $items = $order["ord"];

    foreach ($items as $rank => $id){

        $this->product_category_model->update(
            array(
                "id"        => $id,
                "rank !="   => $rank
            ),
            array(
                "rank"      => $rank
            )
        );

    }

}
public function update($id){

    $this->load->library("form_validation");

        // Kurallar yazilir..

    $this->form_validation->set_rules("title", "Başlık", "required|trim");

    $this->form_validation->set_message(
        array(
            "required"  => "<b>{field}</b> alanı doldurulmalıdır"
        )
    );

        // Form Validation Calistirilir..
    $validate = $this->form_validation->run();

    if($validate){

        $update = $this->product_category_model->update(
            array(
                "id" => $id
            ),
            array(
                "title" => $this->input->post("title"),
            )
        );

            // TODO Alert sistemi eklenecek...
        if($update){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde güncellendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

            // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("backend/product_categories"));

    } else {

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->form_error = true;

        /** Tablodan Verilerin Getirilmesi.. */
        $viewData->item = $this->product_category_model->get(
            array(
                "id"    => $id,
            )
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}

public function delete($id){

    $delete = $this->product_category_model->delete(
        array(
            "id"    => $id
        )
    );

        // TODO Alert Sistemi Eklenecek...
    if($delete){

        $alert = array(
            "title" => "İşlem Başarılı",
            "text" => "Kayıt başarılı bir şekilde silindi",
            "type"  => "success"
        );

    } else {

        $alert = array(
            "title" => "İşlem Başarılı",
            "text" => "Kayıt silme sırasında bir problem oluştu",
            "type"  => "error"
        );


    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("backend/product_categories"));


}

public function isActiveSetter($id){

    if($id){

        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        $this->product_category_model->update(
            array(
                "id"    => $id
            ),
            array(
                "isActive"  => $isActive
            )
        );
    }
}

}
