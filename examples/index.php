<!doctype html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Reamaze PHP SDK Examples</title>
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

<h2>Articles [ @todo ]</h2>

<?php foreach ([
                   'retrieve' => 'Retrieving Articles',
                   'get'      => 'Get Article',
                   'create'   => 'Creating Articles',
                   'update'   => 'Updating Articles',
               ] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('articles-<?= $key ?>');">source</a> |
        <a href="./articles/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="articles-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./articles/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>

<h2>Contacts</h2>

<?php foreach ([
        'retrieve'         => 'Retrieving Contacts',
        'create'           => 'Create Contacts',
        'update'           => 'Update Contacts',
        'getIdentities'    => 'Get Contact Identities',
        'createIdentities' => 'Create Identities',
    ] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('contacts-<?= $key ?>');">source</a> |
        <a href="./contacts/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="contacts-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./contacts/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>


<h2>Conversations</h2>

<?php foreach ([
                   'create'   => 'Create Conversation',
                   'get'      => 'Get Conversation',
                   'retrieve' => 'Retrieve Conversation',
               ] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('conversations-<?= $key ?>');">source</a> |
        <a href="./conversations/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="conversations-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./conversations/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>


<h2>Messages</h2>

<?php foreach (['create' => 'Create Message', 'retrieve' => 'Retrieve Message'] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('messages-<?= $key ?>');">source</a> |
        <a href="./messages/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="messages-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./messages/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>


<h2>Channels</h2>

<?php foreach (['retrieve' => 'Retrieving Channels', 'get' => 'Get Channel'] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('channels-<?= $key ?>');">source</a> |
        <a href="./channels/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="channels-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./channels/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>

<h2>Staff</h2>

<?php foreach (['retrieve' => 'Retrieving Staff', 'create' => 'Create Staff User'] as $key => $title) { ?>
    <h3>
        <?= $title ?>
        <a href="#" onclick="toggleVisibility('channels-<?= $key ?>');">source</a> |
        <a href="./staff/<?= $key ?>.php" target="_blank">demo</a>
    </h3>

    <div id="staff-<?= $key ?>" style="display: none;">
        <?php $file = file_get_contents('./channels/' . $key . '.php');
        highlight_string($file); ?>
    </div>
<?php } ?>



</body>
</html>
