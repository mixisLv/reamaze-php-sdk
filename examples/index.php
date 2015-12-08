<!doctype html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Reamaze php SDK Examples</title>
    <script type="text/javascript">
        <!--
        function toggleVisibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
        //-->
    </script>
</head>
<body>

<h1>Reamaze php SDK Examples</h1>

<h2>Contacts</h2>

<?php foreach (['retrieve' => 'Retrieving Contacts', 'create' => 'Create Contacts', 'update' => 'Update Contacts'] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('contacts-<?= $key ?>');">source</a> |
        <a href="./contacts/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="contacts-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./contacts/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<? } ?>

</body>
</html>
