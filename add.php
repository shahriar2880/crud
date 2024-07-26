<?php include 'header.php'; ?>
<div class="main-content">
    <div>
        <h2>Add New Record</h2>
    </div>
    <div class="form-control">
        <form class="post-form" action="savedata.php" method="post">
            <div class="form-group">
                <div>
                <label>Name</label>
                <input type="text" name="sname" required/>
                </div>
            </div>
            <div class="form-group">
               <div>
               <label>Address</label>
               <input type="text" name="saddress" required/>
               </div>
            </div>
            <div class="form-group">
                <div>
                <label>Class</label>
                <select name="class" required>
                    <option value="" selected disabled>Select Class</option>
                    <?php
                    $conn = mysqli_connect("localhost", "root","","crud") or die("Connection Failed.");

                    $sql = "SELECT * FROM  studentclass";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_assoc($result)){

                    
                    ?>
                    <option value="<?php echo $row['cid'] ?>"><?php echo $row['cname'] ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <div>
                <label>Phone</label>
                <input type="text" name="sphone" required/>
                </div>
            </div>
            <input class="submit" type="submit" value="Save">
        </form>
    </div>
</div>