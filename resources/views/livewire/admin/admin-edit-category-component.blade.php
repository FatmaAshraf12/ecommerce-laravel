<div>

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Category
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.categories') }}" class="btn btn-primary">All Categories</a>
                    </div>
                    <div class="col-12">
                        @if (Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif
                        <form wire:submit.prevent="update">
                            <div class="mb-3 mt-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" wire:model="name" wire:keyup="generateSlug" value=>
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name">Slug</label>
                                <input type="text" name="slug" wire:model="slug">
                                @error('slug')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
