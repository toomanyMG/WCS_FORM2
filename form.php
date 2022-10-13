<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = array_map('trim', $_POST);

    $errors = [];

    if (empty($contact['firstname'])) {
        $errors[] = 'Le prénom est obligatoire.';
    }

    $maxLengthName = 50;
    if (strlen($contact['firstname']) > $maxLengthName) {
        $errors[] = 'Le prénom doit avoir une longeur max de ' .  $maxLengthName . ' caractères.';
    }

    if (empty($contact['lastname'])) {
        $errors[] = 'Le nom est obligatoire.';
    }

    if (strlen($contact['lastname']) > $maxLengthName) {
        $errors[] = 'Le nom doit avoir une longeur max de ' .  $maxLengthName . ' caractères.';
    }

    if (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format de l\'émail est invalide.';
    }

    if (empty($contact['email'])) {
        $errors[] = 'L\'émail est obligatoire.';
    }
    $maxLengthEmail = 100;
    if (strlen($contact['email']) > $maxLengthEmail) {
        $errors[] = 'Le prénom doit avoir une longeur max de ' .  $maxLengthEmail . ' caractères.';
    }

    if (empty($contact['telephone'])) {
        $errors[] = 'Le téléphone est obligatoire.';
    }

    if ($contact['subject'] === 'null') {
        $errors[] = 'Le choix du sujet est obligatoire.';
    }

    if (empty($contact['message'])) {
        $errors[] = 'Le message est obligatoire.';
    }

    if (empty($errors)) {
        header('Location:thanks.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>


<body>

    <h1>Form no css</h1>


    <form action="form.php" method="post">

        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li> <?= $error; ?> </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div>

            <label for="firstname">Prénom :</label>

            <input type="text" name="firstname" <?= $contact['firstname'] ?? '' ?>>

        </div>
        <div>

            <label for="lastname">Nom :</label>

            <input type="text" name="lastname" <?= $contact['lastname'] ?? '' ?>>

        </div>

        <div>

            <label for="email">Courriel :</label>

            <input type="email" name="email" <?= $contact['email'] ?? '' ?>>

        </div>

        <div>

            <label for="telephone">Téléphone :</label>

            <input type="number" name="telephone" <?= $contact['telephone'] ?? '' ?>>


        </div>

        <div>

            <label for="subject">Sujet :</label>

            <select name="subject" <?= $contact['subject'] ?? '' ?>>
                <option value="null">Choisissez un sujet</option>
                <option value="ceci">Ceci</option>
                <option value="cela">Cela</option>
                <option value="ceci cela">Ceci Cela</option>
            </select>

        </div>

        <div>

            <label for="message">Message :</label>

            <textarea name="message" <?= $contact['message'] ?? '' ?>></textarea>

        </div>

        <div class="button">

            <button type="submit">Envoyer votre message</button>

        </div>

    </form>



</body>

</html>