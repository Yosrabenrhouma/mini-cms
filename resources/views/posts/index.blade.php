<x-layout>
    <x-slot:title>{{ $heading }} - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold">{{ $heading }}</h1>

    <ul class="mt-6 space-y-4">
        @forelse ($posts as $slug => $post)
            <li class="rounded border border-gray-200 bg-white p-4">
                <p class="text-xl font-medium">{{ $post['title'] }}</p>
                <p class="mt-1 text-sm text-gray-500">Publié en {{ $post['year'] }}</p>
            </li>
        @empty
            <p class="text-gray-500">Aucun article disponible.</p>
        @endforelse
    </ul>
</x-layout>