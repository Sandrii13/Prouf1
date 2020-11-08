<?php
//Con esto evitamos que un usuario entre si no esta logeado
if(!isset($_SESSION['uname'])){
	header("location: ?url=login");
}

include 'src/templates/header.tpl.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
    <div class="container">
    <!--Insert Task-->
    <h3>Insert a new task:</h3>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Task</th>
                    <th>End date</th>
                </tr>
            </thead>
        <form action="?url=dashboard" method="POST">
            <tbody>
                <tr>
                    <td><input required type="number" name="user" placeholder="Insert a User ID"></td>
                    <td><input required type="text" name="dtn" placeholder="Insert your task"></td>
                    <td><input required type="date" name="date"></td>

                    <td><button type="submit">Done</button></td>
                </tr>
            </tbody>
        </table>
        </form>

    <!--Select Task-->
    <h3>Search tasks by User ID:</h3>
        <hr>
        <form action="?url=dashboard" method="POST">
            <input required type="number" name="id" placeholder="Insert a User ID" >
            
            <button type="submit"> Check</button>
        </form>
        <br>
    <?php
        if(isset($data['tsk'])){
        if(count($data['tsk']) > 0){
    ?>
        <table class="table">
            <thead>
            <tr>
                <th>Task ID</th>
                <th>Task</th>
                <th>User ID</th>
                <th>End date</th>
            </tr>
            </thead> 
    <?php
           
        foreach($data['tsk'] as $valor){
            echo "<tr>";
                foreach($valor as $fields){
                    echo "<td>".$fields."</td>";
                }
                    echo "</tr>";     
        }
    ?>
        </table>
    <?php
        }else{
    ?>
            <script>
            alert("No tasks found.");
            </script>
    <?php
        }
        }
    ?>
    <!--Delete Task-->
    <h3>Finish a task:</h3>
        <hr>
        <table class="table">
            <form action="?url=dashboard" method="POST">
                <input required type="number" name="task" placeholder="Insert Task ID" >
                <button type="submit"> Finish</button>
        </table>
            <br><br><br><br>
        </form>

    </div>
</body>

<?php
include 'src/templates/footer.tpl.php';
?> 