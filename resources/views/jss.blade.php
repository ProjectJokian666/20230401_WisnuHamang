<script>
    Highcharts.chart('grapik', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'DATA TRANSAKSI'
        },
        subtitle: {
            text: 'https://www.highcharts.com/demo/column-basic'
        },
        xAxis: {
            categories: {!!json_encode($grafikindex)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'JUMLAH'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><br><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Sudah Selesai',
            data: {!!json_encode($grafiksudah)!!}

        }, {
            name: 'Belum Selesai',
            data: {!!json_encode($grafikbelum)!!}

        },{
            name: 'Total',
            data: {!!json_encode($grafiktotal)!!}

        },]
    });
    s
</script>