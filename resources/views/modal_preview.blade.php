<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
            <div class="modal-content" style="border-radius:0.75em">
                <div class="modal-header py-0" style="display:block;height:49px" >
                    <h6 style="position: absolute;" id="modal-preview-judul">Preview Data</h6>
                    <span id="modal-preview-nama" style="display:none"></span><span id="modal-preview-id" style="display:none"></span> 
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" id="preview-close">
                    <span>×</span>
                    </button>
                    <div class="dropdown d-inline-block float-right" style="margin-top: 10px;">
                        <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                        <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="content-preview" style="height:450px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->