    <style>
        .icon-cards-row .card-text {
            height: 30px;
            line-height: 18px;
        }
        .icon-cards-row .card-body {
            padding: .5rem .5rem;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="icon-cards-row">
                <div class="glide dashboard-numbers">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-clock"></i>
                                        <p class="card-text mb-0">Total Visit</p>
                                        <p class="lead text-center">16</p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-basket-coins"></i>
                                        <p class="card-text mb-0">Total View</p>
                                        <p class="lead text-center">32</p>
                                    </div>
                                </a>
                            </li>
                            <li class="glide__slide">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-arrow-refresh"></i>
                                        <p class="card-text mb-0">Total Page</p>
                                        <p class="lead text-center">2</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-0">
                    <div class="card">

                        <!-- <div class="position-absolute card-top-buttons">

                            <button class="btn btn-header-light icon-button" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="simple-icon-refresh"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right mt-3">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Orders</a>
                                <a class="dropdown-item" href="#">Refunds</a>
                            </div> 
                            

                        </div> -->

                        <div class="card-body" style="height:350px">
                            <h5 class="card-title" style="position:absolute">Trafik</h5>
                            <ul role="tablist" style="border: none;float:right;margin-bottom:10px" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#day" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Day</b></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#month" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Month</b></span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#year" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Year</b></span></a> </li>
                            </ul>
                            <div class="dashboard-line-chart chart" style="height:250px">
                                <div class="tab-content tabcontent-border p-0">
                                    <div class="tab-pane active" id="day" role="tabpanel">
                                        <canvas id="trafikChart"></canvas>
                                    </div>
                                    <div class="tab-pane" id="month" role="tabpanel">
                                        
                                    </div>
                                    <div class="tab-pane" id="year" role="tabpanel">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
    <script>
    // Details Images
    var direction = 'ltr';
    
    // Dashboard Numbers
    if ($(".glide.dashboard-numbers").length > 0) {
        new Glide(".glide.dashboard-numbers", {
            bound: true,
            rewind: false,
            perView: 4,
            perTouch: 1,
            focusAt: 0,
            startAt: 0,
            direction: direction,
            gap: 7,
            breakpoints: {
                1800: {
                    perView: 3
                },
                576: {
                    perView: 2
                },
                320: {
                    perView: 1
                }
            }
        }).mount();
    }

    var rootStyle = getComputedStyle(document.body);
    var themeColor1 = rootStyle.getPropertyValue("--theme-color-1").trim();
    var themeColor2 = rootStyle.getPropertyValue("--theme-color-2").trim();
    var themeColor3 = rootStyle.getPropertyValue("--theme-color-3").trim();
    var themeColor4 = rootStyle.getPropertyValue("--theme-color-4").trim();
    var themeColor5 = rootStyle.getPropertyValue("--theme-color-5").trim();
    var themeColor6 = rootStyle.getPropertyValue("--theme-color-6").trim();
    var themeColor1_10 = rootStyle
      .getPropertyValue("--theme-color-1-10")
      .trim();
    var themeColor2_10 = rootStyle
      .getPropertyValue("--theme-color-2-10")
      .trim();
    var themeColor3_10 = rootStyle
      .getPropertyValue("--theme-color-3-10")
      .trim();
    var themeColor4_10 = rootStyle
      .getPropertyValue("--theme-color-4-10")
      .trim();

    var themeColor5_10 = rootStyle
      .getPropertyValue("--theme-color-5-10")
      .trim();
    var themeColor6_10 = rootStyle
      .getPropertyValue("--theme-color-6-10")
      .trim();

    var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
    var foregroundColor = rootStyle
      .getPropertyValue("--foreground-color")
      .trim();
    var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();

    Chart.defaults.global.defaultFontFamily = "'Nunito', sans-serif";

      Chart.defaults.LineWithShadow = Chart.defaults.line;
      Chart.controllers.LineWithShadow = Chart.controllers.line.extend({
        draw: function (ease) {
          Chart.controllers.line.prototype.draw.call(this, ease);
          var ctx = this.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.15)";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          ctx.stroke();
          Chart.controllers.line.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.BarWithShadow = Chart.defaults.bar;
      Chart.controllers.BarWithShadow = Chart.controllers.bar.extend({
        draw: function (ease) {
          Chart.controllers.bar.prototype.draw.call(this, ease);
          var ctx = this.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.15)";
          ctx.shadowBlur = 12;
          ctx.shadowOffsetX = 5;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          Chart.controllers.bar.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.LineWithLine = Chart.defaults.line;
      Chart.controllers.LineWithLine = Chart.controllers.line.extend({
        draw: function (ease) {
          Chart.controllers.line.prototype.draw.call(this, ease);
          if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
            var activePoint = this.chart.tooltip._active[0];
            var ctx = this.chart.ctx;
            var x = activePoint.tooltipPosition().x;
            var topY = this.chart.scales["y-axis-0"].top;
            var bottomY = this.chart.scales["y-axis-0"].bottom;
            ctx.save();
            ctx.beginPath();
            ctx.moveTo(x, topY);
            ctx.lineTo(x, bottomY);
            ctx.lineWidth = 1;
            ctx.strokeStyle = "rgba(0,0,0,0.1)";
            ctx.stroke();
            ctx.restore();
          }
        }
      });

      Chart.defaults.DoughnutWithShadow = Chart.defaults.doughnut;
      Chart.controllers.DoughnutWithShadow = Chart.controllers.doughnut.extend({
        draw: function (ease) {
          Chart.controllers.doughnut.prototype.draw.call(this, ease);
          let ctx = this.chart.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.15)";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          Chart.controllers.doughnut.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.PieWithShadow = Chart.defaults.pie;
      Chart.controllers.PieWithShadow = Chart.controllers.pie.extend({
        draw: function (ease) {
          Chart.controllers.pie.prototype.draw.call(this, ease);
          let ctx = this.chart.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.15)";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          Chart.controllers.pie.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.ScatterWithShadow = Chart.defaults.scatter;
      Chart.controllers.ScatterWithShadow = Chart.controllers.scatter.extend({
        draw: function (ease) {
          Chart.controllers.scatter.prototype.draw.call(this, ease);
          let ctx = this.chart.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.2)";
          ctx.shadowBlur = 7;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 7;
          ctx.responsive = true;
          Chart.controllers.scatter.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.RadarWithShadow = Chart.defaults.radar;
      Chart.controllers.RadarWithShadow = Chart.controllers.radar.extend({
        draw: function (ease) {
          Chart.controllers.radar.prototype.draw.call(this, ease);
          let ctx = this.chart.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.2)";
          ctx.shadowBlur = 7;
          ctx.shadowOffsetX = 0;
          ctx.shadowOffsetY = 7;
          ctx.responsive = true;
          Chart.controllers.radar.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      Chart.defaults.PolarWithShadow = Chart.defaults.polarArea;
      Chart.controllers.PolarWithShadow = Chart.controllers.polarArea.extend({
        draw: function (ease) {
          Chart.controllers.polarArea.prototype.draw.call(this, ease);
          let ctx = this.chart.chart.ctx;
          ctx.save();
          ctx.shadowColor = "rgba(0,0,0,0.2)";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 5;
          ctx.shadowOffsetY = 10;
          ctx.responsive = true;
          Chart.controllers.polarArea.prototype.draw.apply(this, arguments);
          ctx.restore();
        }
      });

      var chartTooltip = {
        backgroundColor: foregroundColor,
        titleFontColor: primaryColor,
        borderColor: separatorColor,
        borderWidth: 0.5,
        bodyFontColor: primaryColor,
        bodySpacing: 10,
        xPadding: 15,
        yPadding: 15,
        cornerRadius: 0.15,
        displayColors: false
      };
    if (document.getElementById("trafikChart")) {
        var trafikChart = document.getElementById("trafikChart").getContext("2d");
        var myChart = new Chart(trafikChart, {
          type: "LineWithShadow",
          options: {
            plugins: {
              datalabels: {
                display: false
              }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  gridLines: {
                    display: true,
                    lineWidth: 1,
                    color: "rgba(0,0,0,0.1)",
                    drawBorder: false
                  },
                  ticks: {
                    beginAtZero: true,
                    stepSize: 5,
                    min: 50,
                    max: 70,
                    padding: 20
                  }
                }
              ],
              xAxes: [
                {
                  gridLines: {
                    display: false
                  }
                }
              ]
            },
            legend: {
              display: false
            },
            tooltips: chartTooltip
          },
          data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [
              {
                label: "",
                data: [54, 63, 60, 65, 60, 68, 60],
                borderColor: themeColor1,
                pointBackgroundColor: foregroundColor,
                pointBorderColor: themeColor1,
                pointHoverBackgroundColor: themeColor1,
                pointHoverBorderColor: foregroundColor,
                pointRadius: 6,
                pointBorderWidth: 2,
                pointHoverRadius: 8,
                fill: false
              }
            ]
          }
        });
      }
    
    </script>