<x-dashboard ::pageTitle="Boards">
    @foreach ($boards as $board)
        <x-board :board="$board"></x-board>
    @endforeach
</x-dashboard>


