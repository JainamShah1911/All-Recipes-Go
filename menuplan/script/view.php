<!DOCTYPE html>
<html>
  <head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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
    <title>All Recipe Meal Planner</title>
    <!--  jQuery -->
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>-->
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<body>
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">

    <form action="view.php" method="get">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Start Date</label>
        <input class="form-control" id="date" name="startdate"  placeholder="MM/DD/YYYY" type="text"/>
        <label class="control-label" for="date">End Date</label>
        <input class="form-control" id="date" name="enddate" placeholder="MM/DD/YYYY" type="text"/>
        <input type="text" style="visibility:hidden" name="user_id" value="<?php 
        if (isset($_GET['id'])) {
        
          echo $_GET['id']; }?>">


        <br/>
        <input type="submit" value="View My Plans">

      </div>
     </form>
     <!-- Form code ends --> 
<div id="txtHint"><b></b></div>	
    </div>
  </div>    
 </div>
</div>	
<?php
if (isset($_GET['startdate']) && isset($_GET['enddate'])){
  $start_date = (string)$_GET['startdate'];
  $end_date = (string)$_GET['enddate'];
    require('../../wp-blog-header.php');
     $user_id = (string)$_GET['user_id'];
  // $user_id = (string)get_current_user_id();

//  echo $user_id;
  //$q = '2016-11-10 00:00:00';
  //echo $q;


      $servername = "localhost:3306";
      $username = "root";
      $password = "";
      $dbname = "allrecipe";

      // Create connection
        $con = mysqli_connect($servername, $username, $password, $dbname);
      
      $sql = "SELECT * 
          FROM menu_planer
          WHERE start_date >=  '$start_date'
          AND end_date <=  '$end_date'
          AND user_id = '$user_id'";

      $result = mysqli_query($con,$sql);
      echo "<table class='table-striped'>
          <tr>
            <th>Recipe</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>"; 
      while($row = mysqli_fetch_array($result)) 
      {

        $post_id = $row["recipe_id"];
        echo "<tr>";
        //echo "<td>" .$post_id. "</td>";
        echo "<td><a target='_blank' href='".get_permalink($post_id)."'>".get_the_title($post_id)."</td>";
        echo "<td>".$row["start_date"]."</td>";
        echo "<td>".$row["end_date"]."</td>";
        echo "</tr>";
      }
      echo "</table>";
      mysqli_close($con);
}
  ?>
</body>
<script>
    $(document).ready(function(){
        var sdate_input=$('input[name="startdate"]'); //our date input has the name "date"
        var edate_input=$('input[name="enddate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        sdate_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
			orientation:"top right",
            todayHighlight: true,
            autoclose: true,
        })
        edate_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
			orientation:"top right",
            todayHighlight: true,
            autoclose: true,
        })
    });
</script>
</html>