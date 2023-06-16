<script src="https://cdn.tailwindcss.com"></script>
<x-filament::page>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <main class="bg-white px-4 pt-16 pb-24 sm:px-6 sm:pt-24 lg:px-8 lg:py-32">
        <div class="max-w-3xl mx-auto">
            <h1 class="font-bold mb-4 text-3xl">Nom: {{ $record->name }}</h1>
            <p class="mb-4 text-xl font-medium">Les produits: </p>
            <ul class="list-disc pl-6 text-lg">
                @foreach ($record->products() as $product)
                    <li>{{ $product->designation }}</li>
                @endforeach
            </ul>
        </div>
    </main>


</x-filament::page>
