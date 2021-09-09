<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Search extends Component
{

    public String $query = ""; // par défaut la variable est vide
    public $jobs = [];
    public Int $selectedIndex = 0;

    public function updatedQuery() { // on utilise un hook updated (on suit la convention)

        $words = '%' .$this->query. '%';

        if (strlen($this->query) > 2) { // on fait la recherche que si la chaine de caractere est plus grande que 2 lettres
            $this->jobs = Job::where('title', 'like', $words) // On fait la recherche dans le titre 
            ->orWhere('description', 'like', $words) // mais aussi dans la description
            ->get();
        }

        // dd($this->jobs);
    }

    public function incrementIndex() {
        // dd('fleche du bas préssé');
        if ($this->selectedIndex == count($this->jobs) - 1 ) {
            $this->selectedIndex = 0;
            return;
        }
        $this->selectedIndex++;
    }

    public function decrementIndex() {
        // dd('fleche du bas préssé');
        if ($this->selectedIndex === 0 ) {
            $this->selectedIndex = (count($this->jobs) - 1);
            return;
        }
        $this->selectedIndex--;
    }

    public function render()
    {
        return view('livewire.search'); // php artisan make:livewire search .. on a crée une class qui étend de componant et qui rend une vue
        // on retrouve la vue dans views -> livewire -> search.blade.php voila !!
    }
}
