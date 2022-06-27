<?php
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/connect.php');
?>
    <div class="table-responsive text-nowrap">
        <?php
            $sql = "SELECT * FROM `tb_user`";
            $query = mysqli_query($conn, $sql);
        ?>
        <table class="table table-striped" width="100%" border= "0" cellpadding="0" cellspacing="0" style="text-align:center"; "vertical-align:middle"; >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ลำดับที่</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">จัดการระบบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query) > 0){
                        $number = 1;
                        while($row = mysqli_fetch_assoc($query)){

                ?>
                <tr>
                    <th><?=$number?></th>
                    <td><?="{$row['First_name']} {$row['Last_name']}"?></td>
                    <td><?=$row['Status']?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal" onclick ="GetDetails(<?=$row['id']?>)">Update</button>
                        <button type="submit" class="btn btn-danger" onclick ="DeleteEle(<?=$row['id']?>)">Delete</button>
                    </td>
                </tr>

                <?php
                            $number++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="completename">ชื่อ-นามสกุล</label>
                    <input type="name" class="form-control" id="updatename" placeholder="Enter name" readonly>
                </div>
                <div class="form-group">
                    <label for="completename">สถานะ</label>
                    <!-- <input type="name" class="form-control" id="updatstatus" placeholder="Enter status"> -->
                    <select name="" class="form-control selectpicker">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
					</select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="updateDetaisls()" >Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="hiddendata">
            </div>
            </div>
        </div>
    </div>

<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>