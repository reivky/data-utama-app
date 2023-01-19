<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product_id, $name, $price, $stock, $description;
    public $search = null;
    protected $queryString = ['search' => ['except' => '']];
    public $updateMode = false;
    public $paginate = 5;

    public function render()
    {
        return view('livewire.product-component', [
            // 'products' => Product::latest()->paginate($this->paginate),
            'products' => $this->search ? Product::latest()->where('name', 'like', '%' . $this->search . '%')->orWhere('price', 'like', '%' . $this->search . '%')->orWhere('stock', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate) : Product::latest()->paginate($this->paginate),
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ];
        $validatedDate = $this->validate($rules);
        Product::create($validatedDate);
        session()->flash('success', 'Pengajar baru berhasil ditambahkan');
        $this->resetInputFields();
        $this->emit('userStore'); // Close model to using to jquery
    }
    public function edit($id)
    {
        $updateMode = true;
        $data = Product::where('id', $id)->first();
        if ($data) {
            $this->product_id = $id;
            $this->name = $data->name;
            $this->price = $data->price;
            $this->stock = $data->stock;
            $this->description = $data->description;
        }
    }
    public function update()
    {
        if ($this->product_id) {
            $product = Product::find($this->product_id);
            if ($product) {
                if ($product->name == $this->name && $product->price == $this->price && $product->stock == $this->stock && $product->description == $this->description) {
                    $this->closeModal();
                    return false;
                }
                $validatedDate = $this->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'stock' => 'required',
                    'description' => 'required',
                ]);
                $product->update($validatedDate);
                session()->flash('success', 'Data product berhasil diubah');
                $this->closeModal();
            }
        }
    }
    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            $this->product_id = $id;
        }
    }
    public function destroy()
    {
        if ($this->product_id) {
            Product::where('id', $this->product_id)->delete();
            session()->flash('success', 'Data product berhasil dihapus');
            $this->closeModal();
        }
    }
    public function resetInputFields()
    {
        $this->name = null;
        $this->price = null;
        $this->stock = null;
        $this->description = null;
    }
    public function cancel()
    {
        $this->resetErrorBag();
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function closeModal()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->emit('userStore');
    }
}
