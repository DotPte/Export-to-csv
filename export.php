<?php if (isset($_POST)) {

    header('Content-Type: text/csv; charset=utf-8');
    
// filename specifies name you want to file be named when exporting/downloading csv file
    header('Content-Disposition: attachment; filename=export.csv');

    $output = fopen('php://output', 'w');

// this is where you name first row of the csv see readme.md
   fputcsv($output, array('sep=;'));
   fputcsv($output, array('Search engine', 'Why', 'Useful'));
	
// connecting to server exsamble ('localhost', 'User', 'mypassword', 'DefaultDataBase');
    $con = mysqli_connect('Server', 'Username', 'Password', 'database');

// this specifies rows you want to include to the csv
// after "SELECT you name columns you want and after FROM table you want to export
// if you want to export all columns use SELECT *
    
    $rows = mysqli_query($con, "SELECT search engine, useful, why FROM search engines ");

    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
    exit();
  }
?>

