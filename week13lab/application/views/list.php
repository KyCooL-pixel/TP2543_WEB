<!DOCTYPE html>
<html>

<head>
    <meta>
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body bgcolor="#FFFFFF" text="#000000">
    <?php if (!empty($result)): ?>
        <ol>
            <?php
            foreach ($result as $record): ?>
                <li>
                    Name :
                    <?php echo $record->user; ?><br>
                    Email :
                    <?php echo $record->email; ?><br>
                    Date / Time :
                    <?php echo $record->postdate . " / " . $record->posttime; ?><br>
                    Comment :
                    <?php echo nl2br($record->comment); ?><br>
                    Action : <a href="<?php echo base_url('myguestbook/edit/');
                    echo $record->id; ?>">Edit</a>
                    / <a href="<?php echo base_url('myguestbook/remove/');
                    echo $record->id; ?>">Delete</a>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <a href="<?php echo base_url('myguestbook/') ?>">No records, Click to go back to main menu</a>;
    <?php endif; ?>
    <div align="center">
        [ <a href="<?php echo base_url('myguestbook/create/'); ?>">Add</a> ]
    </div>
</body>

</html>