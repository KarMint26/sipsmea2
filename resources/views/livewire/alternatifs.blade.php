<div class="card p-1">
    <div class="card-body">
        <div class="d-flex align-items-center flex-column flex-sm-row" style="gap: 0.5rem;">
            <div>Cari Pengguna : </div>
            <div wire:ignore>
                <select class="custom-select" id="filter" wire:model="userId" style="width: 295px;" name="userId">
                    <option value="" disabled selected>Pilih Nama Pengguna</option>
                    @foreach ($user as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-sortable table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col col-md-1">No</th>
                        <th class="col col-md-3">Tempat PKL</th>
                        <th class="col col-md-1">Jarak</th>
                        <th class="col col-md-1">Rating</th>
                        <th class="col col-md-2">Daya Tampung</th>
                        <th class="col col-md-2">Akses Jalan</th>
                        <th class="col col-md-2">Peminat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAlternatif as $key => $value)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                {{ $value->peminatan->pkl_place->title }}
                            </td>
                            <td class="text-center">
                                {{ $value->jarak }}
                            </td>
                            <td class="text-center">
                                {{ $value->peminatan->pkl_place->rating }}
                            </td>
                            <td class="text-center">
                                {{ $value->peminatan->pkl_place->daya_tampung }}
                            </td>
                            <td class="text-center">
                                {{ $value->peminatan->pkl_place->akses_jalan }}
                            </td>
                            <td class="text-center">
                                {{ $value->peminatan->peminat }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@script
    <script>
        document.addEventListener('livewire:initialized', function() {
            $('#filter').select2({
                theme: 'bootstrap-5'
            }).on('change', function(e) {
                let userId = e.target.value;
                @this.set('userId', userId);
            });
        });
    </script>
@endscript
