<?php 
include('includes/connect.php');
if(isset($_POST['displaySend'])){
    $table = '<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ลำดับที่</th>
            <th scope="col">ชื่อ-นามสกุล</th>
            <th scope="col">สถานะ</th>
            <th scope="col">จัดการระบบ</th>
        </tr>
    </thead>';
    $sql="SELECT * FROM `tb_user`";
    $result=mysqli_query($conn,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['First_name'];
        $sname =$row['Last_name'];
        $status =$row['Status'];
        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$name. " " .$sname.'</td>
        <td>'.$status.'</td>
        
        <td>
            <button class="btn btn-success"onclick ="GetDetails('.$id.')">Update</button>
            <button class="btn btn-danger" onclick ="DeleteEle('.$id.')">Delete</button>
        </td>
        </tr>';
        $number++;
    }
    $table.='</table>';
    echo $table;
}   

if(isset($_POST['updateid'])){
    $User_id=$_POST['updateid'];

    $sql="Select * from `tb_user` where id=$User_id";
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

//update query  /////////////////////
if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $status=$_POST['updatestatus'];

    $sql="UPDATE `tb_user` SET `Status`='$status' WHERE `id`='$uniqueid'";
    $result=mysqli_query($conn,$sql);
}

if(isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $sql="delete from `tb_user` where id=$unique";
    $result = mysqli_query($conn,$sql);
}