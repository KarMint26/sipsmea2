<?php

namespace App\Livewire;

use App\Models\Alternatif;
use App\Models\User;
use Livewire\Component;

class Alternatifs extends Component
{
    public $userId;

    public function mount()
    {
        // Ambil ID pengguna terkecil yang tersedia
        $this->userId = User::where('w1', '!=', 0)->orderBy('id')->value('id');
    }

    public function render()
    {
        $data = [];
        if($this->userId) {
            $data = Alternatif::where('jarak', '!=', 0)->where('user_id', $this->userId)->get();
        }

        $user = User::where('w1', '!=', 0)->get();

        return view('livewire.alternatifs', ['dataAlternatif' => $data, 'user' => $user]);
    }
}
