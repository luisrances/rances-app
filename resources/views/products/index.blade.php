{{-- <!DOCTYPE html>
<html>
<body>
    <p>Products:</p>
    <table>
        <thead>
            <tr>
                @foreach (['Id', 'Name', 'Category'] as $column)
                    <td>{{ $column }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Tasks:</p>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>

    <p>Global Variable:</p>
    <p>{{ $sharedVariable }}</p>

    <p>Product Key: {{ $productKey }}</p>
</body>
</html> --}}

<x-layout>
    <x-slot:heading>
        Product List
    </x-slot>
    <x-table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product['id']}}</th>
                    <td>{{ $product['name']}}</td>
                    <td>{{ $product['category']}}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
