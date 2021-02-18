<?php

class Product_category_model extends CI_Model
{

    public $tableName = "Product_categories";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }
     public function get_like($like=array())
    {
        return $this->db->like($like)->get($this->tableName)->result();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

    public function selectBoxKategori($id = 0, $x = 0) {
        $query = $this->db->where("ustmenu", $id)->get($this->tableName)->result();
        if ($query) {
            foreach ($query as $row) {
                    //Buradaki $x değişkeni str_repeat fonksiyonu ile döngü her çalıştığında hiyerarşik bir düzen oluşturur. $x değişkeni her foreach döngüsünde (+2) artar ve ve arttığı kadar
                    //boşluk bırakır.

                echo "<option value=".$row->id.">".str_repeat("-", $x).$row->title."</option>";

                    //Eğer ki $query değişkeni bir sonuç dönderirse foreach içerisinde tekrar tekrar aynı fonksiyonu çalıştırıp alt kategorilerinin olup olmadığına bakarız.
                    //Alt kategori olmadığı durumda if sorgusu çalışmayacağı için döngü sonlanmış olur.
                $this->selectBoxKategori($row->id, $x + 2);
            }
        }
    }

    public function altKategoriBul($id = 0, $str = 0, $ust_id) {
        $query = $this->db->where("ustmenu", $id)->get($this->tableName)->result();
        if ($query) {
            foreach ($query as $row) {
                echo "<option ";
                    //Eğer Kategori id sine sahip bir üst kategori id varsa <option> etiketini seçili hale getiriyoruz
                echo ($row->id == $ust_id) ? "selected" : null;
                echo " value=".$row->id.">".str_repeat("-", $str).$row->title."</option>";
                $this->altKategoriBul($row->id, $str + 2, $ust_id);
            }
        }
    }

    public function KategoriListesi($id = 0) {
        $query = $this->db->where("ustmenu", $id)->get($this->tableName)->result();
        if ($query) {
            echo "<ul class=\"treeview\">";
            foreach ($query as $row) {
                echo '<li>'.$row->title;
                echo '
                <span class="ml-1 mr-1"></span>
                <a class="text-success" href="'.base_url("kategori/kategoriduzenle/$row->id").'" data-toggle="tooltip" data-placement="top" title="Düzelt"><i class="fa fa-edit"></i></a>
                <a class="text-danger delete" href="javascript:void(0);" data-link="'.base_url("kategori/sil/$row->id").'" data-title="'.$row->title.'" data-toggle="tooltip" data-placement="top" title="Sil"><i class="fa fa-trash"></i></a>
                ';
                $this->KategoriListesi($row->id);
            }
            echo "</li></ul>";
        }
    }
     public function get_categories($ustmenuid=0){

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('ustmenu',$ustmenuid);

        $parent = $this->db->get();
        
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;
    }

    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('ustmenu', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;       
    }

}
