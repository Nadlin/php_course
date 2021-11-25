<!--

-->
<!DOCTYPE html>
<html>
<head>
    <style>
        table, tr, td {
            border: 1px solid silver;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        <?php
            for ($i=1; $i<=10; $i++) {
                echo '<tr>';
                    for ($j=1; $j<=10; $j++) {
                        echo '<td>'. $i*$j . '</td>';
                    }
                echo '</tr>';
            }
        ?>
    </table>

</body>
</html>
