<div class="col-12 col-sm-12">
    <div class="collapse" id="collapsePaging">
        <div class="px-4 py-0 row"  style="min-height:63px">
            <div class="col-sm-4" style="margin:auto">
                <label>
                    Menampilkan 
                    <select name="show" id="show" class="" style='border:none'>
                        @if(!isset($option) || count($option) == 0)
                            @if(!isset($default))
                            <option value="10" selected>10 per halaman</option>
                            <option value="25">25 per halaman</option>
                            <option value="50">50 per halaman</option>
                            <option value="100">100 per halaman</option>
                            <option value="All">Semua halaman</option>
                            @else
                                @switch($default)
                                    @case(10)
                                        <option value="10" selected>10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                        <option value="All">Semua halaman</option>
                                        @break
                                    @case(25)
                                        <option value="10">10 per halaman</option>
                                        <option value="25" selected>25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                        <option value="All">Semua halaman</option>
                                        @break
                                    @case(50)
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50" selected>50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                        <option value="All">Semua halaman</option>
                                        @break
                                    @case(100)
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100" selected>100 per halaman</option>
                                        <option value="All">Semua halaman</option>
                                        @break
                                    @case('All')
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                        <option value="All" selected>Semua halaman</option>
                                        @break
                                @endswitch                                
                            @endif
                        @else
                            @for($i=0; $i < count($option); $i++ )
                                @if($option == $default)
                                <option value="{{ $option[$i] }}" selected>{{ $option[$i] }} per halaman</option>
                                @else
                                <option value="{{ $option[$i] }}">{{ $option[$i] }} per halaman</option>
                                @endif
                            @endfor
                        @endif
                    </select>
                </label>
            </div>
            <div class="col-sm-8 text-center">
                <div id="pager">
                    <ul id="pagination" class="pagination pagination-sm2 float-right mb-0"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
    