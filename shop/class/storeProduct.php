<?php

class StoreProduct
{
    protected $id;
    protected $shop_id;
    protected $product_id;

    public function __construct($shop_id, $product_id) {
        $this->shop_id = $shop_id;
        $this->product_id = $product_id;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of shop_id
     */ 
    public function getShop_id()
    {
        return $this->shop_id;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }
}