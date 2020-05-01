<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<?php include "nav.php";?>
<div class="row">
<br><br><br>
    <div class="col-md-6 col-md-offset-3">
        <h3 align="center">Submitted Feedbacks</h3>

        <?php if (isset($_GET['courses'])){ $student=$_GET['courses'];
        $ct = 1;
        $dbquery = "SELECT * FROM uploads WHERE userid='$student' ";
        $result =  mysqli_query($serverconnect,$dbquery);
        echo '<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Submitted Courseworks</th>
    </tr>
    </thead>';
        while($row = mysqli_query($result)) {
            echo '<tbody>
    <tr>
        <th scope="row">'.$ct.'</th>
        <td><a href="">';$needful=$row['userid'];
            echo "<a href='viewspec.php?s=".$needful."' class='list-group-item'style=\"text-align: center\">".$row['courseworktitle']."</a>";
            echo '</a></td>
    </tr>';
            $ct++;
        }
        echo '</tbody></table>
        
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal">
            <fieldset><legend>'; echo $_GET['courses'];}?>
        </legend>
        <div class="form-group">
                        <label for="feedback">Feedback Report:</label>
                        <textarea class="form-control" rows="8" disabled>
                         <?php
                         if (isset($_GET['submit'])){$need=$_GET['submit'];
                             $rpt = "SELECT textarea FROM uploads WHERE userid='$need'";
                             $repo=mysqli_fetch_assoc($serverconnect, $rpt);
                             $repo = mysqli_fetch_array($repo);
                             if (mysqli_num_rows($repo)){
                                 echo $repo['texta'];}
                             else{
                                 echo "No submission seen";
                             }
                         }?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='submit.php'" enabled value="return"/>
                    </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>