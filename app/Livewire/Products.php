<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Product;
use Illuminate\Validation\Rule;

#[Layout('layouts.app')] // TAMBAHKAN INI

class Products extends Component
{
    use WithPagination;

    public $productId = null;
    public $name = '';
    public $code = '';
    public $harga = '';
    public $qty = '';
    public $search = '';

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'code' => 'required|alpha_dash|min:3|max:50|unique:products,code',
        'harga' => 'required|numeric|min:0',
        'qty' => 'required|integer|min:0',
    ];

    public function save()
    {
        $this->validate();
        
        Product::create([
            'name' => $this->name,
            'code' => strtoupper($this->code),
            'harga' => $this->harga,
            'qty' => $this->qty,
        ]);
        
        $this->resetForm();
        session()->flash('message', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->code = $product->code;
        $this->harga = $product->harga;
        $this->qty = $product->qty;
        
        // Update rules untuk edit
        $this->rules['code'] = 'required|alpha_dash|min:3|max:50|unique:products,code,' . $this->productId;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                Rule::unique('products', 'code')->ignore($this->productId),
            ],
            'harga' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
        ]);

        $product = Product::find($this->productId);

        $product->update([
            'name' => $this->name,
            'code' => strtoupper($this->code),
            'harga' => $this->harga,
            'qty' => $this->qty,
        ]);

        $this->resetForm();
        session()->flash('message', 'Produk berhasil diupdate!');
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus!');

    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['productId', 'name', 'code', 'harga', 'qty', 'search']);
        $this->resetErrorBag();
        // Reset rules ke default
        $this->rules['code'] = 'required|alpha_dash|min:3|max:50|unique:products,code';
    }

    public function render()
    {
        $products = Product::when($this->search, function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('code', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);

        return view('livewire.products', compact('products'));
    }
}