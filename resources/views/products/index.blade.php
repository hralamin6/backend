<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6 dark:text-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Product List</h2>

                    <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Product</a>

                    <table class="table-auto w-full border-collapse">
                        <thead>
                        <tr>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Stock</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border p-2">{{ $product->name }}</td>
                                <td class="border p-2">{{ $product->price }}</td>
                                <td class="border p-2">{{ $product->stock }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
