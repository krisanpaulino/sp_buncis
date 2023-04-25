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
        Tanggal Diagnosa : <?= $diagnosa->diagnosa_tgl ?>
    </p>
    <p class="ms-0">
        Nama Petani : <?= $diagnosa->petani_nama ?>
    </p>
    <table id="table">
        <thead>
            <tr>
                <th>Gejala</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detaildiagnosa as $detail) : ?>
                <tr>
                    <td scope="row"><?= $detail->gejala_nama ?></td>
                    <td><b><?= $detail->detaildiagnosa_jawab ?></b></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <?php if ($diagnosa->diagnosa_deskripsi == 'Tidak ditemukan.') : ?>
        <p>Hasil : Penyakit dengan gejala yang anda pilih belum ada pada daftar penyakit yang tersedia. Mohon hubungi Pakar untuk informasi lebih lanjut.</b></p>
    <?php else : ?>
        <p>Hasil : Tanaman buncis anda terserang <b><?= $penyakit->penyakit_nama ?></b>.</p> <br><br>
        <img src="<?= base_url('assets/img/penyakit/' . $penyakit->penyakit_foto) ?>" width="100" class="img-fluid">
        <p> <b>Saran Penanganan/Pencegahan :</b></p>
        <p><?= $penyakit->penyakit_solusi ?></p>
    <?php endif ?>
</body>

</html>