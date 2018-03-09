<?php 
$con=mysqli_connect('rm-uf63l8g53x6u8qmkx.mysql.rds.aliyuncs.com','root','Faderzhrch970627','whatulike2');
if(isset($_COOKIE['whatulike_userid'])){
    $userid=$_COOKIE['whatulike_userid'];
    //$row = mysqli_fetch_all($query);
    //$row_num=mysqli_num_rows($query);
}else{ 
    mysqli_query($con,"insert into user(realname) values('我')");
    $userid=mysqli_insert_id($con);
    /*sql .= "SELECT SCOPE_IDENTITY()";
 
  // 执行多个 SQL 语句
    if (mysqli_multi_query($con,$sql))
    {
        do
        {
            // 存储第一个结果集
            if ($result=mysqli_store_result($con))
            {
                while ($row=mysqli_fetch_row($result))
                {
                    $userid=$row[0];
                }
                mysqli_free_result($result);
            }
        }
        while (mysqli_next_result($con));
    }*/
    setcookie("whatulike_userid",$userid,time()+3600*24*3); 
}
$query=mysqli_query($con,"SELECT realname FROM user WHERE userid = '$userid'");
$row = mysqli_fetch_array($query);  
$realname=$row['realname'];
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Cache-Control" content="no-transform" /> 
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />

