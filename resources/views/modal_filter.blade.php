<!-- MODAL FILTER -->
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        @if(isset($filter))
                            @for($i =0; $i < count($filter); $i++)
                            <div class="form-group row" style="padding:1rem">
                                <label>{{ $filter[$i]['nama'] }}</label>
                                <select class="form-control selectize" data-width="100%" name="inp-filter_{{ $filter[$i]['id'] }}" id="inp-filter_{{ $filter[$i]['id'] }}">
                                <option value='#'>Pilih {{ $filter[$i]['nama'] }}</option>
                                </select>
                            </div>
                            @endfor
                        @endif
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
