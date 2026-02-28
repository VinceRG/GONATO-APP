<div class="table-responsive mt-4">
    <h1>Products List</h1>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<h1>Tasks</h1>
<ul>
    @foreach($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
</ul>

<p>Global Variable: {{ $SharedVariable }}</p>
<p>Product Key: {{ $productKey }}</p>