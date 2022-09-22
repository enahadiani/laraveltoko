<div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id='formEmail'>
                    <div style="display: block;" class="modal-header">
                        <h6 class="modal-title my-2" style="position: absolute;height:49px">Kirim Email</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right:-25px;">
                        <span aria-hidden="true">&times;</span>
                        </button> 
                    </div>
                    <div class='modal-body'>
                        <div class='form-group row'>
                            <label for="modal-email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                        <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
    </div>