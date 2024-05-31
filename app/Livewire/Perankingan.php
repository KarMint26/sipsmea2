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

    public function mount()
    {
        $this->userId = User::where('w1', '!=', 0)->orderBy('id')->value('id');
    }

    public function render()
    {
        $dataSpk = [];
        // switch($this->spkMethod) {
        //     case 'SAW':
        //         $dataSpk = VSawHasil::where('user_id', $this->userId)->orderBy('hasil', 'desc')->get();
        //         break;
        //     case 'WP':
        //         $dataSpk = VWpHasil::where('id', $this->userId)->orderBy('hasil', 'desc')->get();
        //         break;
        //     case 'TOPSIS':
        //         $dataSpk = VTopsisHasil::where('user_id', $this->userId)->orderBy('hasil', 'desc')->get();
        //         break;
        // }

        $dataSpk = VTopsisHasil::where('user_id', $this->userId)->orderBy('hasil', 'desc')->get();

        $user = User::where('w1', '!=', 0)->get();

        return view('livewire.perankingan', ['dataSpk' => $dataSpk, 'user' => $user]);
    }
}
