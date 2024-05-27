<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Weights extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $keyword = '';
    public function render()
    {
        if($this->keyword != null) {
            $data = User::where('w1', '!=', 0)
                    ->where('name', 'like', '%' . $this->keyword . '%')
                    ->paginate(5);
        } else {
            $data = User::where('w1', '!=', 0)->paginate(5);
        }

        return view('livewire.weights', ['dataBobot' => $data]);
    }
}
