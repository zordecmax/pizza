<?php

namespace App\Models;

class Cart
{
    public array $items  = [];
    public int $totalQty = 0;
    public int $totalPrice = 0;

    public function __construct($oldCart = false)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }

    }

    public function add($item, $qty = 1)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if (!empty($this->items)) {
            if (array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }
        $storedItem['qty'] += $qty;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$item->id] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice += $item->price * $qty;
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function updateQty($id, $qty)
    {
        if (array_key_exists($id, $this->items)) {
            if ($qty < $this->items[$id]['qty']) {
                $this->items[$id]['qty'] -= $qty;
                $this->totalQty -= $qty;
                $this->totalPrice -= $this->items[$id]['item']['price'];
            } else {
                $this->totalQty -= $this->items[$id]['qty'];
                $this->items[$id]['qty'] = $qty;
                $this->totalQty += $qty;
                $this->totalPrice += $this->items[$id]['item']['price'];
//                $this->totalPrice =  ($this->totalPrice - $this->items[$id]['price']) + $this->items[$id]['item']['price'] * $qty;
            }
        }
    }
    public function minusQty($id, $qty)
    {
        if (array_key_exists($id, $this->items)) {
            if ($qty === 0) {
                $this->remove($id);
            } elseif ($qty >= $this->items[$id]['qty']) {
                $this->items[$id]['qty'] += $qty;
                $this->totalQty += $this->items[$id]['qty'];
                $this->totalPrice += $this->items[$id]['price'];
            } elseif ($qty < $this->items[$id]['qty']) {
                $this->items[$id]['qty'] -= $qty;
                $this->totalQty -= $this->items[$id]['qty'];
                $this->totalPrice -= $this->items[$id]['price'];
            }
        }
    }
}
