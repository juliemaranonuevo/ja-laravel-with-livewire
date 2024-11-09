<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $options = [20, 50, 100, 250];
    protected $queryString = ['perPage'];

    public $search = '';
    public $sort = 'asc';
    public $sortOptions = ['asc', 'desc'];
    protected $paginationTheme = 'bootstrap';

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = item::query();
        if ($this->search !== '') {
            $this->updatingPerPage();
            $query->where('name', 'like', "%{$this->search}%");
        }

        $items = $query->orderBy('name', $this->sort);
        $items = $items->paginate($this->perPage);

        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
