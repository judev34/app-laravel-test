<div class="inline-block relative" x-data="{ open: true }">
    {{-- Ici on a créé l'input de recherche qu'on va incorporer dans la navbar --}}
    <input @click.outside="open = false; @this.resetIndex()" @click.inside="open = true" class="bg-grey-200 text-gray-700 border-2 focus:outline-none placeholder-grey-500 px-2 py-1 rounded-full mr-3 w-56" placeholder="Rechercher une mission" wire:model="query"
    wire:keydown.arrow-down.prevent="incrementIndex"
    wire:keydown.arrow-up.prevent="decrementIndex"
    wire:keydown.backspace="resetIndex"
    wire:keydown.enter.prevent="showJob"
    > 
    {{-- le wire:model va nous servir à lier un variable public de notre classe Search à une variable qu'on va récuperer depuis l'input (ce que l'user saisi)  --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-grey-500 absolute top-0 right-0 mr-5 mt-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
    </svg>

    @if (strlen($query) > 2) 
    <div class="absolute border rounded bg-gray-100 text-md w-56 mt-1" 
        x-show="open">
    {{-- si la longueur de la recherche est superieur à 2 on entre dans la condition --}}
        @if (count($jobs) > 0)
        {{-- si il y a des jobs alors on boucle pour les afficher --}}
            @foreach ($jobs as $index => $job)
                <p class="p-2 {{ $index === $selectedIndex ? 'text-green-500' : ''}}">{{ $job->title }}</p>
            @endforeach
        @else
            <span class="text-red-500 p-1">Pas de résultat pour "{{ $query }}"  </span>
        @endif
    </div>
    @endif
</div>
