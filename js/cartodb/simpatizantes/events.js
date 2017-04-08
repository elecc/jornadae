$(function () {
    var jsonGraph = {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Michoacan'
        },
        xAxis: {
            categories: ['Requeridos', 'Simpatizantes'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Votos',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Votos'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 5,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Año 2018',
            data: [35000, 15000]
        }]
    };

   $('#graphmax').highcharts(jsonGraph);
});