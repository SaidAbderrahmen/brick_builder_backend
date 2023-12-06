<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recepie;
use Illuminate\View\View;
use App\Models\Ingredient;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecepieIngredientsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Recepie $recepie;
    public Ingredient $ingredient;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Ingredient';

    protected $rules = [
        'ingredient.name' => ['required', 'max:255', 'string'],
        'ingredient.unit' => ['required', 'max:255', 'string'],
        'ingredient.quantity' => ['required', 'numeric'],
    ];

    public function mount(Recepie $recepie): void
    {
        $this->recepie = $recepie;
        $this->resetIngredientData();
    }

    public function resetIngredientData(): void
    {
        $this->ingredient = new Ingredient();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newIngredient(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.recepie_ingredients.new_title');
        $this->resetIngredientData();

        $this->showModal();
    }

    public function editIngredient(Ingredient $ingredient): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.recepie_ingredients.edit_title');
        $this->ingredient = $ingredient;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->ingredient->recepie_id) {
            $this->authorize('create', Ingredient::class);

            $this->ingredient->recepie_id = $this->recepie->id;
        } else {
            $this->authorize('update', $this->ingredient);
        }

        $this->ingredient->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Ingredient::class);

        Ingredient::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetIngredientData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->recepie->ingredients as $ingredient) {
            array_push($this->selected, $ingredient->id);
        }
    }

    public function render(): View
    {
        return view('livewire.recepie-ingredients-detail', [
            'ingredients' => $this->recepie->ingredients()->paginate(20),
        ]);
    }
}
