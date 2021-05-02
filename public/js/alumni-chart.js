// Set new default font family and font color to mimic Bootstrap's default styling

let tahun = [];
let totalSiswa = [];
let kategori = [];
let jumlahKategori = [];

function loadData() {
    fetch('/grafik')
        .then(response => response.json())
        .then(data => {
            data.forEach(data => {
                tahun.push(data.tahun);
                totalSiswa.push(data.total);

            });

            createGraph(tahun, totalSiswa)

        });
    fetch('/bar')
        .then(response => response.json())
        .then(data => {
            data.forEach(data => {
                kategori.push(data.kategori);
                jumlahKategori.push(data.total);
            });

            createGraphPrestasi(kategori, jumlahKategori)
        });
}

function createGraph(tahun, total) {

    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    // Area Chart Example
    var ctx = document.getElementById("alumniGraphAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahun,
            datasets: [{
                label: "Alumni",
                lineTension: 0.3,
                backgroundColor: "#FFA726",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: total,
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 20,
                        maxTicksLimit: 10
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });

}


function createGraphPrestasi(kategori, jumlah) {
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("prestasiBarChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: kategori,
            datasets: [{
                data: jumlahKategori,
                backgroundColor: ['#FF4069', '#36A2EB', '#FFC234', '#58508D', '#29bb89', ''],
            }],
        },
    });
}


window.onload = loadData();