<script src="md5.js"></script> 
  <meta charset="UTF-8">
  <title>你内心热爱的</title>
  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-weight: 300;
    }
    body {
      font-family: 'Source Sans Pro', sans-serif;
      color: white;
      font-weight: 300;
    }
    body ::-webkit-input-placeholder {
      /* WebKit browsers */
      font-family: 'Source Sans Pro', sans-serif;
      color: white;
      font-weight: 300;
    }
    body :-moz-placeholder {
      /* Mozilla Firefox 4 to 18 */
      font-family: 'Source Sans Pro', sans-serif;
      color: white;
      opacity: 1;
      font-weight: 300;
    }
    body ::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      font-family: 'Source Sans Pro', sans-serif;
      color: white;
      opacity: 1;
      font-weight: 300;
    }
    body :-ms-input-placeholder {
      /* Internet Explorer 10+ */
      font-family: 'Source Sans Pro', sans-serif;
      color: white;
      font-weight: 300;
    }
    .wrapper {
      background: #50a3a2;
      background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
      background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
      position: absolute;
      left: 0;
      width: 100%;
      height: 100%;
    /*  margin-top: -200px;*/
      overflow: hidden;
    }
    .wrapper.form-success .container h1 {
      -webkit-transform: translateY(85px);
              transform: translateY(85px);
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 80px 0;
      padding-top:200px; 
      height: 400px;
      text-align: center;
    }
    .container h1 {
      font-size: 40px;
      -webkit-transition-duration: 1s;
              transition-duration: 1s;
      -webkit-transition-timing-function: ease-in-put;
              transition-timing-function: ease-in-put;
      font-weight: 200;
    }
    form {
      padding: 20px 0;
      position: relative;
      z-index: 2;
    }
    form input {
      -webkit-appearance: none;
         -moz-appearance: none;
              appearance: none;
      outline: 0;
      border: 1px solid rgba(255, 255, 255, 0.4);
      background-color: rgba(255, 255, 255, 0.2);
      width: 250px;
      border-radius: 3px;
      padding: 10px 15px;
      margin: 0 auto 10px auto;
      display: block;
      text-align: center;
      font-size: 18px;
      color: white;
      -webkit-transition-duration: 0.25s;
              transition-duration: 0.25s;
      font-weight: 300;
    }
    form input:hover {
      background-color: rgba(255, 255, 255, 0.4);
    }
    form input:focus {
      background-color: white;
      width: 300px;
      color: #53e3a6;
    }
    form button {
      -webkit-appearance: none;
         -moz-appearance: none;
              appearance: none;
      outline: 0;
      background-color: white;
      border: 0;
      padding: 10px 15px;
      color: #53e3a6;
      border-radius: 3px;
      width: 125px;
      cursor: pointer;
      font-size: 18px;
      -webkit-transition-duration: 0.25s;
              transition-duration: 0.25s;
    }
    form button:hover {
      background-color: #f5f7f9;
    }
    .bg-bubbles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }
    .bg-bubbles li {
      position: absolute;
      list-style: none;
      display: block;
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.15);
      bottom: -160px;
      -webkit-animation: square 25s infinite;
      animation: square 25s infinite;
      -webkit-transition-timing-function: linear;
      transition-timing-function: linear;
    }
    .bg-bubbles li:nth-child(1) {
      left: 10%;
    }
    .bg-bubbles li:nth-child(2) {
      left: 20%;
      width: 80px;
      height: 80px;
      -webkit-animation-delay: 2s;
              animation-delay: 2s;
      -webkit-animation-duration: 17s;
              animation-duration: 17s;
    }
    .bg-bubbles li:nth-child(3) {
      left: 25%;
      -webkit-animation-delay: 4s;
              animation-delay: 4s;
    }
    .bg-bubbles li:nth-child(4) {
      left: 40%;
      width: 60px;
      height: 60px;
      -webkit-animation-duration: 22s;
              animation-duration: 22s;
      background-color: rgba(255, 255, 255, 0.25);
    }
    .bg-bubbles li:nth-child(5) {
      left: 70%;
    }
    .bg-bubbles li:nth-child(6) {
      left: 80%;
      width: 120px;
      height: 120px;
      -webkit-animation-delay: 3s;
              animation-delay: 3s;
      background-color: rgba(255, 255, 255, 0.2);
    }
    .bg-bubbles li:nth-child(7) {
      left: 32%;
      width: 160px;
      height: 160px;
      -webkit-animation-delay: 7s;
              animation-delay: 7s;
    }
    .bg-bubbles li:nth-child(8) {
      left: 55%;
      width: 20px;
      height: 20px;
      -webkit-animation-delay: 15s;
              animation-delay: 15s;
      -webkit-animation-duration: 40s;
              animation-duration: 40s;
    }
    .bg-bubbles li:nth-child(9) {
      left: 25%;
      width: 10px;
      height: 10px;
      -webkit-animation-delay: 2s;
              animation-delay: 2s;
      -webkit-animation-duration: 40s;
              animation-duration: 40s;
      background-color: rgba(255, 255, 255, 0.3);
    }
    .bg-bubbles li:nth-child(10) {
      left: 90%;
      width: 160px;
      height: 160px;
      -webkit-animation-delay: 11s;
              animation-delay: 11s;
    }
    @-webkit-keyframes square {
      0% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
      }
      100% {
        -webkit-transform: translateY(-700px) rotate(600deg);
                transform: translateY(-700px) rotate(600deg);
      }
    }
    @keyframes square {
      0% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
      }
      100% {
        -webkit-transform: translateY(-700px) rotate(600deg);
                transform: translateY(-700px) rotate(600deg);
      }
    }
    .cc{
      text-decoration: none;
      color: #53e3a6; 
      }
  </style>
  <script type="text/javascript">
    
     $("#login-button").click(function(event){
         event.preventDefault();
       
       $('form').fadeOut(500);
       $('.wrapper').addClass('form-success');
    });
    function check()
    {
      if(form.realname.value == "")//如果用户名为空  
      {  
        alert("您还没有填写内容！");  
        form.realname.focus();  
        return false;  
      }  
    }
  </script>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      
      <form id="myForm" name='form' class="form" method='post' action='realname.php' onSubmit="return check()">
        <input type="text" placeholder="名字" name='realname'>
        <input type="hidden" name='userid' value=<?php echo "$userid" ?>>
        <button type="submit" id="login-button" value='submit'>确定</button>
        <p>分享页面标题为默认为“在你眼中，我真正热爱的是什么”，若更名为“tom”，则标题变为“在你眼中，tom真正热爱的是什么”<p>
      </form>
    </div>
    <ul class="bg-bubbles">  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
            <li></li>  
        </ul>  
  </div>
</body>
</html>