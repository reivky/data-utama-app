<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        // dd($this->product_id);
        if ($this->product_id && $this->quantity) {
            $product = Product::where('id', $this->product_id)->first();
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://sandbox.saebo.id/api/v1/transactions', [
                'headers' => [
                    'X-API-KEY' => 'DATAUTAMA',
                ],
                'form_params' => [
                    'quantity' => $this->quantity,
                    'price' => $product->price,
                    'payment_amount' => $this->quantity * $product->price,
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents());
            $this->reference_no = $response_data->data->reference_no;
            Transaction::create([
                'reference_no' => $this->reference_no,
                'price' => $product->price,
                'quantity' => $this->quantity,
                'payment_amount' => $this->quantity * $product->price,
                'product_id' => $product->id,
            ]);
            $this->resetInputFields();
            $this->emit('userStore'); // Close model to using to jquery
        }
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
