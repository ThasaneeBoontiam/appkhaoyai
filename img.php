<?php
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/connect.php');

    $mysql="SELECT DISTINCT name_ele FROM tb_image";
    $query=mysqli_query($conn,$mysql);
?>

    <h2 align="center">รูปภาพช้าง</h2>
    <div class="table-responsive">
        <table  width="100%" border= "0">
            <tr>
                <td>
                    <label>ช้าง:</label>
                        <select name="ele_imglist" id="ele_imglist">
                            <option value="" selected disabled>-กรุณาเลือกช้าง-</option>
                            <?php foreach ($query as $value) { ?>
                                <option value="<?=$value['name_ele']?>"><?=$value['name_ele']?></option>
                            <?php } ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>
                <label>ปี:</label>
                        <select name="years_imglist" id="years_imglist" >
                    </select>
                    <label>เดือน:</label>
                        <select name="month_imglist" id="month_imglist" >
                    </select> 
                </td>
            </tr>
            <tr>
                <td>
                <label>วัน:</label>
                        <select name="day_imglist" id="day_imglist" >
                    </select>
                    <label>เวลา:</label>
                        <select name="time_imglist" id="time_imglist" >
                    </select>
                </td>
            </tr>
        </table>
        </div>
        <br>
        <div class="table-responsive text-nowrap">
            <table border= "1" cellpadding="0" cellspacing="0" style="text-align:center"; "vertical-align:middle"; class="table table-striped" id="out_imglist">
                
            </table>
        </div>
    </div>

<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>