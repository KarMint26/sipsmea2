<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\VSawHasil;
use App\Models\VTopsisHasil;
use App\Models\VWpHasil;
use Livewire\Component;

class Perankingan extends Component
{
    public $userId;
    public $spkMethod;

    public function mount()
    {
        $this->userId = User::where('w1', '!=', 0)->orderBy('id')->value('id');
        $this->spkMethod = 'SAW';
    }

    public function render()
    {
        $dataSpk = [];
        switch($this->spkMethod) {
            case 'SAW':
                $dataSpk = VSawHasil::where('user_id', $this->userId)->orderBy('hasil', 'desc')->get();
                break;
            case 'WP':
                $dataSpk = VWpHasil::where('id', $this->userId)->orderBy('hasil', 'desc')->get();
                break;
            case 'TOPSIS':
                $dataSpk = VTopsisHasil::where('user_id', $this->userId)->orderBy('hasil', 'desc')->get();
                break;
        }

        $user = User::where('w1', '!=', 0)->get();

        return view('livewire.perankingan', ['dataSpk' => $dataSpk, 'user' => $user]);
    }
}
