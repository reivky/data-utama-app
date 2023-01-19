<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products List</h5>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addProduct" wire:click="resetInputFields()">
                                    Add Product
                                </button>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Cari" class="form-control" wire:model="search">
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->total())
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">
                                                {{ ($products->currentpage() - 1) * $products->perpage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#editProduct"
                                                    wire:click="edit({{ $product->id }})">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteProduct"
                                                    wire:click="edit({{ $product->id }})">
                                                    delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if (!$products->total())
                            <div class="text-center mt-2">Data Product tidak ditemukan</div>
                        @endif
                        <div class="mt-2 pagination-table pagination-sm d-flex justify-content-center">
                            {{ $products->onEachSide(0)->links() }}
                        </div>
                        <!-- End Bordered Table -->

                        {{-- Modal Create --}}
                        <div wire:ignore.self class="modal fade" id="addProduct" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                                        <button type="button" wire:click.prevent="cancel()" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" wire:model="name"
                                                        id="name" autofocus required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="number" class="form-control" wire:model="price"
                                                        id="price" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="stock" class="form-label">Stock</label>
                                                    <input type="number" class="form-control" wire:model="stock"
                                                        id="stock" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" wire:model="description" id="description" rows="3" required></textarea>
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

                        {{-- Modal Edit --}}
                        <div wire:ignore.self class="modal fade" id="editProduct" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                        <button type="button" wire:click.prevent="cancel()" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" wire:model="name"
                                                        id="name" autofocus required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="number" class="form-control" wire:model="price"
                                                        id="price" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="stock" class="form-label">Stock</label>
                                                    <input type="number" class="form-control" wire:model="stock"
                                                        id="stock" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" wire:model="description" id="description" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" wire:click.prevent="cancel()"
                                                class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" wire:click.prevent="update()"
                                                data-bs-dismiss="modal" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Edit End --}}

                        {{-- Modal Delete --}}
                        <div wire:ignore.self class="modal fade" id="deleteProduct" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                                        <button type="button" wire:click.prevent="cancel()" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" wire:click.prevent="cancel()"
                                            class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
