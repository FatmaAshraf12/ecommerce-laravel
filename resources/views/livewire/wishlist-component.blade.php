<div>

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Wishlist
                    <span></span> Your Wishlist
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (Cart::instance('wishlist')->count() > 0)
                            <div class="table-responsive">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Session::has('success_message'))
                                            <div class="alert alert-success">
                                                <strong>Success | {{ Session::get('success_message') }}</strong>
                                            </div>
                                        @endif
                                        @foreach (Cart::instance('wishlist')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('assets/imgs/shop/') }}/{{ $item->model->image }}-1.jpg"
                                                        alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                                            {{ $item->model->name }}</a></h5>
                                                    <p class="font-xs">{{ $item->model->short_description }}
                                                    </p>
                                                </td>
                                                <td class="price" data-title="Price">
                                                    <span>{{ $item->model->regular_price }}</span>
                                                </td>

                                                <td class="action" data-title="Remove"><a href="#"
                                                        class="text-muted"
                                                        wire:click.prevent="destroy('{{ $item->rowId }}')"><i
                                                            class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <a href="#" wire:click.prevent="clearAll()">Clear all</a>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No items in Wishlist</p>
                        @endif


                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
