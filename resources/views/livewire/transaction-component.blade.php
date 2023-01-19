<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transactions List</h5>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addProduct" wire:click="resetInputFields()">
                                    Add Transaction
                                </button>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Cari" class="form-control" wire:model="search">
                            </div>
                        </div>
                        <!-- Bordered Table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Reference No</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Payment Amount</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($transactions->total())
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th scope="row">
                                                {{ ($transactions->currentpage() - 1) * $transactions->perpage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $transaction->reference_no }}</td>
                                            <td>{{ $transaction->price }}</td>
                                            <td>{{ $transaction->quantity }}</td>
                                            <td>{{ $transaction->payment_amount }}</td>
                                            <td>{{ $transaction->product->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteProduct"
                                                    wire:click="delete({{ $transaction->id }})">
                                                    delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if (!$transactions->total())
                            <div class="text-center mt-2">Data Product tidak ditemukan</div>
                        @endif
                        <div class="mt-2 pagination-table pagination-sm d-flex justify-content-center">
                            {{ $transactions->onEachSide(0)->links() }}
                        </div>
                        <!-- End Bordered Table -->

                        {{-- Modal Create --}}
                        <div wire:ignore.self class="modal fade" id="addProduct" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Transaction</h5>
                                        <button type="button" wire:click.prevent="cancel()" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="name" class="form-label">Select Product</label>
                                                    <select wire:model="product_id" class="form-select"
                                                        aria-label="Default select example">
                                                        @if ($products)
                                                            <option selected>-- Choose --</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" wire:model="quantity"
                                                        id="quantity" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" wire:click.prevent="cancel()"
                                                class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" wire:click.prevent="store()" data-bs-dismiss="modal"
                                                class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Create End --}}

                        {{-- Modal Delete --}}
                        <div wire:ignore.self class="modal fade" id="deleteProduct" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Transaction</h5>
                                        <button type="button" wire:click.prevent="cancel()" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" wire:click.prevent="destroy()" data-bs-dismiss="modal"
                                            class="btn btn-danger">Yes, delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Delete End --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
