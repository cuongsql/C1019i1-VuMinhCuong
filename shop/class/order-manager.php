<?php


class OderManager
{
    protected $productDB;

    public function __construct() {
        $dbname = "mysql:host=localhost;dbname=shop_manager;charset=utf8";
        $username = "root";
        $password = "password";
        $db = new DBConnect($dbname, $username, $password);
        $this->productDB = new ProductDB($db->connect());
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $sortBy = $_POST["sortBy"];
        }
        $storeId = isset($_GET['store']) ? $_GET['store'] : 10 ;
        $list = $this->productDB->getIndex($storeId, $sortBy);
        $store = $this->productDB->getValueStore($storeId);
        include_once 'view/list.php';
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $toppings = $_POST["toppings"];
            $store_id = $_POST['store'];
            $img_sql = 'hollow.jpg';
            $avatar = $this->updateImg($_FILES['avatar'], $img_sql);

        $product = new Product($name, $price, $toppings, $avatar);
        $this->productDB->getAddProduct($product, $store_id);
        header('Location: index.php');
            }
        $showStore = $this->productDB->getStore();
        include_once 'view/product/add.php';
    }

    public function editProduct()
    {
        $productId = $_GET['id'];
        $product = $this->productDB->getValueProduct($productId);
        $showStore = $this->productDB->getStore();
        $storeProduct = $this->productDB->getValueStoreProduct($productId);
        $img_sql = $product->getAvatar();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $toppings = $_POST["toppings"];
            $avatar = $this->updateImg($_FILES['avatar'], $img_sql);

            $editStore = $_POST['editStore'];
            $editProduct = new Product($name, $price, $toppings, $avatar);

            $this->productDB->getEditProduct($editProduct, $storeProduct, $editStore);
            header('Location: index.php');
        }
        include "view/product/edit.php";
    }

    public function deleteProduct()
    {
        $productId = $_GET['id'];
        $product = $this->productDB->getValueProduct($productId);
        $this->productDB->getDeleteProduct($productId);
        $this->deleteAvatar($product->getAvatar());
        header('Location: index.php');
    }

    public function addStore()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nameStore = $_POST["nameStore"];
            $store = new Store($nameStore);
        $this->productDB->getAddStore($store);
        header('Location: index.php');
        }
        include_once 'view/store/add.php';
    }
    
    public function editStore()
    {
        $storeId = $_GET['id'];
        $store = $this->productDB->getValueStore($storeId);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nameStore = $_POST["nameStore"];
            $editStore = new Store($nameStore);

            $this->productDB->getEditStore($editStore, $storeId);
            header('Location: index.php');
        }
        include "view/store/edit.php";
    }

    public function deleteStore()
    {
        $storeId = $_GET['id'];
        $this->productDB->getDeleteStore($storeId);
        header('Location: index.php');
    }

    public function showStore()
    {
        $store = $this->productDB->getStore();
        include_once 'view/store/show.php';
    }
    public function deleteAvatar($linkAvatar)
    {
        unlink('view/images/'.$linkAvatar);
    }

    public function updateImg($file_img, $img_sql)
    {
        if(isset($file_img)){

            $avatar = date("h-i-s-").$file_img['name'];
            $img_tmp = $file_img['tmp_name'];
            $img_ext = strtolower(end(explode('.',$file_img['name'])));
            $extensions = array("jpeg","jpg","png");

            if(in_array($img_ext, $extensions) == false){
                    $avatar = $img_sql;
            }else{
                if(!empty($img_sql)){
                    $this->deleteAvatar($img_sql);
                }
                move_uploaded_file($img_tmp,"view/images/".$avatar);
            }
        }
        return $avatar;
    }

}