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
        $storeId = $_GET['store'];
        $list = $this->productDB->getIndex($storeId);
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

        $product = new Product($name, $price, $toppings);
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
        // var_dump($showStore);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $toppings = $_POST["toppings"];
            $editProduct = new Product($name, $price, $toppings);

            $this->productDB->getEditProduct($editProduct, $productId);
            header('Location: index.php');
        }
        include "view/product/edit.php";
    }

    public function deleteProduct()
    {
        $productId = $_GET['id'];
        $this->productDB->getDeleteProduct($productId);
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

}