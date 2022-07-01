<?php
    include ('includes/connect.php');	
    session_start();

    $month_arr = array("","มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ; //กำหนด อาร์เรย์ $month_arr  เพื่อเก็บ ชื่อเดือน ของไทย

    if (isset($_POST['function']) && $_POST['function'] == 'province') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM tb_area WHERE province_id='$id'";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['id'].'">'.$value['name_ar'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM tb_subarea WHERE area_id='$id'";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
        foreach ($query as $value2) {
          echo '<option value="'.$value2['id'].'">'.$value2['name_sub'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'years_datalist') {
        $years = $_POST['years'];
        $sql = "SELECT DISTINCT MONTH(date) FROM tb_show WHERE YEAR(date)=$years";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกเดือน-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['MONTH(date)'].'">'.$value['MONTH(date)'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'years_imglist') {
        $ele_img = $_POST['ele_img'];
        $sql = "SELECT DISTINCT YEAR(date) FROM tb_image WHERE name_ele='$ele_img'";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกปี-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['YEAR(date)'].'">'.$value['YEAR(date)'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'month_imglist') {
        $ele_img = $_POST['ele_img'];
        $years = $_POST['years'];
        $sql = "SELECT DISTINCT MONTH(date) FROM tb_image WHERE name_ele='$ele_img' AND YEAR(date)=$years";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกเดือน-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['MONTH(date)'].'">'.$value['MONTH(date)'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'day_imglist') {
        $ele_img = $_POST['ele_img'];
        $years = $_POST['years'];
        $month = $_POST['month'];
        $sql = "SELECT DISTINCT DAY(date) FROM tb_image WHERE name_ele='$ele_img' AND YEAR(date)=$years AND MONTH(date)=$month";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกวัน-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['DAY(date)'].'">'.$value['DAY(date)'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'time_imglist') {
        $ele_img = $_POST['ele_img'];
        $years = $_POST['years'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $sql = "SELECT DISTINCT timeimg FROM tb_image WHERE name_ele='$ele_img' AND YEAR(date)=$years AND MONTH(date)=$month AND DAY(date)=$day";
        $query = mysqli_query($conn, $sql);
        echo '<option value="" selected disabled>-กรุณาเลือกเวลา-</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['timeimg'].'">'.$value['timeimg'].'</option>';
        }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'show_datalist') {
        $month = $_POST['month'];
        $years = $_POST['years'];
        $sql=" SELECT * FROM tb_show,tb_province,tb_area,tb_subarea WHERE tb_show.province_id=tb_province.id AND tb_show.area_id=tb_area.id AND tb_show.subarea_id=tb_subarea.id AND YEAR(tb_show.date)='$years' AND MONTH(tb_show.date)='$month'";
        $query = mysqli_query($conn, $sql);
        $number = 1;
        echo '
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="26">
                รายงานผลการปรากฎตัวของช้างป่าออกหากินนอกพื้นที่อุทยานแห่งชาติเขาใหญ่
                    ประจำเดือน '.$month_arr[$month].' พ.ศ. '.((int)$years + 543).'
                </th>
            </tr>
            <tr style="text-align:center"; "vertical-align:middle"; >
                <th style="vertical-align:middle" scope="col"  rowspan="2" >ลำดับที่</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">ว/ด/ป</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">เวลา</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">จังหวัด</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">อำเภอ</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">ตำบล</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">จำนวน(ตัว)</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">ชื่อช้าง</th>
                <th scope="col" colspan="2" >ช้างเข้าพิกัด</th>
                <th scope="col" colspan="2" >ช้างออกพิกัด</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">สถานที่</th>
                <th scope="col" colspan="9" >ความเสียหาย</th>
                <th scope="col" colspan="2" >พิกัด ความเสียหาย</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">ผู้บันทึก</th>
                <th style="vertical-align:middle" scope="col"  rowspan="2">หน่วยงาน</th>
            </tr>
            <tr style="text-align:center">
                <th style="vertical-align:middle" scope="col" >E</th>
                <th style="vertical-align:middle" scope="col" >N</th>
                <th style="vertical-align:middle" scope="col" >E</th>
                <th style="vertical-align:middle" scope="col" >N</th>
                <th style="vertical-align:middle" scope="col" >ไม่พบความเสียหาย</th>
                <th style="vertical-align:middle" scope="col" >ทรัพย์สิน</th>
                <th style="vertical-align:middle" scope="col" >กล้วย</th>
                <th style="vertical-align:middle" scope="col" >อ้อย</th>
                <th style="vertical-align:middle" scope="col" >ข้าวโพด</th>
                <th style="vertical-align:middle" scope="col" >มะพร้าว</th>
                <th style="vertical-align:middle" scope="col" >ขนุน</th>
                <th style="vertical-align:middle" scope="col" >หมาก</th>
                <th style="vertical-align:middle" scope="col" >อื่นๆ</th>
                <th style="vertical-align:middle" scope="col">E</th>
                <th style="vertical-align:middle" scope="col">N</th>
            </tr>
        </thead>
        ';
            foreach ($query as $value)  {
                echo '<tbody>
                <tr scope="row">
                <th scope="row">'.$number.'</th>
                <td>'.show_tdate($value["date"]).'</td>
                <td>'.$value["time"].'</td>
                <td>'.$value["name_pr"].'</td>
                <td>'.$value["name_ar"].'</td>
                <td>'.$value["name_sub"].'</td>
                <td>'.$value["num_ele"].'</td>
                <td>'.$value["ele_name"].'</td>
                <td>'.$value["location_in_y"].'</td>
                <td>'.$value["location_in_x"].'</td>
                <td>'.$value["location_out_y"].'</td>
                <td>'.$value["location_out_x"].'</td>
                <td>'.$value["location"].'</td>
                <td>'.$value["no_damage"].'</td>
                <td>'.$value["property"].'</td>
                <td>'.$value["banana"].'</td>
                <td>'.$value["sugarcane"].'</td>
                <td>'.$value["sweetcorn"].'</td>
                <td>'.$value["coconut"].'</td>
                <td>'.$value["jackfruit"].'</td>
                <td>'.$value["mak"].'</td>
                <td>'.$value["other"].'</td>
                <td>'.$value["location_damage_E"].'</td>
                <td>'.$value["location_damage_N"].'</td>
                <td>'.$value["name_user"].'</td>
                <td>'.$value["agency"].'</td>
                </tr></tbody>';
                ++$number;
            }
        exit();
    }

    if (isset($_POST['function']) && $_POST['function'] == 'show_imglist') {
        $ele_img = $_POST['ele_img'];
        $years = $_POST['years'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $timeimg = $_POST['time'];
        $sql = "SELECT image FROM tb_image WHERE name_ele='$ele_img' AND YEAR(date)=$years AND MONTH(date)=$month AND DAY(date)=$day AND timeimg='$timeimg'";
        $query = mysqli_query($conn, $sql);
        $number = 1;
        echo '
        <thead class="thead-dark">
            <tr>
                <th style="text-align:center" scope="col" colspan="2">
                    '.$ele_img.'
                </th>
            </tr>
        </thead>
        ';
        // echo '<tbody>';
        foreach ($query as $value)  {
            echo '<tbody>
            <tr scope="row" >
            <th scope="row" width="10%" >'.$number.'</th>
            <td><img src= "uploads/'.$value["image"].'" width="20%" alt=""></td>
            </tr> </tbody>';
            ++$number;
        }
        // echo '</tbody>';
        exit();
    }

    if(isset($_POST['updateid'])){
        $User_id=$_POST['updateid'];
    
        $sql="Select * from `tb_user` where `id`='$User_id'";
        $result=mysqli_query($conn,$sql);
        $response=array();
        while($row=mysqli_fetch_assoc($result)){
            $response=$row;
        }
        echo json_encode($response);
    }else{
        $response['status']=200;
        $response['message']="Inavalid or data not found";
    }

    if(isset($_FILES['upload'])){
        $date = ($_POST['date']);
        $time = "{$_POST["time"]}น.";
        $province_id = ($_POST['province']);
        $area_id = ($_POST['amphures']);
        $subarea_id = ($_POST['districts']);
        $num_ele = ($_POST['num_ele']);
        $ele_name = ($_POST['name_ele']);
        $location_in_x = ($_POST['location_in_N']);
        $location_in_y = ($_POST['location_in_E']);
        $location_out_x = ($_POST['location_out_N']);
        $location_out_y = ($_POST['location_out_E']);
        $location = ($_POST['location']);
        $x = ($_POST['N']);
        $y = ($_POST['E']);

        // $sqlcount = "SELECT `name` COUNT FROM `tb_elephant` WHERE `name` = '$ele_name'";
        // $rescount = mysqli_query($conn, $sqlcount);
        // $count = mysqli_num_rows($rescount);
        // if($count == 0){
        //         $sqladdelephant = "INSERT INTO `tb_elephant`(`id`, `name`) VALUES (NULL,'$ele_name')";
        //         mysqli_query($conn, $sqladdelephant);
        // }

        // for ($i=1; $i < 10; $i++) { 
        //     if($_POST[$i] != 'on'){
        //         $_POST['text_'.$i.''] = "";
        //     }
        // }

        if($_POST['1'] != 'on'){
            $_POST['text_1'] = "";
        }
        
        print_r($_POST['text_1']);
        
        $nameele="";
        $damage = "";
        $numele=0;
        if($ele_name != NULL){
            foreach ($ele_name as $key => $value) {
                print_r($ele_name[$key]);
                $sql_add = "INSERT INTO `tb_show`(`id`, `name_user`, `agency`, `date`, `time`, `province_id`, `area_id`, `subarea_id`, `num_ele`, `ele_name`, `location_in_x`, `location_in_y`, `location_out_x`, `location_out_y`, `location`, `no_damage`, `property`, `banana`, `sugarcane`, `sweetcorn`, `coconut`, `jackfruit`, `mak`, `other`, `location_damage_E`, `location_damage_N`)
                                        VALUES ( NULL, '{$_SESSION["fname"]} {$_SESSION["lname"]}', '{$_SESSION["agency"]}', '$date', '$time', '$province_id', '$area_id', '$subarea_id', '$num_ele', '$value', '$location_in_x', '$location_in_y', '$location_out_x', '$location_out_y', '$location', '{$_POST['text_1']}', '{$_POST['text_2']}', '{$_POST['text_3']}', '{$_POST['text_4']}', '{$_POST['text_5']}', '{$_POST['text_6']}', '{$_POST['text_7']}', '{$_POST['text_8']}', '{$_POST['text_9']}', '$y', '$x')";
                mysqli_query($conn,$sql_add) or die ("Error in query: $sql_add " . mysqli_error());
                $nameele .=" '$value' ";
                $numele+=$num_ele;
                
            }
        }
        
        if($_POST['insert_ele'] != NULL){
            $sqlcount = "SELECT `name` COUNT FROM `tb_elephant` WHERE `name` = '{$_POST['insert_ele']}'";
            $rescount = mysqli_query($conn, $sqlcount);
            $count = mysqli_num_rows($rescount);
            if($count == 0){
                    $sqladdelephant = "INSERT INTO `tb_elephant`(`id`, `name`) VALUES (NULL,'$ele_name')";
                    mysqli_query($conn, $sqladdelephant);
            }

            $sql_add = "INSERT INTO `tb_show`(`id`, `name_user`, `agency`, `date`, `time`, `province_id`, `area_id`, `subarea_id`, `num_ele`, `ele_name`, `location_in_x`, `location_in_y`, `location_out_x`, `location_out_y`, `location`, `no_damage`, `property`, `banana`, `sugarcane`, `sweetcorn`, `coconut`, `jackfruit`, `mak`, `other`, `location_damage_N`, `location_damage_E`)
                        VALUES ( NULL, '{$_SESSION["fname"]} {$_SESSION["lname"]}', '{$_SESSION["agency"]}', '$date', '$time', '$province_id', '$area_id', '$subarea_id', '{$_POST['inset_num_ele']}', '{$_POST['insert_ele']}', '$location_in_x', '$location_in_y', '$location_out_x', '$location_out_y', '$location', '{$_POST['text_1']}', '{$_POST['text_2']}', '{$_POST['text_3']}', '{$_POST['text_4']}', '{$_POST['text_5']}', '{$_POST['text_6']}', '{$_POST['text_7']}', '{$_POST['text_8']}', '{$_POST['text_9']}', '$x', '$y')";
            mysqli_query($conn,$sql_add) or die ("Error in query: $sql_add " . mysqli_error());

            $nameele .= " '" + $_POST['insert_ele'] + "' ";
            $numele+=$_POST['inset_num_ele'];
        }

        foreach($_FILES['upload']['tmp_name'] as $key => $value){
            $file_name = $_FILES['upload']['name'];
            $new_name = $file_name[$key];
            if(move_uploaded_file($_FILES['upload']['tmp_name'][$key],"img/uploads/".$new_name)){
                    $sqlimage = "INSERT INTO `tb_image`(`id`, `name_ele`, `date`, `timeimg`, `image`)
                                VALUES (NULL, '$nameele','$date','$time', '$new_name')";
                mysqli_query($conn, $sqlimage);
            }
        }

        $sql = "SELECT `name_pr` FROM `tb_province` WHERE `id` = '$province_id'";
        $res = mysqli_query($conn, $sql);
        $province="";
        foreach ($res as $value){
            $province = $value['name_pr'];
        }
        $sql = "SELECT `name_ar` FROM `tb_area` WHERE `id` = '$area_id'";
        $res = mysqli_query($conn, $sql);
        $area="";
        foreach ($res as $value){
            $area = $value['name_ar'];
        }
        $sql = "SELECT `name_sub` FROM `tb_subarea` WHERE `id` = '$subarea_id'";
        $res = mysqli_query($conn, $sql);
        $subarea="";
        foreach ($res as $value){
            $subarea = $value['name_sub'];
        }

        $date = show_tdate($date);
        if($_POST['1'] == 'on'){
            $damage = "เบื้องต้นไม่พบความเสียหาย ";
        }
        else{
            $damage = "เบื้องต้นพบ";
            for ($i=2; $i < 10; $i++) { 
                if($_POST["$i"] == 'on'){
                    $sql = "SELECT `damage` FROM `tb_damage` WHERE `id` = '$i'";
                    $res = mysqli_query($conn, $sql);
                    $txt = "text_$i";
                    foreach ($res as $value)  {
                        $damage .= " {$value['damage']} {$_POST["$txt"]}";
                    }
                }
            }
        }
        
        $coordinates = "";
        if($x != 0 && $y != 0){
            $coordinates = "พิกัดความเสียหาย $x, $y";
        }
        
        $token = "G0lqw73joxZ1Si2e4MuPOfb50puNSm3KyK3k1jlfpQr" ; // LINE Token
        //Message
        $mymessage = "\nเรียนหัวหน้าอุทยานแห่งชาติเขาใหญ่\n\n"; //Set new line with '\n'
        $mymessage .= "{$_SESSION["agency"]} เมื่อวันที่ $date ออกตรวจเฝ้าระวังและผลักดันช้างป่าออกหากินออกนอกเขตพื้นที่อุทยานแห่งชาติเขาใหญ่";
        $mymessage .= "บริเวณท้องที่ $location ต.$subarea อ.$area จ.$province\n\n";
        $mymessage .= "เวลา $time พบช้างป้า $numele ตัว ($nameele) ออกมาหากินนอกเขตอุทยานฯบริเวณท้องที่ $location $coordinates $damage \n\n";
        $mymessage .= "{$_SESSION["fname"]} {$_SESSION["lname"]}\n";
        $mymessage .= "{$_SESSION["rank"]}\n";
        $mymessage .= "ผู้รายงาน\n";
        $imageFile = new CURLFILE('img/uploads/2_4.png'); // Local Image file Path
        // $sticker_package_id = '2';  // Package ID sticker
        // $sticker_id = '34';    // ID sticker
        $data = array (
            'message' => $mymessage,
            'imageFile' => $imageFile
            // 'stickerPackageId' => $sticker_package_id,
            // 'stickerId' => $sticker_id
        );
        
        // line_notification($token,$data);

        header("Location: add_data.php");

        exit();
    }

    if(isset($_POST['function']) == 'LineNoti'){
        $sql = "SELECT * FROM `tb_show` WHERE `date` = SUBSTRING(DATE_ADD(NOW(), INTERVAL -1 DAY), 1, 10)";
        $query = mysqli_query($conn, $sql);

            $token = "G0lqw73joxZ1Si2e4MuPOfb50puNSm3KyK3k1jlfpQr" ; // LINE Token
            //Message
            $mymessage = "เรื่อง: ทดสอบส่งข้อความ \n"; //Set new line with '\n'
            $mymessage .= "จาก: ข้อความจากแมว \n";
            $mymessage .= "รายละเอียด: แมวหิวแล้วจ้า";
            $imageFile = new CURLFILE('uploads/2_4.png'); // Local Image file Path
            $sticker_package_id = '2';  // Package ID sticker
            $sticker_id = '34';    // ID sticker
            $data = array (
                'message' => $mymessage,
                'imageFile' => $imageFile,
                'stickerPackageId' => $sticker_package_id,
                'stickerId' => $sticker_id
            );
            // line_notification($token,$data);

        header("Location: home.php");
    }

    function line_notification($token,$data){
        $chOne = curl_init();
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $chOne, CURLOPT_POST, 1);
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $chOne );
        //Check error
        if(curl_error($chOne)) { 
            echo 'error:' . curl_error($chOne); 
        }
        else {
            $result_ = json_decode($result, true);
            echo "status : ".$result_['status']; echo "message : ". $result_['message']; 
        }
        //Close connection
        curl_close( $chOne );
    }
    
    function  show_tdate($date_in) // กำหนดชื่อของฟังชั่น show_tdate และสร้างตัวแปล $date_in ในการรับค่าที่ส่งมา
    {
        $month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ; //กำหนด อาร์เรย์ $month_arr  เพื่อเก็บ ชื่อเดือน ของไทย

        // ใช้ฟังชั่น strtok เพื่อแยก ปี เดือน วัน
        // โดยเริ่มจาก ปีก่อน
        $tok = strtok($date_in, "-"); //สร้างตัวแปล $tok เพื่อเก็บค่าแยกของปี ออกมา
        $year = $tok ; //กำหนดค่าให้ ตัวแปล $year มีค่าเท่ากับ ปีที่ ถูกแยกออกมาจาก ตัวแปล $tok 

        //ต่อไปคือส่วนของ เดือน
        $tok  = strtok("-");// ส่วนนี้เราจะมีไว้เพื่อทำการแยกเดือน
        $month = $tok ;//สร้างตัวแปล$monthเพื่อเก็บค่าแยกของเดือน ออกมา
        // 

        //ต่อไปส่วนสุดท้ายคือ ส่วนของวันที่
        $tok = strtok("-");//ส่วนนี้เราจะมีไว้เพื่อทำการแยกเดือน
        $day = $tok ;//สร้างตัวแปล $$dayเพื่อเก็บค่าแยกของเดือน ออกมา

        //เมื่อได้ส่วนแยกของ วัน เดือน ปี มาแล้วว แต่ ปี ยังเป็นรูปแบบของ ค.ศ. ดังนั้นเราต้องแปล เป็น พ.ศ.  ก่อนด้ววิธีกรนนี้

        $year_out = $year + 543 ;// สร้างตัวแแปลขึ้นมาเพื่อเก็บค่าที่ได้จากการนำปี ค.ศ. มาบวกกับ 543  ก็จะได้ปีที่เป็น  พ.ศ. ออกมา

        $cnt = $month-1 ;// เราตัองสร้างตัวแปล มาเพื่อเก็บค่าเดือน โดยจะต้องเอาเดือนที่ได้มา ลบ 1 เพราะว่า เราจะต้องใช้ในการเทียบกับ ค่าที่อยู่ได้อาร์เรย์ เนื่องจาก อาร์เรย์จะมีค่า เริ่มจาก 0
        $month_out = $month_arr[$cnt] ;// ทำการเทียบค่าเดือนที่ได้กับเดือนที่เก็บไว้ในอาร์เรย์ แล้วเก็บลงใน ตัวแปล


        $t_date = $day." ".$month_out." ".$year_out ; // สร้างตัวแปลเก็บค่า วัน เดือน ปี ที่แปลเป็นไทยแล้ว

        return $t_date ;// ส่งค่ากลับไปยังส่วนที่ส่งมา
    }

     
    // Check if the user is logged in, if not then redirect him to login page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if($_SESSION["status"] == "User"){
            header("Location: add_data.php");
        }
        elseif($_SESSION["status"] == "Admin"){
            header("Location: home.php");
        }
        exit();
    }else {
        header("Location: login.php");
        exit();
    }

    //////////////////////////////////////////////////////////////////////
    
    

    if(isset($_POST['deletesend'])){
        $unique=$_POST['deletesend'];
    
        $sql = "DELETE FROM `tb_user` WHERE id=$unique";
        
        $result = mysqli_query($conn,$sql);
    }
