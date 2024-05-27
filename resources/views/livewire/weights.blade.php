<div class="card p-1">
    <div class="card-body">
        <div class="pt-3" style="position: relative;">
            <input wire:model.live="keyword" type="text" class="ky-input form-control mb-3" placeholder="Search"
                style="padding-left: 2rem;">
            <i class="fas fa-search" style="position: absolute; left: 10px; top: 50%; color: #afafaf"></i>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sortable table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="col col-md-1">No</th>
                        <th class="col col-md-2">Nama</th>
                        <th class="col col-md-1">Jarak</th>
                        <th class="col col-md-1">Rating</th>
                        <th class="col col-md-2">Daya Tampung</th>
                        <th class="col col-md-2">Akses Jalan</th>
                        <th class="col col-md-2">Peminat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBobot as $key => $value)
                        <tr>
                            <td class="text-center">{{ $dataBobot->firstItem() + $key }}</td>
                            <td class="text-center">{{ $value->name }}</td>
                            <td class="text-center">{{ abs($value->w1) }}</td>
                            <td class="text-center">{{ $value->w2 }}</td>
                            <td class="text-center">{{ $value->w3 }}</td>
                            <td class="text-center">{{ $value->w4 }}</td>
                            <td class="text-center">{{ abs($value->w5) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $dataBobot->links() }}
    </div>
</div>
