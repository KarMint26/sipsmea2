<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PklPlace as ModelsPKLPlace;
use Livewire\WithPagination;

class PKLPlace extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = '';
    public $location = '';
    public $telephone = '';
    public $open_time = '';
    public $link_gmaps = '';
    public $image_url = '';

    public $pkl_place_id = '';

    public $keyword = '';

    public function store()
    {
        $rules = [
            "title" => "required|min:5",
            "location" => "required|min:5",
            "telephone" => "required|min:8",
            "open_time" => "required|min:4",
            "link_gmaps" => "required|min:5",
            "image_url" => "required|min:5",
        ];
        $validated = $this->validate($rules, [
            "title.required" => "Nama tempat wajib diisi",
            "location.required" => "Lokasi wajib diisi",
            "telephone.required" => "Telepon wajib diisi",
            "open_time.required" => "Jam buka wajib diisi",
            "link_gmaps.required" => "Link gmaps wajib diisi",
            "image_url.required" => "Link gambar wajib diisi",

            "title.min" => "Minimal 5 karakter",
            "location.min" => "Minimal 5 karakter",
            "telephone.min" => "Minimal 8 karakter",
            "open_time.min" => "Minimal 4 karakter",
            "link_gmaps.min" => "Minimal 5 karakter",
            "image_url.min" => "Minimal 5 karakter",
        ]);
        ModelsPKLPlace::create($validated);

        $this->dispatch('store');
        $this->clear();
    }

    public function edit($id)
    {
        $pkl_place_edit_detail = ModelsPKLPlace::find($id);

        $this->title = $pkl_place_edit_detail->title;
        $this->location = $pkl_place_edit_detail->location;
        $this->telephone = $pkl_place_edit_detail->telephone;
        $this->open_time = $pkl_place_edit_detail->open_time;
        $this->link_gmaps = $pkl_place_edit_detail->link_gmaps;
        $this->image_url = $pkl_place_edit_detail->image_url;

        $this->pkl_place_id = $id;
    }

    public function update()
    {
        $rules = [
            "title" => "required|min:5",
            "location" => "required|min:5",
            "telephone" => "required|min:8",
            "open_time" => "required|min:4",
            "link_gmaps" => "required|min:5",
            "image_url" => "required|min:5",
        ];
        $validated = $this->validate($rules, [
            "title.required" => "Nama tempat wajib diisi",
            "location.required" => "Lokasi wajib diisi",
            "telephone.required" => "Telepon wajib diisi",
            "open_time.required" => "Jam buka wajib diisi",
            "link_gmaps.required" => "Link gmaps wajib diisi",
            "image_url.required" => "Link gambar wajib diisi",

            "title.min" => "Minimal 5 karakter",
            "location.min" => "Minimal 5 karakter",
            "telephone.min" => "Minimal 8 karakter",
            "open_time.min" => "Minimal 4 karakter",
            "link_gmaps.min" => "Minimal 5 karakter",
            "image_url.min" => "Minimal 5 karakter",
        ]);
        $pkl_places = ModelsPKLPlace::all();
        $pkl_place_edit = $pkl_places[$this->pkl_place_id - 1];
        $pkl_place_edit_detail = ModelsPKLPlace::find($pkl_place_edit->id);
        $pkl_place_edit_detail->update($validated);

        $this->dispatch('update');
        $this->clear();
    }

    public function switch_status($id, $status)
    {
        $current_status = $status == 'aktif' ? 'nonaktif' : 'aktif';
        $pkl_place_detail = ModelsPKLPlace::find($id);
        $pkl_place_detail->update(['status' => $current_status]);
    }

    public function clear()
    {
        $this->title = '';
        $this->location = '';
        $this->telephone = '';
        $this->open_time = '';
        $this->link_gmaps = '';
        $this->image_url = '';
    }

    public function render()
    {
        if($this->keyword != null) {
            $data = ModelsPKLPlace::where('title', 'like', '%' . $this->keyword . '%')
                ->orWhere('location', 'like', '%' . $this->keyword . '%')
                ->orWhere('telephone', 'like', '%' . $this->keyword . '%')
                ->orWhere('open_time', 'like', '%' . $this->keyword . '%')->paginate(5);
        } else {
            $data = ModelsPKLPlace::paginate(5);
        }

        return view('livewire.p-k-l-place', ['dataPlaces' => $data]);
    }
}
