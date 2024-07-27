<?php 
include 'header.php'
?>
<div class="record">
        <h1>All Record</h1>
    </div>
    <?php
    $conn = mysqli_connect("localhost", "root","","crud") or die("Connection Failed.");

    $sql = "SELECT * FROM student JOIN studentclass ON student.sclass = studentclass.cid";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


    if(mysqli_num_rows($result) > 0){
    ?>
    <table>
        <thaed>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDDRESS</th>
            <th>CLASS</th>
            <th>PHONE</th>
            <th class="action1">ACTION</th>
        </thaed>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row["sid"] ?></td>
                <td><?php echo $row["sname"] ?></td>
                <td><?php echo $row["saddress"] ?></td>
                <td><?php echo $row["cname"] ?></td>
                <td><?php echo $row["sphone"] ?></td>
                <td  class="action1">
                    <a href="edit.php?id=<?php echo $row['sid'] ?>" class="action">Edit</a> 
                    <a href="delete-inline.php" class="action">Delete</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    <?php }else{
        echo "<h2>No Record Found</h2>" ;
    } 
    mysqli_close($conn);
    ?>