<!DOCTYPE html>
<html>

<head>
    <title>Names</title>
    <style>
    body {
        margin: 14px;
        font-size: 18px;
    }

    .search {
        width: 400px;
        box-align: center;
        border: 1px inset black;
        padding: 5px;
    }

    .results {
        width: 400px;
        box-align: center;
        border: 1px edge black;
        padding: 5px;
    }

    table {
        border: 1px solid black;
    }

    thead {
        font-size: 22px;
        font-weight: bold italic;
        border-bottom: 1px double black;
    }

    tbody {
        font-size: 18px;
    }

    td {
        border-bottom: 1px dashed black;
    }

    tfoot {
        font-size: 14px;
        text-align: right;
        margin-top: 10px;
    }

    .footer {
        font-size: 14px;
        text-align: right;
        border-top: 1px double black;
        margin-top: 20px;
    }
    </style>
</head>

<?php
$srch = "BA%";
$db = new SQLite3('sandbox.db');
?>

<body>
    <div class="search">
        Static search for <?php echo "'",$srch,"'" ?>
    </div>
    <hr />
    <div class="results">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $db->query("select * from namedb where surname like 'Ba%'");
                while ($data = $result->fetchArray()) {
                    ?>
                <tr>
                    <td>
                        <?php echo $data['givenname']; ?>
                    </td>
                    <td>
                        <?php echo $data['surname']; ?>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=2>... retrieved <?php echo date("Y-m-d H:i:s"); ?> </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="footer">
        &copy;<?php echo date("Y") ?> Camille Frantz
    </div>
</body>

</html>