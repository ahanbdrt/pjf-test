<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jawaban</title>
</head>
<body>
        
    <table border="1">
        <tr>
            <th>No</th>
            <th>nama pelamar</th>
            <th>Faktor</th>
            <th>Skor</th>
        </tr>
        <?php 
        $no = 1;
        foreach($jawaban->result() as $j){?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $j->username?></td>
                    <td><?= $j->jenis_faktor?></td>
                    <td><?= $j->skor?></td>
                </tr>
            <?php  }?>
    </table>        

        
</body>
</html>