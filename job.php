<?php 
$userid=$_POST['userid'];
$jobname=$_POST['jobname'];
$link = mysqli_connect('rm-uf63l8g53x6u8qmkx.mysql.rds.aliyuncs.com','root','Faderzhrch970627','whatulike2');

    if(mysqli_query($link,"insert into job(userid,jobname) values('$userid','$jobname')")){
        echo "<script>alert('success');window.location= 'http://v.xiumi.us/board/v5/2YwVo/51728850';</script>";
    }else {
        echo "<script>alert('fail');history.go(-1)</script>";
    }
?>