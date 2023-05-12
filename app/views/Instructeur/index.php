<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructeurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css"></head>
<body>
    <h2><?= $data['title']; ?></h2>
    <h4>Aantal Instructeurs: <?= $data ['aantalInstructeurs']; ?></h4>

    <table>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Mobiel</th>
            <th>Datum in dienst</th>
            <th>Aantal Sterren</th>
            <th>Voertuigen</th>

        </thead>
        <tbody>
            <?= $data['tableRows']; ?>
        </tbody>
    </table>
</body>
</html>