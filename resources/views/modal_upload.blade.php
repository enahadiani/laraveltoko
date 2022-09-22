
    <!-- MODAL UPLOAD -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="modal-importLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0.75em">
                <form id="form-import">
                    <div class="modal-header py-2">
                        <h6 class="modal-title" id="modal-importLabel">Upload Berkas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0" style="border:0">
                        <div class="input-group mb-1">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" style="display: unset;" name="file">
                                <label class="custom-file-label" for="inputGroupFile01" style="display: block;">File input</label>
                            </div>
                        </div>
                        <label id="label-file" class="mb-0"></label>
                        <div style="height: 10px;" class="progress hidden mb-2">
                            <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="5" style="width:5%" >5%</div>
                        </div>
                        <div class="pesan-upload" style="background:#F5F5F5;display:none;padding: 10px 25px;border-radius: 0.75em;" >
                            <p class="pesan-upload-judul" style="font-weight:bold;font-size:12px;margin:0"></p>
                            <p class="pesan-upload-isi" style="font-size:12px"></p>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:0">
                        <button type="button"  id="process-upload" class="btn btn-light" >Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL UPLOAD  -->