<div>
    <div class="container">
        <!-- Items per page selection -->
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="perPage">Items per page:</label>
                <select wire:model="perPage" id="perPage" class="form-control">
                    @foreach($options as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mt-3">
                <label for="sort">Sort By Name:</label>
                <select wire:model="sort" id="sort" class="form-control">
                    @foreach($sortOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-4 mt-3">
                <label for="search">Search:</label>
                <input type="text" wire:model="search" id="search" placeholder="Search items" class="form-control">
            </div>
        </div>

        <!-- Items list -->
        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead class="bg-primary">
                    <tr class="text-white">
                        <th scope="col">Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="pagination justify-content-center mb-5">
            {{ $items->links() }} 
        </div>
    </div>
</div>