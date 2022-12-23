<div>

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Categories
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.category.add') }}" class="btn btn-primary">Add Category</a>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($categories->currentPage() - 1) * $categories->perPage();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->created_at }}</td>

                                            <td><a style="color:red; margin-right:10px"
                                                    wire:click.prevent="delete('{{ $category->id }}')">delete</a>
                                                <a
                                                    href="{{ route('admin.category.edit', ['category_id' => $category->id]) }}">edit</a>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
