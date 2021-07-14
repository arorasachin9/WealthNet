<?php include_once("navbar.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIP Calculator with Google Chart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">SIP Calculator with Google Chart</div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <input type="text" id="investment" placeholder="Monthly Investment" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" id="return_rate" placeholder="Expected Return Rate" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" id="year" placeholder="Time Period" class="form-control" required="">
                            </div>
                            <div class="form-group text-center">
                                <input type="button" id="btn" class="btn btn-success" value="Calculate">
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Invested Amount</th>
                                <th>&#8377;<span id="print_invested_amount">0</span></th>
                            </tr>
                            <tr>
                                <th>Est. Returns</th>
                                <th>&#8377;<span id="print_est_return">0</span></th>
                            </tr>
                            <tr>
                                <th>Total Value</th>
                                <th>&#8377;<span id="print_total_value">0</span></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var print_invested_amount = document.getElementById('print_invested_amount');
        var print_est_return = document.getElementById('print_est_return');
        var print_total_value = document.getElementById('print_total_value');
        var btn = document.getElementById('btn');
        btn.addEventListener('click', () => {
            var investment = document.getElementById('investment').value;
            var return_rate = document.getElementById('return_rate').value;
            var year = document.getElementById('year').value;
            $.ajax({
                url: "logic.php",
                method: "post",
                data: {
                    investment: investment,
                    return_rate: return_rate,
                    year: year
                },
                success: function(data) {
                    data = JSON.parse(data);
                    print_invested_amount.innerHTML = parseInt(data.invested_amount);
                    print_est_return.innerHTML = parseInt(data.est_return);
                    print_total_value.innerHTML = parseInt(data.total_value);
                    var a = parseInt(data.est_return);
                    var b = parseInt(data.invested_amount);
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Est. Return', a],
                            ['Invested Amount', b]
                        ]);

                        var options = {
                            title: 'SIP Calculator',
                            pieHole: 0.4,
                            slices: {
                                0: {
                                    color: '#00d09c'
                                },
                                1: {
                                    color: '#5367ff'
                                }
                            }
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                }
            })
        })
    </script>
</body>

</html>