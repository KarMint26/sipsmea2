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
    public $rating = 0;
    public $daya_tampung = 0;
    public $akses_jalan = 0;
    public $pkl_place_id = '';
    public $keyword = '';
    public $sortColumn = 'title';
    public $sortDirection = 'asc';

    public function sort($columnName)
    {
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function store()
    {
        $rules = [
            "title" => "required|min:5",
            "location" => "required|min:5",
            "telephone" => "required|min:8",
            "open_time" => "required|min:4",
            "rating" => "required",
            "daya_tampung" => "required|numeric",
            "akses_jalan" => "required|numeric",
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
            "rating.required" => "Rating wajib diisi",
            "daya_tampung.required" => "Daya tampung wajib diisi",
            "akses_jalan.required" => "Akses jalan wajib diisi",

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
        $this->rating = $pkl_place_edit_detail->rating;
        $this->daya_tampung = $pkl_place_edit_detail->daya_tampung;
        $this->akses_jalan = $pkl_place_edit_detail->akses_jalan;

        $this->pkl_place_id = $id;
    }

    public function update()
    {
        $rules = [
            "title" => "required|min:5",
            "location" => "required|min:5",
            "telephone" => "required|min:8",
            "open_time" => "required|min:4",
            "rating" => "required|numeric",
            "daya_tampung" => "required|numeric",
            "akses_jalan" => "required|numeric",
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
            "rating.required" => "Rating wajib diisi",
            "daya_tampung.required" => "Daya tampung wajib diisi",
            "akses_jalan.required" => "Akses jalan wajib diisi",

            "title.min" => "Minimal 5 karakter",
            "location.min" => "Minimal 5 karakter",
            "telephone.min" => "Minimal 8 karakter",
            "open_time.min" => "Minimal 4 karakter",
            "link_gmaps.min" => "Minimal 5 karakter",
            "image_url.min" => "Minimal 5 karakter",
        ]);
        $pkl_place_edit_detail = ModelsPKLPlace::find($this->pkl_place_id);
        $pkl_place_edit_detail->update($validated);

        $this->dispatch('update');
        $this->clear();
    }

    public function switch_status($id, $status)
    {
        $current_status = $status == 'aktif' ? 'nonaktif' : 'aktif';
        $pkl_place_detail = ModelsPKLPlace::find($id);
        $pkl_place_detail->update(['status' => $current_status]);

        $this->dispatch('ss');
        $this->clear();
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
            $data = ModelsPKLPlace::orderBy($this->sortColumn, $this->sortDirection)->paginate(5);
        }

        $peminatans = ModelsPKLPlace::find(1)->peminatans;
        $peminat = $peminatans->isNotEmpty() ? $peminatans->first()->peminat : null;

        return view('livewire.p-k-l-place', ['dataPlaces' => $data, "peminat" => $peminat]);
    }
}
