<div class="row mt-2 hidden scroll" id="saku-report">
    <div class="col-12 pr-0">
        <div class="card {{ $padding }}" style="min-height:200px">
            <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb py-0 my-0">
                        <li class="breadcrumb-item active">
                            {{ $judul }}
                        </li>
                    </ol>
                </nav>            
                <button type="button" id="btn-back" style="position: absolute;right: 25px;
                top: 30px;" class="btn btn-light float-right">
                <i class=""></i> Back</button>
            </div>
            <div class="row h-100" id="report-load" style="display: none;">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div style="box-shadow:none" class="card auth-card text-center">
                        <div style="padding:50px;width:50%;" class="my-auto mx-auto">
                            <div class="progress" style="height:10px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="report-load-bar">0.00%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="canvasPreview">
            </div>
        </div>
    </div>
</div>
    