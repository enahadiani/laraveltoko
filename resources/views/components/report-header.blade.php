<div class="card-body pt-4 pb-2 px-4 header-report" style="min-height:69.2px">
    <h6 style="position:absolute;top: 25px;">{{ $judul }}</h6>
    <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2 hidden" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
    <div class="dropdown float-right">
        <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right hidden"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="simple-icon-share-alt mr-1"></i> Export
        </button>
        <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
            <a class="dropdown-item" href="#" id="sai-rpt-print"><img src="{{ asset('img/Print.svg') }}" style="width:16px;"> <span class="ml-2">Print</span></a>
            <a class="dropdown-item" href="#" id="sai-rpt-print-prev"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">Print Preview</span></a>
            <a class="dropdown-item" href="#" id="sai-rpt-excel"><img src="{{ asset('img/excel.svg') }}" style="width:16px;"> <span class="ml-2">Excel</span></a>
            <a class="dropdown-item" href="#" id="sai-rpt-email"><img src="{{ asset('img/email.svg') }}" style="width:16px;height: 16px;margin-right: 3px;"><span class="ml-2">Email</span></a>
            <a class="dropdown-item" href="#" id="sai-rpt-pdf"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">PDF</span></a>
        </div>
    </div>
</div>
    