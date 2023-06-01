<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header" style="background:#299c03cc">
            <h5 class="modal-title" style="color:white">{{ $datas['blogDetail']->title }}</h5>
            <button style="background:white" type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body" style="height: 70vh; overflow-y: scroll">
            {!! $datas['blogDetail']->decision !!}
        </div>
        <div class="modal-footer">
            <button style="background:white" type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                Đóng
            </button>
        </div>
    </div>
</div>