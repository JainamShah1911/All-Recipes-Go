<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$start_date = (string)$_GET['startdate'];
$end_date = (string)$_GET['enddate'];
//$q = '2016-11-10 00:00:00';
//echo $q;
require('../../wp-blog-header.php');

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "allrecipe";

    // Create connection
      $con = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql = "SELECT * 
        FROM menu_planer
        WHERE start_date >=  '$start_date'
        AND end_date <=  '$end_date'";

    $result = mysqli_query($con,$sql);
    echo "<table>
        <tr>
          <th>Recipe</th>
        </tr>";
    while($row = mysqli_fetch_array($result)) 
    {

      $post_id = $row["recipe_id"];
      echo "<tr>";
      //echo "<td>" .$post_id. "</td>";
      echo "<td><a href='".get_permalink($post_id)."'>".get_the_title($post_id)."</td>";
      echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);

?>
</body>
</html>