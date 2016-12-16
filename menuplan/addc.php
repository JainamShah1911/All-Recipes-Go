<!DOCTYPE html>
<html>
  <head>
    <title>Add to My Menu Plan</title>
    <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

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

    <!-- Form code begins -->
    <form>
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Start Date</label>
        <input class="form-control" id="date" name="startdate"  placeholder="MM/DD/YYYY" type="text"/>
        <label class="control-label" for="date">End Date</label>
        <input class="form-control" id="date" name="enddate"  placeholder="MM/DD/YYYY" type="text"/>
        <input type="text" style="visibility:hidden" name="user_id" value="<?php echo $_GET['user_id'];?>">
        <input type="text" style="visibility:hidden" name="recipe_id" value="<?php echo $_GET['recipe_id'];?>">
        <br/>
        <input name="submit" type="submit" value="Add to My Calander">

      </div>
     </form>
     <!-- Form code ends --> 

    </div>
  </div>    
 </div>
</div>	
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
    $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('form').serialize(),
            success: function () {
            }
          });

        });

      });
</script>
</html>