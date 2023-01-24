<?= $this->extend('layout/mainLayout')?>

<?= $this->section('content')?>
    <div class="content">
        <div class="mb-5" style="display:flex;justify-content:center;align-items:center; height:500px">
            <canvas id="myChart"></canvas>
        </div>
        <div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">Brand</th>
                    <?php foreach ($areaD as $item):?>
                        <th scope="col"><?= esc($item->area_name)?></th>
                    <?php endforeach?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brands as $brand):?>
                        <tr>
                            <th scope="row"><?= esc($brand->brand_name)?></th>
                            <?php foreach ($reports as $report):?>
                                <?php if($brand->brand_name == $report->brand_name):?>
                                    <th scope="col"><?= esc(round($report->SumCompliance / $total->Total * 100))?></th>
                                <?php endif ?>
                            <?php endforeach?>
                        </tr>
                    <tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection()?>