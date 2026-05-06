<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StockProduct extends Component
{
   
    /**
     * Create a new component instance.
     */
    public $kategoriProduk;
    public function __construct($kategoriProduk)
    {
        $this->kategoriProduk = $kategoriProduk;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stock-product');
    }
}
