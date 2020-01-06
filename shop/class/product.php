<?php
class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $toppings;

    public function __construct($name, $price, $toppings) {
        $this->name = $name;
        $this->price = $price;
        $this->toppings = $toppings;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of toppings
     */ 
    public function getToppings()
    {
        return $this->toppings;
    }
}