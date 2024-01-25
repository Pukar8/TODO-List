<?php
$conn = mysqli_connect("localhost", "root", "", "todo", 3307);
if(isset($_POST['submit'])){
    $task=$_POST['task'];
    $sql="INSERT INTO tasks(Task) VALUES ('$task')";
    $query0 = mysqli_query($conn, $sql);
    if ($query0) {
    
        echo "Data Inserted Successfully.";
    } else {
        echo mysqli_error($conn); 
    }
}

?>
<html>
    <head>
        <title> TODO List</title>
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    </head>
<style>
    .header {
    width: 55%;
    margin: 30px auto;
    text-align: center;
    color: #6b8e23;
    border: 2px solid #6b8e24;
    border-radius: 20px;
}
form{
    width: 55%;
    margin: 30px auto;
    border-radius:5px;
    padding: 10px;
    border:1px solid #6b8e24;
}
input[type=text]{
    width:75%;
height:15px;
padding: 10px;
border: 2px  solid#6b8e24 ;

}
input[type=submit]{
  
height:40px;
padding: 10px;
border: 2px  solid#6b8e24 ;
border-radius:5px;

}
table{
    width:55%;
    margin: 30px auto;
    border-collapse: collapse;
}
    
tr{
    border-bottom: 1px solid burlywood;
}
th{
    font-size: 20px;
    color:#6b8e24

}
th,td{
    border:none;
    height:30px;
    padding:2px;
}
tr:hover{
    background: #E9E9E9;
}
.task-to-do{
    text-align: left;
}
.delete{
    text-align :center;
}
.delete a{
    color:white;
    background-color: #a52a2a;
    padding: 1px 6px;
    border-radius:3px;
    text-decoration: none;
}

</style>
<body>
    <div class="header">
        <h1>Todo List</h1>
    </div>
    <form method="Post"action="index.php" >
        <input type="text" name="task" >
        <input type="submit" value="Addtask" name="submit">

    </form>
    <table border="2">
<tr>
    <th> N</th>
    <th> Task</th>
    <th> Action</th>
</tr>
<?php
$t=mysqli_query($conn,"SELECT * FROM tasks");
       while($row=mysqli_fetch_array($t)){

       ?>
<tr>
    <td><?php echo $row['ID']; ?></td>
    <td class="task-to-do"><?php echo $row['Task']; ?> </td>
    <td class="delete"><a href="#">x</a></td>
</tr>
<?php
            }
        
        ?>
</table>
<body>
</html>
