<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/backend.css') }}">
    <link href="{{ asset('css/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



</head>

<body>
    <a id="url_list_category" data-url="{{ route('list_category') }}" hidden>location</a>
    <a id="url_list_trademark" data-url="{{ route('list_trademark') }}" hidden>location</a>
    <a id="url_list_product" data-url="{{ route('a.list_product') }}" hidden>location</a>

    @if (session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif

    @include('backend.layout.header')
    <div class="container-fluid  ">
        <div class="row">
            <!-- start  header -->
            @include('backend.layout.sidebar')
            <!-- end header  -->

            <!-- start main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 p-3">
                @yield('content')
            </main>
            <!-- end   main -->
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl  bd-example-modal-lg  " id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered  modal-fullscreen-lg-down  modal-xl">
            <div class="modal-content">

            </div>
        </div>
    </div>



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/js/backend/layout.js"></script>
    <script type="text/javascript" src="/js/backend/category.js"></script>
    <script type="text/javascript" src="/js/backend/trademark.js"></script>
    <script type="text/javascript" src="/js/backend/product.js"></script>
    <script type="text/javascript" src="/js/backend/order.js"></script>
    <script type="text/javascript" src="/js/backend/user.js"></script>
    <script type="text/javascript" src="/js/backend/admin.js"></script>
    <script type="text/javascript" src="/js/backend/profile.js"></script>
    <script src="/bootstaps5/js/bootstrap.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>

    <script>
        let listday = $('#container').attr('data-listDay');
        let dataOrder = $('#container-1').attr('data-json');
        let dataMoney = $('#container').attr('data-money');
        let dataMoneyDefault = $('#container').attr('data-money-default');
        let dataMoneyCancel = $('#container').attr('data-money-cancel');
        let dataMoneyOnway = $('#container').attr('data-money-onway');
        let dataMoneyApproved = $('#container').attr('data-money-approved');
        dataOrder = JSON.parse(dataOrder);
        listday = JSON.parse(listday);
        dataMoney = JSON.parse(dataMoney);
        dataMoneyDefault = JSON.parse(dataMoneyDefault);
        dataMoneyCancel = JSON.parse(dataMoneyCancel);
        dataMoneyOnway = JSON.parse(dataMoneyOnway);
        dataMoneyApproved = JSON.parse(dataMoneyApproved);


        let dataMoneyProduct = $('#container-2').attr('data-money-product');
        dataMoneyProduct = JSON.parse(dataMoneyProduct);
        Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: listday,
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Tổng Tiền'
                },

            },
            tooltip: {
                crosshairs: true,
                shared: true

            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 3,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                    name: 'Đã Giao',
                    marker: {
                        symbol: 'circle'
                    },
                    data: dataMoney

                },
                {
                    name: 'Chờ Duyệt',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: dataMoneyDefault
                },
                {
                    name: 'Đã Duyệt',
                    marker: {
                        symbol: 'square'
                    },
                    data: dataMoneyApproved
                },
                {
                    name: 'Đang  Giao',
                    marker: {
                        symbol: 'triangle'
                    },
                    data: dataMoneyOnway
                },
                {
                    name: 'Đã Hủy',
                    marker: {
                        symbol: 'rhombus'
                    },
                    data: dataMoneyCancel
                },
            ]
        });

        // Create the chart
        var pieColors = (function() {
            var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;

            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
            }
            return colors;
        }());

        // Build the chart
        Highcharts.chart('container-1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Biểu đồ tình trạng đơn hàng'
            },
            tooltip: {
                pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                        distance: -50,
                        filter: {
                            property: 'percentage',
                            operator: '>',
                            value: 4
                        }
                    }
                }
            },
            series: [{
                data: dataOrder
            }]
        });
        Highcharts.chart('container-2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Top 10 sản phẩm có doanh thu cao nhất'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        width: '100px',
                        overflow: 'hidden',
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Tổng tiền (millions)'
                }

            },
            legend: {
                enabled: false
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f} m'
                    }
                }
            },

            tooltip: {
                pointFormat: '<span>{point.name}</span>: <b>{point.y:,.1f} m </b>'

            },

            series: [{
                colorByPoint: true,
                data: dataMoneyProduct,

            }],

        });
    </script>
    <script>
        let location_href = window.location.href;
        let menuItem = $('.abc');
        for (let i = 0; i < menuItem.length; i++) {
            if (menuItem[i].href === location_href) {
                $(menuItem[i]).parent('.dropdown-container').parent('.nav-item').find('.dropdown-btn').css('color', 'red');
                $(menuItem[i]).css('color', 'red');
            }
        }
    </script>
    <script>
        if (typeof TYPE_MESSAGE != "undefined") {
            switch (TYPE_MESSAGE) {
                case 'success':
                    toastr.success(MESSAGE);
                    toastr.options = {
                        "newestOnTop": true,
                        "showDuration": "300",
                    }
                    break;
                case 'error':
                    toastr.error(MESSAGE);
                    toastr.options = {
                        "newestOnTop": true,
                        "showDuration": "300",
                    }
                    break;
            }
        }
    </script>
</body>

</html>
