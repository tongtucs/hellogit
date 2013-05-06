<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>My Page</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="css/jquery.mobile-1.3.0.min.css" />
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.mobile-1.3.0.min.js"></script>
    </head>
    <body>
        <div data-role="page">

            <div data-role="header">
                <h1>Test Cat</h1>
            </div><!-- /header -->

            <ul data-role="listview" data-inset="true" data-theme="d" data-divider-theme="e">
                <li data-role="list-divider">Category</li>
                <?php
                $objConnect = mysql_connect("192.168.1.100", "tong", "") or die(mysql_error());

                $objDB = mysql_select_db("cockpit");

                $strSQL = " SELECT a.CategoryID,a.CategoryName,COUNT(b.NewsID) As NumNews FROM

                    category a , news b

                    WHERE a.CategoryID = b.CategoryID

                    GROUP BY a.CategoryID,a.CategoryName

                    ORDER BY a.CategoryID ASC ";



                $objQuery = mysql_query($strSQL) or die(mysql_error());

                while ($objResult = mysql_fetch_array($objQuery)) {
                    ?>

                    <li><a href="news.php?CategoryID=<?= $objResult["CategoryID"]; ?>"><?= $objResult["CategoryName"]; ?> <span class="ui-li-count"><?= $objResult["NumNews"]; ?></span></a></li>

                    <?
                }
                ?>

            </ul>

        </div><!-- /page -->
    </body>
</html>
