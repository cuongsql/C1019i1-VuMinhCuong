<?php
class ProductDB
{
    protected $conn;
    
    public function __construct($connect) {
        $this->conn = $connect;
    }

    public function getIndex($id)
    {
        $sql = "SELECT * FROM products p
        INNER JOIN storeProducts s ON p.id = s.product_id
        WHERE s.shop_id = $id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];

        foreach($result as $item){
            $lists = new Product($item['name'],
                                 $item['price'],
                                 $item['toppings']
                                );
            array_push($arr, $lists);
            $lists->setId($item['product_id']);
        }
        return $arr;
    }

    public function getStore()
    {
        $sql = "SELECT * FROM stores";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item){
            $store = new Store($item['name']);
            array_unshift($arr, $store);
            $store->setId($item['id']);
        }
        return $arr;
    }

    public function getAddStore($store)
    {
        $sql = "INSERT INTO stores (id, name) 
                VALUE (null, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$store->getNameStore());
        
        $stmt->execute();
    }

    public function getEditStore($editStore, $storeId)
    {
        $name = $editStore->getNameStore();
        $sql = "UPDATE stores 
                SET `name` = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name, $storeId]);
        
    }

    public function getDeleteStore($id)
    {
        $sql = "DELETE FROM stores WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->fetchAll();
    }

    public function getAddProduct($product, $store_id)
    {
        $sql = "INSERT INTO products (id, `name`, price, toppings) 
                VALUE (null, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$product->getName());
        $stmt->bindParam(2,$product->getPrice());
        $stmt->bindParam(3,$product->getToppings());
        $stmt->execute();
        
        $product_id = $this->conn->lastInsertId();
        $this->chooseAddStore($store_id, $product_id);
    }

    public function getEditProduct($editProduct, $storeProduct, $editStore)
    {
        $name = $editProduct->getName();
        $price = $editProduct->getPrice();
        $toppings = $editProduct->getToppings();
        $product_id = $storeProduct->getProduct_id();

        $sql = "UPDATE products 
                SET `name` = ?, price = ?, toppings = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$name, $price, $toppings, $product_id]);

        $this->chooseEditStore($storeProduct, $editStore);
    }

    public function getDeleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $stmt->fetchAll();
    }

    public function chooseAddStore($store_id,$product_id)
    {
        $sql = "INSERT INTO storeProducts(id, shop_id, product_id) 
                VALUE (null, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$store_id);
        $stmt->bindParam(2,$product_id);
        $stmt->execute();
    }

    public function chooseEditStore($storeProduct, $editStore)
    {
        $storeProduct_id = $storeProduct->getId();
        $product_id = $storeProduct->getProduct_id();

        $sql = "UPDATE `storeProducts` 
                SET `shop_id` = ?, `product_id` = ? 
                WHERE `id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$editStore);
        $stmt->bindParam(2,$product_id);
        $stmt->bindParam(3,$storeProduct_id);
        $stmt->execute();
    }
    
    public function getValueStore($id)
    {
        $sql = "SELECT * FROM stores WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $store = new Store($result[0]['name']);
        $store->setId($result[0]['id']);
        return $store;
    }

    public function getValueProduct($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $product = new Product($result[0]['name'],$result[0]['price'],$result[0]['toppings']);
        return $product;
    }

    public function getValueStoreProduct($product_id)
    {
        $sql = "SELECT * FROM storeProducts WHERE product_id = $product_id";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $storeProduct = new StoreProduct($result[0]['shop_id'],$result[0]['product_id']);
        $storeProduct->setId($result[0]['id']);
        return $storeProduct;
    }

}
