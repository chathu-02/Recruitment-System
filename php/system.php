<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet"  href="../css/system.css">
   
    
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col1">
                    <div class="col2" style="
    margin-bottom: 20px;
">                        <h2 class="pull-left">Employees Details</h2><br><br><hr><br><br>
                        <a href="addemployee.php" class="link1">Add New Employee</a>
                        <a href="login.php" class="link1">Logout</a>
                        
                    </div>
                    <?php
                    require_once "config.php";
            
                    $sql = "SELECT * FROM employee";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Position</th>";
                                        echo "<th >Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['eid'] . "</td>";
                                        echo "<td>" . $row['Ename'] . "</td>";
                                        echo "<td>" . $row['Eaddress'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>" . $row['Eposition'] . "</td>";

                                        
                                        echo "<td><a href='viewemployee.php?id=".$row['eid']."'><input class='view-button' type='submit' value='View'></a>
                                        <a href='deleteemployee.php?id=".$row['eid']."'><input class='view-button' type='submit' value='Delete'></a>
                                        <a href='editemployee.php?id=".$row['eid']."'><input class='view-button' type='submit' value='Edit'></a>
                                        </td>";
                                        
                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <br><br><br><br>
</body>
</html>