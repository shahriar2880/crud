<?php include 'header.php'; ?>
<div class="main-content">
    <div>
        <h2>Update Data</h2>
    </div>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed.");

    $stu_id = $_GET['id'];

    $sql = "SELECT * FROM student WHERE sid = $stu_id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="form-control">
                <form class="post-form" action="updatedata.php" method="post">
                    <div class="form-group">
                        <div>
                            <label>Name</label>
                            <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>" />
                            <input type="text" name="sname" value="<?php echo $row['sname'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Address</label>
                            <input type="text" name="saddress" value="<?php echo $row['saddress'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Class</label>
                            
                                <?php

                                $sql1 = "SELECT * FROM  studentclass";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                    echo '<select name="sclass">';
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        if($row['sclass'] == $row1['cid']){
                                            $select = "selected";
                                        }else{
                                            $select = "";
                                        }
                                       echo "<option {$select} value='{$row1['cid']}' >{$row1['cname']}</option>";
                                    }
                                       echo "</select>" ;
                                }
                                        ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>Phone</label>
                            <input type="text" name="sphone" value="<?php echo $row['sphone']?>"/>
                        </div>
                    </div>
                    <input class="submit" type="submit" value="Update">
                </form>
        <?php
        }
    }
        ?>
</div>
</div>