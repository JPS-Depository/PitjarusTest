<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Test App - Jacob Pascal Silaen</title>
</head>
<body>
    <div class="container p-5">
        <h3 class="mb-5">Please filter your data</h3>
        <form method="get" action="/" class="mb-5">
            <div class="row mb-3" style="display:flex;align-items:flex-end;">
                <div class="col">

                </div>
                <div class="col">
                    <label for="startDate">Date From</label>
                    <input name="startDate" class="form-control" type="date" />
                </div>
                <div class="col">
                    <label for="endDate">Date To</label>
                    <input name="endDate" class="form-control" type="date" />
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <?= $this->renderSection('content')?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
            label: 'Nilai',
            data: [12, 10, 3, 5, 2, 3],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                title: {
                display: true,
                text: "Percentage(%)"
                },
                beginAtZero: true,
                suggestedMax: 100,
                ticks: {
                stepSize: 25
                }
            }
            }
        }
        });
    </script>
</body>
</html>