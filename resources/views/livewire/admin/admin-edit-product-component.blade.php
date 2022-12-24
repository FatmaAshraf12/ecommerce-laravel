<div>


    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Product
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.products') }}" class="btn btn-primary">All Products</a>
                    </div>
                    <div class="col-12">
                        @if (Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif
                        <form wire:submit.prevent="update">
                            <div class="row">

                                <div class="mb-3 mt-3 col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3 col-md-6">
                                    <label for="name">Slug</label>
                                    <input type="text" name="slug" wire:model="slug">
                                    @error('slug')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 mt-3 col-md-3">
                                    <label for="regular_price">Regular Price</label>
                                    <input type="text" name="regular_price" wire:model="regular_price">
                                    @error('regular_price')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3 col-md-3">
                                    <label for="sale_price">Sale Price</label>
                                    <input type="text" name="sale_price" wire:model="sale_price">
                                </div>
                                <div class="mb-3 mt-3 col-md-3">
                                    <label for="stock_status">Stock Status</label>
                                    <select name="stock_status" class="form-control" id="stock_status"
                                        wire:model="stock_status">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3 col-md-3">
                                    <label for="featured">Featured</label>
                                    <select name="featured" class="form-control" id="featured" wire:model="featured">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('featured')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="short_description">Short Description</label>
                                <input type="text" name="short_description" wire:model="short_description">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="description">Description</label>
                                <input type="text" name="description" wire:model="description">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="quantity">Quanitity</label>
                                <input type="text" name="quantity" wire:model="quantity">
                                @error('quantity')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="sku">SKU</label>
                                <input type="text" name="sku" wire:model="sku">
                                @error('sku')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" wire:model="newImage">
                                @if ($newImage)
                                    <img src="{{ $newImage->temporaryUrl() }}" width="120" />
                                @else
                                    <img src="{{ asset('assets/imgs/shop') }}/{{ $image }}" width="120" />
                                @endif
                            </div>

                            <div class="mb-3 mt-3 col-md-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" id="category_id"
                                    wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
