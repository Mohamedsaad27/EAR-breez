<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $search = '';

    public function render()
    {
        return view('livewire.product-table',[
            'products'=> Product::search($this->search)->paginate($this->perPage)
        ]);
    }
}
