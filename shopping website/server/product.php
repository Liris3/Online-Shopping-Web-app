<?php
/**
 * A class to create product objects, implementing the JsonSerializable 
 * 
 */
class Product implements JsonSerializable
{   
    private $id;
    private $item_name;
    private $quantity;
    private $price;
    private $img;
  

    function __construct($id,$item_name, $quantity,$price,$img)
    {   
         $this->id = $id;
        $this->item_name = $item_name;
        $this->quantity = $quantity;
         $this->price = $price;
         $this->img = $img;
       
    }

    /**
     * Returns a string representation of the product object as a list item
     */
    function toListItem()
    {
        return "<li>$this->item $this->quantity</li>";
    }

    /**
     * Called by json_encode  
     */
    public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}
