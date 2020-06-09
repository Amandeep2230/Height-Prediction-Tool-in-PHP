<!DOCTYPE html>
<html>
<head>
	<title>Height Calculator</title>
	<link rel="stylesheet" href="style.css"/>
  <title>Student Attendance</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-theme.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Height Calculator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
           
          
          </ul>-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <span class="help-block" style="margin-top: 100px;">Note: Height should be entered in cm.</span>
    	
    		<h2 style="padding-top: 5px;">Predicting based on the Parent's Height Only(in cm)</h2>
    		<form style="padding-top: 40px;" action="index.php" method="POST">
    			<label>Mother's Height: </label>
    			<input type="text" name="mother" style="vertical-align: top;"><br><br>
    			<label>Father's Height: </label>
    			<input type="text" name="father" style="vertical-align: top;"><br><br>
    			<label>Gender: </label>
    			<select name="gender">
    				<option value="None">None</option>
    				<option value="Male">Male</option>
    				<option value="Female">Female</option>
    			</select><br><br>
    			<button type="submit" name="submit1" class= "btn btn-primary">Calculate</button><br><br>
    			<?php

    			if (isset($_POST['submit1'])) 
				{
					$mother = $_POST['mother'];
					$father = $_POST['father'];
					$gender = $_POST['gender'];
					if ($gender == 'Male') 
					{
						$child = (($mother+$father)/2)+7.6;
    			?>
    			<label>Child's Height: </label>
    			<input type="text" name="child" readonly value="<?php echo $child; ?>"><br><br>
    			<?php

    		}
    		elseif ($gender == 'Female') 
					{
						$child = (($mother+$father)/2)-7.6;

    			?>
    			<label>Child's Height: </label>
    			<input type="text" name="child" readonly value="<?php echo $child; ?>"><br><br>
    			<?php

    		}
    		else
    		{
    			echo "<script>
				alert('Select Gender');
				window.location.href='index.php';
				</script>";
    		}
    	}
    			?>
    		</form>
    		<hr>

    		<h2 style="padding-top: 25px;">Height Converter(feet/ inches to cm)</h2>
    		<form style="padding-top: 40px;" action="index.php" method="POST">
    			<label>Feet: </label>
    			<input type="text" name="feet"><br><br>
    			<label>Inches: </label>
    			<input type="text" name="inches"><br><br>
    			<button type="submit" name="submit2" class= "btn btn-primary">Calculate</button><br><br>
    			<?php

    			if (isset($_POST['submit2'])) 
    			{

    				$feet = $_POST['feet'];
    				$inches = $_POST['inches'];
    				$ans = ($feet*30.48)+($inches*2.54);
    				
    				if (empty($feet) || empty($inches))
                    {
                        echo "<script>
                alert('Enter Values');
                window.location.href='index.php';
                </script>";
            }
            else 
            {
    			?>

				<label>Height in cm: </label>
    			<input type="text" name="cm" readonly value="<?php echo $ans; ?>"><br><br>

    			<?php
    		}
        }
    			?>
    		</form>
    		<hr>

            <h2 style="padding-top: 25px;">Height Calculator(in cm)</h2>
            <h4 style='margin-top: 30px;'>This is a children's adult height prediction calculator based on parent's and grandparent's height.</h4>
            <form style="padding-top: 40px;" action="index.php" method="POST">
                <label>Father's Height: </label>
                <input type="text" name="f"><br><br>                
                <label>Mother's Height: </label>
                <input type="text" name="m"><br><br>
                <label>Father's Father's Height: </label>
                <input type="text" name="ff"><br><br>
                <label>Father's Mother's Height: </label>
                <input type="text" name="fm"><br><br>
                <label>Mother's Father's Height: </label>
                <input type="text" name="mf"><br><br>
                <label>Mother's Mother's Height: </label>
                <input type="text" name="mm"><br><br>
                <label>Gender: </label>
                <select name="gender">
                    <option value="None">None</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br><br>
                <button type="submit" name="submit3" class= "btn btn-primary">Calculate</button><br><br>
                <?php
                if (isset($_POST['submit3']))
                {   
                    $gender = $_POST['gender'];
                    $f = $_POST['f'];
                    $m = $_POST['m'];
                    $ff = $_POST['ff'];
                    $fm = $_POST['fm'];
                    $mf = $_POST['mf'];
                    $mm = $_POST['mm'];
                    if ($gender == 'Male')
                    {
                        $age = ($f+$m+$ff+$fm+$mf+$mm)/6*1.08+14;
                    ?>

                <label>Child's Height: </label>
                <input type="text" name="child" readonly value="<?php echo $age; ?>"><br><br>

                <?php
                    }

                    elseif ($gender == 'Female')
                    {
                        $age = ($f+$m+$ff+$fm+$mf+$mm)/6*0.92+11.4;

                    ?>
                <label>Child's Height: </label>
                <input type="text" name="child" readonly value="<?php echo $age; ?>"><br><br>
                    
                    <?php
                    }
                    else
                    {
                       echo "<script>
                alert('Select Gender');
                window.location.href='index.php';
                </script>"; 
                    }
                }

                ?>
            </form>
            <hr>
    	</div>
    	
    </div>

    <!--footer-->
    <div style="height: 200px; background-color: #111; color: #fff; font-family: 'Open Sans', sans-serif; padding: 50px; text-align: center;">
        <h5>Developed by Amandeep Singh Bhalla</h5>
    </div>


</body>
</html>
