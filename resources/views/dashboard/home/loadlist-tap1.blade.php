<style>
    .unit-edit span {
        font-size: 19px;
    }
</style>
<table id="table-tap1-data">
    <div class="pb-0 p-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Ngân hàng</h6>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
            </div>
        </div>
    </div>
    <div class="card-body p-3 pb-0">
        <ul class="list-group">
            @foreach ($datas as $key => $data)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $data['symbol']}}</h6>
                        <span class="text-xs">#MS-415646</span>
                    </div>
                    <div class="d-flex align-items-center text-sm">
                        @if($data['value'] < 0 )
                        <span style="color:red">
                           {{ $data['value']}}
                        </span>
                        @else 
                             {{ $data['value']}}
                        @endif
                        <!-- <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button> -->
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</table>
