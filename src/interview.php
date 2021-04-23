<?php

class ElectronicItems
{
    private $items = array();
    public function __construct(array $items)
    {
        $this->items = $items;
    }
    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function getSortedItems($type)
    {
        $sorted = array();
        //change to include $type variable
        if ($type == 'price')
        {
            //change in previous code so it can handle multiple items with same price
            usort($this->items, function ($a, $b) {return $a->getPrice() > $b->getPrice();});
        }
        elseif($type == 'alph')
        {
            //another $type of sorting, in this case alpabetical based on type of item
            usort($this->items, function ($a, $b) {return strcmp($a->getType(), $b->getType());});
        }
        else
        {
            //space for any other $type of sorting that we want
        }
        return $this->items;
    }
    /**
     *
     * @param string $type
     * @return array
     */
    public function getItemsByType($type)
    {
        //change in previous code to use a method so we can access private types array
        if (in_array($type, ElectronicItem::getPossibleTypes()))
        {
            $callback = function ($item) use ($type)
            {
                //change in how to acces private type property
                return $item->getType() == $type;
            };
            $items = array_filter($this->items, $callback);
            //adding return clause
            return $items;
        }
        return false;
    }
    //adding method to calculate the total price for the list of items
    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item)
        {
            $total += $item->price;
        }
        return $total;
    }
}


class ElectronicItem
{
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    private $type;
    public $wired;
    /**
     * @var array
     */
    public $extras = array();
    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';
    private static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER
    );
    const TYPES_EXTRAS = array( 
        'television' => NULL,
        'console' => 4,
        'microwave' => 0,
        'controller' => 0
    );
    function getPrice()
    {
        return $this->price;
    }
    function getType()
    {
        return $this->type;
    }
    function getWired()
    {
        return $this->wired;
    }
    function setPrice($price)
    {
        $this->price = $price;
    }
    function setType($type)
    {
        $this->type = $type;
    }
    function setWired($wired)
    {
        $this->wired = $wired;
    }
    //new method to access private values of types
    public static function getPossibleTypes()
    {
        return self::$types;
    }
    //new method to return the extras in one item
    function getExtras()
    {
        return $this->extras;
    }
    //new method to check if it's possible to add new extra to the item
    function maxExtras()
    {
        if (is_null(self::TYPES_EXTRAS[$this->getType()]) || self::TYPES_EXTRAS[$this->getType()] > count($this->getExtras())){
            return TRUE;
        } 
        return FALSE;
    }
    //new method to add and extra to the item
    function addExtra($extra)
    {
        if ($this->maxExtras())
            array_push($this->extras, $extra);
        else 
            echo "Max extras reached.\n";
    }
}
