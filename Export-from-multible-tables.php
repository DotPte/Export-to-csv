<?php if (isset($_POST)) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=export.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('sep=;'));
    fputcsv($output, array('Search engine', 'Why', 'Useful'));
	  $con = mysqli_connect('Server', 'Username', 'Password', 'database');
    $rows = mysqli_query($con, "SELECT table1.row1, table2.row3, table3.row5, table2.row1 FROM table1 ");
    INNER JOIN table2 ON table1.row1 = table2.row2
    INNER JOIN table3 ON table1.row5 = table3.row4
    while ($row = mysqli_fetch_assoc($rows)) {
    fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
    exit();
  }
?>
