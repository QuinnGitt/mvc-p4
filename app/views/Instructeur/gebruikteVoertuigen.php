<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css"></head>
    <title>Door Instructeur gebruikte voertuigen</title>
</head>

<body>
    <h3><?= $data['title']; ?></h3>

    <table>
        <tbody>
            <tr>
                <td>Naam:</td>
                <td><?= $data['voornaam'] . " " . $data['tussenvoegsel'] . " " . $data['achternaam'];?></td>
            </tr>
            <tr>
                <td>Datum In Dienst:</td>
                <td><?= $data['datumInDienst']?></td>
            </tr>
            <tr>
                <td>Aantal Sterren:</td>
                <td><?= $data['aantalSterren']?></td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <th>Type Voertuig</th>
            <th>Type </th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijs Categorie</th>
        </thead>
        <tbody>
            <?= $data['tableRows']; ?>
        </tbody>
    </table>
</body>

</html>