<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $transaction_id, $reference_no, $price, $quantity, $payment_amount, $product_id;
    public $search = null;
    protected $queryString = ['search' => ['except' => '']];
    public $updateMode = false;
    public $paginate = 5;

    public function render()
    {
        return view('livewire.transaction-component', [
            'transactions' => $this->search ? Transaction::latest()->where('reference_no', 'like', '%' . $this->search . '%')->orWhere('price', 'like', '%' . $this->search . '%')->orWhere('quantity', 'like', '%' . $this->search . '%')->orWhere('payment_amount', 'like', '%' . $this->search . '%')->with('product')->latest()->paginate($this->paginate) : Transaction::with('product')->latest()->paginate($this->paginate),
            'products' => Product::all()
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

    public function delete($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if ($transaction) {
            $this->transaction_id = $id;
        }
    }
    public function destroy()
    {
        if ($this->transaction_id) {
            Transaction::where('id', $this->transaction_id)->delete();
            session()->flash('success', 'Data transaksi berhasil dihapus');
            $this->closeModal();
        }
    }
    public function resetInputFields()
    {
        $this->reference_no = null;
        $this->price = null;
        $this->quantity = null;
        $this->payment_amount = null;
        $this->product_id = null;
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
