<?php

// OrderTable.php
namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 25;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 25],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = Order::search($this->search)
            ->paginate($this->perPage);

        return view('livewire.order-table', [
            'orders' => $orders,
        ]);
    }
}

