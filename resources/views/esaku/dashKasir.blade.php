<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-keuangan-desktop.css') }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-keuangan-tablet.css') }}" />

{{-- For Dekstop --}}

<section id="dekstop-baris-ke-1" class="dashboard-baris-1 pb-3 col-dekstop">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Overview Laba Rugi</h6>
                {{-- Pendapatan --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Pendapatan</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">900,82 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">12,83%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Harga Pokok --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Harga Pokok</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">273,24 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">3,22%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Beban --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Beban</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">492,06 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up error-icon">
                            <span class="percentage-overview error-text">2,01%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Laba Rugi --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Laba Rugi</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">135,52 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">10,73%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-lg-9 col-xl-9">
            <div class="row">
                <div class="col-4">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Gross Profit Margin</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">89,1%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Operating Ratio</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">23,9%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Net Profit Margin</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">54,2%</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-8">
                    <div class="card card-dash">
                        <h6 class="ml-4 mt-3 mb-0 judul-card">Arus Kas</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <div id="arus-kas-dekstop"></div>
                            <div class="keterangan-grafik">
                                <div class="label-grafik">
                                    <div class="legend-symbol-1"></div>
                                    <span class="legend-text">Uang Masuk</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-2"></div>
                                    <span class="legend-text">Uang Keluar</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-3"></div>
                                    <span class="legend-text">Saldo Uang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-dash">
                        <h6 class="ml-4 mt-3 mb-0 judul-card">Jumlah Piutang</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <div id="jumlah-piutang-dekstop"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="dekstop-baris-ke-2" class="dashboard-baris-2 pb-3 col-dekstop">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xl-6">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Laba Rugi</h6>
                <div class="card-dash-body ml-4 mt-2">
                    <div id="laba-rugi-dekstop"></div>
                    <div class="keterangan-grafik">
                        <div class="label-grafik">
                            <div class="legend-symbol-1"></div>
                            <span class="legend-text">Pendapatan</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-2"></div>
                            <span class="legend-text">Beban</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-3"></div>
                            <span class="legend-text">Laba Rugi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xl-6">
            <div class="card card-dash card-info">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Informasi Bulan Ini</h6>
                <div class="dash-card-body mt-2">
                    <ol class="list-info">
                        <li>Hari ini akan menerima pembayaran Rp. 200.380.000</li>
                        <li>Jatuh tempo pinjaman Rp. 300.000.000 pada tanggal 28/01/2021</li>
                        <li>Perkiraan gaji karyawan bulan ini Rp. 83.000.000</li>
                        <li>Pembayaran sewa bangunan Rp. 23.000.000 pada tanggal 30/01/21</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- For Tablet --}}

<section id="mobile-baris-ke-1" class="dashboard-baris-1 pb-3 col-tablet"> 
    <div class="row">
        <div class="col-6">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Overview Laba Rugi</h6>
                {{-- Pendapatan --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Pendapatan</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                         <h5 class="ml-4 overview-amount">900,82 jt</h5>
                    </div>
                     <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">12,83%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Harga Pokok --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Harga Pokok</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">273,24 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">3,22%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Beban --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Beban</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">492,06 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up error-icon">
                            <span class="percentage-overview error-text">2,01%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
                {{-- Laba Rugi --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="ml-4 overview-text">Laba Rugi</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <h5 class="ml-4 overview-amount">135,52 jt</h5>
                    </div>
                    <div class="mt-2 col-md-4 col-lg-4 col-xl-4">
                        <div class="glyph-icon iconsminds-up success-icon">
                            <span class="percentage-overview success-text">10,73%</span>
                        </div>
                        <span class="ml-2 label-overview">Tahun lalu</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Gross Profit Margin</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">89,1%</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Operating Ratio</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">23,9%</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-dash card-dash-info">
                        <h6 class="ml-4 mt-3 mb-0">Net Profit Margin</h6>
                        <div class="card-dash-body ml-4 mt-2">
                            <h5 class="overview-amount">54,2%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="mobile-baris-ke-2" class="dashboard-baris-2 pb-3 col-tablet"> 
    <div class="row">
        <div class="col-7">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Arus Kas</h6>
                <div class="card-dash-body ml-4 mt-2">
                    <div id="arus-kas-mobile"></div>
                    <div class="keterangan-grafik">
                        <div class="label-grafik">
                            <div class="legend-symbol-1"></div>
                            <span class="legend-text">Uang Masuk</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-2"></div>
                            <span class="legend-text">Uang Keluar</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-3"></div>
                            <span class="legend-text">Saldo Uang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Jumlah Piutang</h6>
                <div class="card-dash-body ml-4 mt-2">
                    <div id="jumlah-piutang-mobile"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="mobile-baris-ke-3" class="dashboard-baris-3 pb-3 col-tablet"> 
    <div class="row">
        <div class="col-12">
            <div class="card card-dash">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Laba Rugi</h6>
                <div class="card-dash-body ml-4 mt-2">
                    <div id="laba-rugi-mobile"></div>
                    <div class="keterangan-grafik">
                        <div class="label-grafik">
                            <div class="legend-symbol-1"></div>
                            <span class="legend-text">Pendapatan</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-2"></div>
                            <span class="legend-text">Beban</span>
                        </div>
                        <div class="label-grafik">
                            <div class="legend-symbol-3"></div>
                            <span class="legend-text">Laba Rugi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="mobile-baris-ke-4" class="dashboard-baris-4 pb-3 col-tablet"> 
    <div class="row">
        <div class="col-12">
           <div class="card card-dash card-info">
                <h6 class="ml-4 mt-3 mb-0 judul-card">Informasi Bulan Ini</h6>
                <div class="dash-card-body mt-2">
                    <ol class="list-info">
                        <li>Hari ini akan menerima pembayaran Rp. 200.380.000</li>
                        <li>Jatuh tempo pinjaman Rp. 300.000.000 pada tanggal 28/01/2021</li>
                        <li>Perkiraan gaji karyawan bulan ini Rp. 83.000.000</li>
                        <li>Pembayaran sewa bangunan Rp. 23.000.000 pada tanggal 30/01/21</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
Highcharts.chart('laba-rugi-dekstop', {
    chart: { height: 170 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});

Highcharts.chart('laba-rugi-mobile', {
    chart: { height: 170 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});

Highcharts.chart('jumlah-piutang-dekstop', {
    chart: { 
        type: 'spline',
        height: 190 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "'16",
            "'17",
            "'18",
            "'19",
            "'20"
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [60, 30, 45, 20],
        color: '#ffb703'
    }]
});

Highcharts.chart('jumlah-piutang-mobile', {
    chart: { 
        type: 'spline',
        height: 190 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "'16",
            "'17",
            "'18",
            "'19",
            "'20"
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [60, 30, 45, 20],
        color: '#ffb703'
    }]
});

Highcharts.chart('arus-kas-dekstop', {
    chart: { height: 178 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});
Highcharts.chart('arus-kas-mobile', {
    chart: { height: 178 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});
</script>