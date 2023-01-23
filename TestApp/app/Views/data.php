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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection()?>