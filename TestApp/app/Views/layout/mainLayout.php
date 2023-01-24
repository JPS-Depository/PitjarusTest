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
        <form id="filter-form" method="get" action="/" class="mb-5">
            <div class="row mb-3" style="display:flex;align-items:flex-end;">
                <div class="col">
                    <div class="row">
                        <label for="checkboxes">Select Area</label>
                    </div>
				    <select class="form-control" name="checkboxes[]" id="multiple-checkboxes" multiple="multiple">
                        <?php foreach ($areas as $item):?>
                            <option value="<?= esc($item->area_id)?>"><?= esc($item->area_name)?></option>
                        <?php endforeach?>
				    </select>
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
        <div>
            <h6>Filter : </h6>
            <b>Area : </b>
            <?php foreach ($areaD as $item):?>
                <span><?= esc($item->area_name)?> || </span>
            <?php endforeach?>
            <?php if($startDate):?>
                <b>From <?= esc($startDate)?> 
                <?php if($endDate):?>
                    to <?= esc($endDate)?></b>
                <?php endif ?>
            <?php endif ?>
        </div>
        <?= $this->renderSection('content')?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="script/dropdown.js"></script>
    <script src="script/bootstrap-multiselect.js"></script>
    <script>
        let areas = <?php echo isset($areaD) ? json_encode($areaD) : [];?>;
        const areaName = areas.map(area => area.area_name);
        const chart = <?php echo isset($chart) ? json_encode($chart) : [];?>;
        const data = chart.map(el => {
        return Math.round(el.SumCompliance / <?php echo isset($total) ? json_encode($total->Total) : [];?> * 100);
        });
        console.log(data);
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: areaName,
            datasets: [{
            label: 'Nilai',
            data: data,
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