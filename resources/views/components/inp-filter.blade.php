<div class="form-group row sai-rpt-filter-entry-row">
    <p class="kunci" hidden>{{ $kode }}</p>
    <label for="{{ $kode }}" class="col-md-2 col-sm-12 col-form-label">{{ $nama }}</label>
    <div class="col-md-2 col-sm-12" >
        <select name='{{ $kode }}[]' class='form-control sai-rpt-filter-type selectize'>
        @for ($i=0; $i < count($option) ;$i++)
            @if($selected == $option[$i])
                @if($option[$i] == "1")
                <option value="all" selected>Semua</option>
                @endif
                @if($option[$i] == "2")
                <option value="range" selected>Rentang</option>
                @endif
                @if($option[$i] == "3")
                <option value="=" selected>Sama dengan</option>
                @endif
                @if($option[$i] == "4")
                <option value="<=" selected>Lebih kecil sampai</option>
                @endif
                @if($option[$i] == "i")
                <option value="in" selected>Pilihan</option>
                @endif
            @else
                @if($option[$i] == "1")
                <option value="all">Semua</option>
                @endif
                @if($option[$i] == "2")
                <option value="range">Rentang</option>
                @endif
                @if($option[$i] == "3")
                <option value="=">Sama dengan</option>
                @endif
                @if($option[$i] == "4")
                <option value="<=">Lebih kecil sampai</option>
                @endif
                @if($option[$i] == "i")
                <option value="in">Pilihan</option>
                @endif
            @endif
        @endfor
        </select>
    </div>
    @if($selected == "2")
    <div class="col-md-3 col-sm-12 sai-rpt-filter-from">
        <div class="input-group">
            <input type="text" class="form-control border-right-0 " name="{{ $kode }}[]" id="{{ $kode }}-from" readonly>
            <div class="input-group-append border-left-0">
            <a href="#" class="text-primary input-group-text search-item">ubah</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai">
        Sampai dengan
    </div>
    <div class="col-md-3 col-sm-12 sai-rpt-filter-to" >
        <div class="input-group" >
            <input type="text" class="form-control border-right-0 " name="{{ $kode }}[]" id="{{ $kode }}-to" readonly>
            <div class="input-group-append border-left-0">
            <a href="#" class="text-primary input-group-text search-item">ubah</a>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
        <div class="input-group">
            @if($selected == "1")
            <input type="text" class="form-control border-right-0 " name="{{ $kode }}[]" id="{{ $kode }}-from" readonly value="Menampilkan semua {{ $nama }}">
            <div class="input-group-append border-left-0">
            <a href="#" class="text-primary input-group-text"></a>
            </div>
            @else
            <input type="text" class="form-control border-right-0 " name="{{ $kode }}[]" id="{{ $kode }}-from" readonly>
            <div class="input-group-append border-left-0">
            <a href="#" class="text-primary input-group-text search-item">ubah</a>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
        Sampai dengan
    </div>
    <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
        <div class="input-group" >
            <input type="text" class="form-control border-right-0 " name="{{ $kode }}[]" id="{{ $kode }}-to" readonly>
            <div class="input-group-append border-left-0">
            <a href="#" class="text-primary input-group-text search-item">ubah</a>
            </div>
        </div>
    </div>
    @endif
</div>