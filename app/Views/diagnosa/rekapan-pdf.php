<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <img src="<?= base_url('assets/images/kop.png') ?>" style="width: 100%;" alt="">
    </div>
    <p class="ms-0">
        Dari : <?= ($tgldari != null) ? $tgldari : 'Semua Tanggal' ?>
    </p>
    <p class="ms-0">
        Sampai : <?= ($tglsampai != null) ? $tglsampai : 'Semua Tanggal' ?>
    </p>
    <table id="table">
        <thead>
            <tr>
                <th>Nama Penyakit</th>
                <th>Jumlah Diagnosa</th>
                <th>Presentase</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diagnosa as $diag) : ?>
                <tr>
                    <?php if ($diag->diagnosa_deskripsi == null) : ?>
                        <td><i>Data penyakit belum tersedia</i></td>
                    <?php elseif ($diag->penyakit_kode == null) : ?>
                        <td><i>Penyakit diubah/dihapus</i></td>
                    <?php else : ?>
                        <td><?= $diag->penyakit_nama ?></td>
                    <?php endif; ?>
                    <td><?= $diag->jumlah ?></td>
                    <td><?= $diag->jumlah / $jumlah->jumlah * 100 ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>