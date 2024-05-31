<div class="card p-1">
    <div class="card-body">
        <div class="d-flex align-items-center flex-column-reverse flex-sm-row" style="gap: 1.5rem">
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
            {{-- <div class="d-flex align-items-center flex-column flex-sm-row" style="gap: 0.5rem;">
                <div>Metode SPK : </div>
                <div wire:ignore>
                    <select class="custom-select" id="spkMethod" wire:model="spkMethod" style="width: 200px;" name="spkMethod">
                        <option value="" disabled selected>Pilih Metode SPK</option>
                        <option value="SAW">SAW</option>
                        <option value="WP">WP</option>
                        <option value="TOPSIS">TOPSIS</option>
                    </select>
                </div>
            </div> --}}
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-sortable table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col col-md-1">No</th>
                        <th class="col col-md-3">Nama Mitra PKL</th>
                        <th class="col col-md-2">Hasil Perankingan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSpk as $key => $value)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                {{ $value->title }}
                            </td>
                            <td class="text-center">
                                {{ number_format($value->hasil, 6, '.', '') }}
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

            // $('#spkMethod').select2({
            //     theme: 'bootstrap-5'
            // }).on('change', function(e) {
            //     let spkMethod = e.target.value;
            //     @this.set('spkMethod', spkMethod);
            // });
        });
    </script>
@endscript
