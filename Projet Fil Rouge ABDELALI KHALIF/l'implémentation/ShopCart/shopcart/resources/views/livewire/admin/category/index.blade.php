<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure you want to delete this data?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>


        </div>
    </div>
</div>

<div class="row p-2 m-3 rounded shadow">
    <div class="col-md-12">
        <h4>Category
            <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end">Add Category</a>
        </h4>
    </div>

    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($categories as $cat)
                        <tr>
                            <th scope="row">{{ $cat->id }}</th>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/category/'.$cat->id.'/edit') }}" class="btn btn-success">Edit</a>
                                <a href="#" wire:click="deleteCategory({{$cat->id}})" data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $categories->links() }}</div>
        </div>
    </div>
</div>
