<?php

if (isset($_GET['css'])) {
    $css = $_GET['css'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cascading Style Sheets</title>

    <?php if (isset($_GET['css'])) { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>.css">
    <?php } ?>

</head>

<body>

    <div class="wrapper">

        <div id="top">
            <h1>Welcome to My Homepage</h1>
            <p>Use the menu to select different Stylesheets</p>
        </div>

        <div class="wrapper">

            <div id="menubar">
                <ul id="menulist">
                    <li class="menuitem" onclick="window.open('?css=style1','_self');">Stylesheet 1
                    <li class="menuitem" onclick="window.open('?css=style2','_self');">Stylesheet 2
                    <li class="menuitem" onclick="window.open('?css=style3','_self');">Stylesheet 3
                    <li class="menuitem" onclick="window.open('?','_self');">No Stylesheet
                </ul>
            </div>

            <div id="main">
                <h1>Same Page Different Stylesheets</h1>
                <p>
                    This is a demonstration of how different stylesheets can change the layout of your HTML page. You
                    can change the layout of this page by selecting different stylesheets in the menu, or by selecting
                    one of the following links:<br>
                    <a href="?css=style1">Stylesheet1</a>,
                    <a href="?css=style2">Stylesheet2</a>,
                    <a href="?css=style3">Stylesheet3</a>
                </p>
                <h2>No Styles</h2>
                <p>
                    This page uses DIV elements to group different sections of the HTML page. Click here to see how the
                    page looks like with no stylesheet:<br><a href="?">No Stylesheet</a>.
                </p>
            </div>

            <div id="sidebar">
                <h3>Side-Bar</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat.
                </p>
            </div>

        </div>

        <div id="bottom">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi veniam molestias dicta magni natus, iusto sunt necessitatibus dolore inventore reprehenderit fuga eaque officiis animi delectus quibusdam excepturi! Dignissimos, ducimus laboriosam!
        </div>

    </div>

</body>

</html>