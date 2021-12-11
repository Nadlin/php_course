<!DOCTYPE html>
<html>
<head>
<style>
    table {
        border-collapse: collapse;
        text-align: center;
    }
    td {
        border: 1px solid black;
        width: 40px;
    }
</style>
</head>
<body>

<?php
echo '<table>';
for($i=1; $i<10; $i++) {
  echo '<tr>';
  for($j=1;$j<10;$j++) {
    echo '<td>'.$i*$j.'</td>';
  }
  echo '</tr>';
}
echo '</table>';
?>
</body>
</html>
