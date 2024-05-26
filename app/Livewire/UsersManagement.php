<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class UsersManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $nisn = '';
    public $email = '';
    public $user_id = '';
    public $keyword = '';
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $filter = 'all';

    public function generateRandomPassword()
    {
        $randomPassword = Str::random(10) . mt_rand(100, 999) . Str::random(3) . mt_rand(100, 999);
        return $randomPassword;
    }

    public function store()
    {
        $rules = [
            "name" => "required",
            "nisn" => "required|numeric",
            "email" => "required|email",
        ];
        $validated = $this->validate($rules, [
            "name.required" => "Nama siswa wajib diisi",
            "nisn.required" => "NISN Wajib diisi",
            "nisn.numeric" => "NISN Wajib dalam bentuk angka",
            "email.required" => "Email Wajib diisi",
            "email.email" => "Email Tidak Valid",
        ]);

        $password = $this->generateRandomPassword();

        $validated['password'] = Hash::make($password);
        $validated['pwd_nohash'] = $password;
        $validated['email_verified_at'] = now();

        User::create($validated);

        $this->dispatch('store');
        $this->clear();
    }

    public function update()
    {
        $rules = [
            "name" => "required",
            "nisn" => "required|numeric",
            "email" => "required|email",
        ];
        $validated = $this->validate($rules, [
            "name.required" => "Nama siswa wajib diisi",
            "nisn.required" => "NISN Wajib diisi",
            "nisn.numeric" => "NISN Wajib dalam bentuk angka",
            "email.required" => "Email Wajib diisi",
            "email.email" => "Email Tidak Valid",
        ]);
        $detailUser = User::find($this->user_id);
        $detailUser->update($validated);

        $this->dispatch('update');
        $this->clear();
    }

    public function edit($id)
    {
        $detailUser = User::find($id);

        $this->name = $detailUser->name;
        $this->nisn = $detailUser->nisn;
        $this->email = $detailUser->email;

        $this->user_id = $id;
    }

    public function switch_status($id, $status)
    {
        $current_status = $status == 'aktif' ? 'nonaktif' : 'aktif';
        $userDetail = User::find($id);
        $userDetail->update(['status' => $current_status]);

        $this->dispatch('ss');
        $this->clear();
    }

    public function clear()
    {
        $this->name = '';
        $this->nisn = '';
        $this->email = '';
    }

    public function sort($columnName)
    {
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        if($this->keyword != null) {
            $data = User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->keyword . '%')
                      ->orWhere('username', 'like', '%' . $this->keyword . '%');
            })
            ->where(function ($query) {
                if($this->filter != 'all') {
                    $query->where('status', 'like', $this->filter . '%');
                }
            })
            ->where('id', '<>', 1)
            ->paginate(10);
        } else {
            if($this->filter != null && $this->filter != '') {
                if($this->filter != 'all') {
                    $data = User::where('id', '>', 1)->where('status', 'like', $this->filter . '%')
                            ->orderBy($this->sortColumn, $this->sortDirection)
                            ->paginate(10);
                } else {
                    $data = User::where('id', '>', 1)->orderBy($this->sortColumn, $this->sortDirection)->paginate(10);
                }
            } else {
                $data = User::where('id', '>', 1)->orderBy($this->sortColumn, $this->sortDirection)->paginate(10);
            }
        }

        return view('livewire.users-management', ['dataSiswa' => $data]);
    }
}
