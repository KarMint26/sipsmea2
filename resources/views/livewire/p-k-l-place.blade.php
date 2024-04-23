<div class="p-3 bg-body rounded shadow-sm">
    <div class="pt-3" style="position: relative;">
        <input wire:model.live="keyword" type="text" class="ky-input form-control mb-3" placeholder="Search"
            style="padding-left: 2rem;">
        <i class="fas fa-search" style="position: absolute; left: 10px; top: 50%; color: #afafaf"></i>
    </div>
    <div class="pb-3">
        <button data-toggle="modal" data-target="#storeModal" class="btn btn-md btn-primary">
            <i class="fas fa-plus mr-1"></i> Tambah Data
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sortable table-hover">
            <thead>
                <tr class="text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-2 sort @if ($sortColumn == 'title') {{ $sortDirection }} @endif"
                        wire:click="sort('title')">Nama Tempat</th>
                    <th class="col col-md-4 sort @if ($sortColumn == 'location') {{ $sortDirection }} @endif"
                        wire:click="sort('location')">Lokasi</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'telephone') {{ $sortDirection }} @endif"
                        wire:click="sort('telephone')">Telepon</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'open_time') {{ $sortDirection }} @endif"
                        wire:click="sort('open_time')">Jam Buka</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'rating') {{ $sortDirection }} @endif"
                        wire:click="sort('rating')">Rating</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'daya_tampung') {{ $sortDirection }} @endif"
                        wire:click="sort('daya_tampung')">Daya Tampung</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'akses_jalan') {{ $sortDirection }} @endif"
                        wire:click="sort('akses_jalan')">Akses Jalan</th>
                    <th class="col col-md-1 sort @if ($sortColumn == 'status') {{ $sortDirection }} @endif"
                        wire:click="sort('status')">Status</th>
                    <th class="col col-md-1">Link Gmaps</th>
                    <th class="col col-md-1">Gambar</th>
                    <th class="col col-md-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPlaces as $key => $value)
                    <tr>
                        <td class="text-center">{{ $dataPlaces->firstItem() + $key }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->location }}</td>
                        <td class="text-center">{{ $value->telephone }}</td>
                        <td class="text-center">{{ $value->open_time }}</td>
                        <td class="text-center">{{ $value->rating }}</td>
                        <td class="text-center">{{ $value->daya_tampung }}</td>
                        <td class="text-center">{{ $value->akses_jalan }}</td>
                        <td class="text-center">
                            {{ $value->status }}
                        </td>
                        <td class="text-center">
                            <a href="{{ $value->link_gmaps }}" target="_blank"
                                style="color: var(--primaryColor)">Google
                                Maps</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ $value->image_url }}" target="_blank">
                                <img src="{{ $value->image_url }}" width="90" height="70" alt="image-place"></a>
                        </td>

                        <td class="action-field">
                            <a wire:click="edit({{ $value->id }})" data-toggle="modal" data-target="#editModal"
                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button wire:click="switch_status({{ $value->id }}, '{{ $value->status }}')"
                                class="btn btn-{{ $value->status == 'aktif' ? 'primary' : 'danger' }} btn-sm">
                                <i class="fas fa-adjust"></i>
                                {{ $value->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $dataPlaces->links() }}

    <!-- Modal Store Data -->
    <div wire:ignore.self class="modal fade" id="storeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="storeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storeModalLabel">Tambah Data</h5>
                    <button wire:click="clear" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="title">Nama Tempat</label>
                                <input placeholder="nama tempat..." type="text" class="form-control" id="title"
                                    wire:model="title">
                                @if ($errors->has('title'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="location">Lokasi</label>
                                <input placeholder="lokasi..." type="text" class="form-control" id="location"
                                    wire:model="location">
                                @if ($errors->has('location'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('location') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telephone">Telepon</label>
                                <input placeholder="(0283) 491344" type="text" class="form-control"
                                    id="telephone" wire:model="telephone">
                                @if ($errors->has('telephone'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('telephone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="open_time">Jam Buka</label>
                                <input placeholder="7.15-16.15" type="text" class="form-control" id="open_time"
                                    wire:model="open_time">
                                @if ($errors->has('open_time'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('open_time') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input placeholder="5.00" type="number" class="form-control" id="rating"
                                    wire:model="rating">
                                @if ($errors->has('rating'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('rating') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="akses_jalan">Akses Jalan</label>
                                <input placeholder="5" type="number" class="form-control" id="akses_jalan"
                                    wire:model="akses_jalan">
                                @if ($errors->has('akses_jalan'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('akses_jalan') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="link_gmaps">Link Gmaps</label>
                                <input placeholder="https://maps.app.goo.gl/eLS94hh8RTsEbfzR6" type="text"
                                    class="form-control" id="link_gmaps" wire:model="link_gmaps">
                                @if ($errors->has('link_gmaps'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('link_gmaps') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="daya_tampung">Daya Tampung</label>
                                <input placeholder="5" type="number" class="form-control" id="daya_tampung"
                                    wire:model="daya_tampung">
                                @if ($errors->has('daya_tampung'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('daya_tampung') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="image_url">Link Gambar</label>
                                <input
                                    placeholder="https://lh5.googleusercontent.com/p/AF1QipMllT2eXSMUXTqPdWGRT37ccunJdTniXq3v-GGg=w426-h240-k-no"
                                    type="text" class="form-control" id="image_url" wire:model="image_url">
                                @if ($errors->has('image_url'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('image_url') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="clear" type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times mr-1"></i> Tutup</button>
                    <button wire:click="store" type="button" class="store_btn btn btn-success"><i
                            class="fas fa-file-alt mr-1"></i>
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div wire:ignore.self class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button wire:click="clear" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="title">Nama Tempat</label>
                                <input placeholder="nama tempat..." type="text" class="form-control"
                                    id="title" wire:model="title">
                                @if ($errors->has('title'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="location">Lokasi</label>
                                <input placeholder="lokasi..." type="text" class="form-control" id="location"
                                    wire:model="location">
                                @if ($errors->has('location'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('location') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telephone">Telepon</label>
                                <input placeholder="(0283) 491344" type="text" class="form-control"
                                    id="telephone" wire:model="telephone">
                                @if ($errors->has('telephone'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('telephone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="open_time">Jam Buka</label>
                                <input placeholder="7.15-16.15" type="text" class="form-control" id="open_time"
                                    wire:model="open_time">
                                @if ($errors->has('open_time'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('open_time') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input placeholder="5" type="number" class="form-control" id="rating"
                                    wire:model="rating">
                                @if ($errors->has('rating'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('rating') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="akses_jalan">Akses Jalan</label>
                                <input placeholder="5" type="number" class="form-control" id="akses_jalan"
                                    wire:model="akses_jalan">
                                @if ($errors->has('akses_jalan'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('akses_jalan') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="link_gmaps">Link Gmaps</label>
                                <input placeholder="https://maps.app.goo.gl/eLS94hh8RTsEbfzR6" type="text"
                                    class="form-control" id="link_gmaps" wire:model="link_gmaps">
                                @if ($errors->has('link_gmaps'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('link_gmaps') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="daya_tampung">Daya Tampung</label>
                                <input placeholder="5" type="number" class="form-control" id="daya_tampung"
                                    wire:model="daya_tampung">
                                @if ($errors->has('daya_tampung'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('daya_tampung') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="image_url">Link Gambar</label>
                                <input placeholder="link gambar..." type="text" class="form-control"
                                    id="image_url" wire:model="image_url">
                                @if ($errors->has('image_url'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i
                                            class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('image_url') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="clear" type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-times mr-1"></i> Tutup</button>
                    <button wire:click="update" type="button" class="store_btn btn btn-success"><i
                            class="fas fa-pencil-alt mr-1"></i>
                        Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('store', () => {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("Data berhasil ditambahkan");
            $('#storeModal').modal('hide');
        });

        $wire.on('update', () => {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("Data berhasil diupdate");
            $('#editModal').modal('hide');
        });

        $wire.on('ss', () => {
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("Update status berhasil");
        });
    </script>
@endscript
