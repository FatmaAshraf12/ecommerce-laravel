<div>

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <a href="{{ route('admin.product.add') }}" class="btn btn-primary"
                            livewire:click.prevent="renderAdd">Add Product</a>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Categroy</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($products->currentPage() - 1) * $products->perPage();
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img src="{{ asset('assets/imgs/shop/') }}/{{ $product->image }}"
                                                    alt="{{ $product->name }}" />

                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->stock_status }}</td>
                                            <td>{{ $product->regular_price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->created_at }}</td>

                                            <td><a style="color:red; margin-right:10px"
                                                    wire:click.prevent="delete('{{ $product->id }}')">delete</a>
                                                <a style="color:rgb(0, 255, 68); margin-right:10px"
                                                    href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}">Edit</a>
                                                {{-- <a
                                                    href="{{ route('admin.product.edit', ['proudtc_id' => $product->id]) }}">edit</a> --}}
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
