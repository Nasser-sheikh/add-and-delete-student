<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>

    <?php
    // Connect to the database
    $host="localhost";
    $user="root";
    $password="";
    $db="student1";
    $conn = mysqli_connect($host,$user,$password,$db);
  

    //Process the value from form and save it in db
    if (isset($_POST["add"])) {

        //1.Get the data from the form
        $id = $_POST['id'];
        $name = $_POST['name'];
        $country = $_POST['country'];

        //2.SQL query to save the data into db
        $sql = "INSERT INTO student SET id=$id, name='$name', country='$country'";

        //3. Executing query and saving data into db
        $res = mysqli_query($conn, $sql);

        //Refresh the page after adding 
        header("location: index.php");
    }

       //Delet student by name
       //Type the student to delte 
       if (isset($_POST["del"])) {
        //1.Get student name
        $name = $_POST['name'];

        //2.SQL query to delete the student name from db and UI
        $sql2 = "DELETE FROM student WHERE name='$name'";

        //3. Executing query 
        mysqli_query($conn, $sql2);

        //Refresh the page after adding 
        header("location: index.php");
    }
   
    ?>
    <div id="mother">
        <form action="#" method="post">

            <!-- Control Panel -->
            <aside>
                <div id="div">
                    <img src="logo.png" alt="Logo" width="130px">
                    <h3>Admin Panel</h3>
                    <label for="">Student Nubmer:</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">Student Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="">Student Country:</label><br>
                    <input type="text" name="country" id="country"><br><br>
                    <button name="add">Add Student</button>
                    <button name="del">Delete Student</button>
                </div>
            </aside>

            <!-- Student Data -->
            <main>
                <table id="tbl">
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Student Country</th>
                    </tr>
                
                    <?php

                    $sql3 = "SELECT * FROM student";

                    $res = mysqli_query($conn, $sql3);
                    if ($res==TRUE) {
                         $count = mysqli_num_rows($res);//Function to get all the data rows in db
                             if ($count>0) {
                                 while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $country = $row['country'];
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['country']."</td>";
                                 }
                             }
                        }   
                     ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>