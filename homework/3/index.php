<!--
1.  Напишите скрипт, выводящий таблицу из k случайных чисел с чередованием фона строк из 3 цветов – цвет1, цвет2, цвет3, цвет1, цвет2, цвет3 и т.д.
      а) в один столбец                          б) в n столбцов
-->
<!DOCTYPE html>
<html>
<head>
    <style>
        table, tr, td, th {
            border: 1px solid silver;
            border-collapse: collapse;
        }

        td, th {
            text-align: center;
            padding: 10px 20px;
        }

        table {
            margin-bottom: 20px;
        }

        .red td {background: orangered;}
        .aqua td {background: aqua;}
        .green td {background: olivedrab;}
        .gradient td {color: red;}
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Номер</th>
            <th>Число</th>
        </thead>
        <tbody>
        <?php
            $k = 10; // k случайных чисел
            for ($i=1; $i<=$k; $i++) {
                echo '<tr>';
                echo "<td>$i</td>";
                echo '<td>' . mt_rand (1, 100) . '</td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>

    <table>
        <thead>
        <th>Номер</th>
        <th>Число</th>
        </thead>
        <tbody>
        <?php
        $k = 10; // k случайных чисел
        $color = 'red';
        for ($i=1; $i<=$k; $i++) {
            echo "<tr class=\"$color\">";
            echo "<td>$i</td>";
            echo '<td>' . mt_rand (1, 100) . '</td>';
            echo '</tr>';
            if ($color == 'red') {
                $color = 'aqua';
            } else if ($color == 'aqua'){
                $color = 'green';
            } else {
                $color = 'red';
            }
        }
        ?>
        </tbody>
    </table>

    <table class="gradient">
        <thead>
        <th>Номер</th>
        <th>Число</th>
        </thead>
        <tbody>
        <?php
        $k = 50; // k случайных чисел
        $m = 255/($k-1);
        for ($i=1, $j=0; $i<=$k; $i++, $j+=$m) {
            echo "<tr style=\"background: rgb($j, $j, $j)\">";
            echo "<td>$i</td>";
            echo '<td>' . mt_rand (1, 100) . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <table>
        <?php
        $k = 21; // k случайных чисел
        $n = 3; // n столбцов
        ?>
        <thead>
        <th>Номер</th>
        <th colspan="<?= $n; ?>">Число</th>
        </thead>
        <tbody>
        <?php
        for ($i=1; $i<=$k/$n; $i++) {
            echo '<tr>';
            echo "<td>$i</td>";
            for ($j=0; $j<$n; $j++) {
                echo '<td>' . mt_rand (1, 100) . '</td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>


</body>
</html>
