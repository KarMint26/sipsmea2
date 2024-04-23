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
                    <th class="col col-md-3 sort @if ($sortColumn == 'name') {{ $sortDirection }} @endif"
                        wire:click="sort('name')">Nama Siswa</th>
                    <th class="col col-md-2 sort @if ($sortColumn == 'username') {{ $sortDirection }} @endif"
                        wire:click="sort('username')">NISN Siswa</th>
                    <th class="col col-md-2 sort @if ($sortColumn == 'status') {{ $sortDirection }} @endif"
                        wire:click="sort('status')">Status</th>
                    <th class="col col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSiswa as $key => $value)
                    <tr>
                        <td class="text-center">{{ $dataSiswa->firstItem() + $key }}</td>
                        <td class="text-center">{{ $value->name }}</td>
                        <td class="text-center">{{ $value->username }}</td>
                        <td class="text-center">{{ $value->status }}</td>

                        <td class="action-field">
                            <a target="_blank"
                                href="{{ route('barcode_generator', ['frame_name' => 'no-frame', 'qr_code_text' => 'https://sipsmea.techtitans.id/student-login?username=' . $value->username . '&password=' . $value->pwd_nohash . '&role=siswa', 'image_format' => 'PNG', 'marker_left_template' => 'version15', 'marker_right_template' => 'version15', 'marker_bottom_template' => 'version15', 'image_width' => 500, 'background_color' => '#a00a52', 'foreground_color' => '#ffffff']) }}" class="btn btn-sm" style="background-color: blueviolet; color: #fff">
                                <i class="fas fa-qrcode mr-1"></i>
                                Download QR
                            </a>
                            <a wire:click="edit({{ $value->id }})" data-toggle="modal" data-target="#editModal"
                                class="btn btn-warning btn-sm"><i class="fas fa-edit mr-1"></i> Edit</a>
                            <button wire:click="switch_status({{ $value->id }}, '{{ $value->status }}')"
                                class="btn btn-{{ $value->status == 'aktif' ? 'primary' : 'danger' }} btn-sm">
                                <i class="fas fa-adjust mr-1"></i>
                                {{ $value->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $dataSiswa->links() }}

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
                                <label for="name">Nama Siswa</label>
                                <input placeholder="Nama Siswa..." type="text" class="form-control" id="name"
                                    wire:model="name">
                                @if ($errors->has('name'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="username">NISN Siswa</label>
                                <input placeholder="NISN Siswa..." type="number" class="form-control" id="username"
                                    wire:model="username">
                                @if ($errors->has('username'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('username') }}
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
                                <label for="name">Nama Siswa</label>
                                <input placeholder="Nama Siswa..." type="text" class="form-control" id="name"
                                    wire:model="name">
                                @if ($errors->has('name'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="username">NISN Siswa</label>
                                <input placeholder="NISN Siswa..." type="number" class="form-control" id="username"
                                    wire:model="username">
                                @if ($errors->has('username'))
                                    <div class="error_message mt-1" style="font-size: 0.75rem; color: red;">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $errors->first('username') }}
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
