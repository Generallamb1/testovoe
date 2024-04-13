<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Телефонная книга</title>
</head>
<h3>Телефонная книга</h3>
<body>
<?php
require_once 'Contacts.php';
$contacts = new Contacts;
if (isset($_POST['insert'])) {
    $contacts->createContact();
}
if (isset($_POST['delete'])) {
    $contacts->deleteContact($_POST['id']);
}
?>

<div>
    <form method="post">
        <div>
            <label>Имя</label>
            <input type="text" name="name" required="required"/>
        </div>
        <div>
            <label>Телефон</label>
            <input type="text" name="phone" required="required"/>
        </div>
        <button value="insert" name="insert">Создать</button>
    </form>
        <?php
        require_once "lib.php";
        $json = jsonGetContent();
        foreach ($json as $fetch) {
            ?>
            <form method="post">
                <?php echo $fetch->name ?>
                <?php echo $fetch->phone ?>
                <input type="hidden" name="id" value="<?php echo $fetch->id ?>">
                <button name="delete">Delete</button>
            </form>
            <?php
        }
        ?>

</body>
</html>
