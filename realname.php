<?php 
$userid=$_POST['userid'];
$realname=$_POST['realname'];
$link = mysqli_connect('rm-uf63l8g53x6u8qmkx.mysql.rds.aliyuncs.com','root','Faderzhrch970627','whatulike2');

    if(mysqli_query($link,"update user set realname='$realname' where userid='$userid'")){
        echo "<script>alert('success');window.location= 'center.php';</script>";
    }else {
        echo "<script>alert('fail');history.go(-1)</script>";
    }
?>