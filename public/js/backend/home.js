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
// Build the chart
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