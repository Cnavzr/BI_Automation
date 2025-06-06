/**
 * تم: Larkon - داشبورد مدیریت واکنش‌گرا با بوت‌استرپ 5
 * نویسنده: Techzaa
 * ماژول/برنامه: نمودارهای میله‌ای قطبی
 */
//
// نمودار قطبی پایه
//

var colors = ["#1c84ee", "#f9b931", "#4ecac2"];
var options = {
    series: [14, 23, 21, 17, 15, 10],
    chart: {
        height: 380,
        type: 'polarArea',
    },
    stroke: {
        colors: ['#fff']
    },
    fill: {
        opacity: 0.8
    },
    labels: ['رای A', 'رای B', 'رای C', 'رای D', 'رای E', 'رای F'],
    legend: {
        position: 'bottom'
    },
    colors: colors,
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};
var chart = new ApexCharts(document.querySelector("#basic-polar-area"), options);
chart.render();

//
// نمودار قطبی تک‌رنگ
//

var colors = ["#1c84ee"];
var options = {
    series: [42, 47, 52, 58, 65],
    chart: {
        height: 380,
        type: 'polarArea'
    },
    labels: ['گل A', 'گل B', 'گل C', 'گل D', 'گل E'],
    fill: {
        opacity: 1
    },
    stroke: {
        width: 1
    },
    yaxis: {
        show: false
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        polarArea: {
            rings: {
                strokeWidth: 0
            },
            spokes: {
                strokeWidth: 0
            },
        }
    },
    theme: {
        monochrome: {
            enabled: true,
            shadeTo: 'light',
            color: '#727cf5',
            shadeIntensity: 0.6
        }
    }
};

var chart = new ApexCharts(document.querySelector("#monochrome-polar-area"), options);
chart.render();
