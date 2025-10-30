<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Statistik
        $totalProducts = Product::count();
        $totalQuantity = Product::sum('qty');
        $totalValue = Product::selectRaw('SUM(harga * qty) as total')->value('total') ?? 0;

        // Produk dengan search
        $recentProducts = Product::when($this->search, function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('code', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate(10);

        return view('livewire.dashboard', compact(
            'totalProducts',
            'totalQuantity',
            'totalValue',
            'recentProducts'
        ));
    }
}