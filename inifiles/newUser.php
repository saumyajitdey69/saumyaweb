<?php
$servername="localhost";
$user="root";
$pass="bosco007";
$database="chat";
$password=$username=$passwordErr=$usernameErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $conn=new mysqli($servername,$user,$pass,$database);
    if (!isset($_POST["username"]) or strlen($_POST["username"])==0)
    	$usernameErr = "Please enter something.";
    else
    {
    	$username=strval($_POST["username"]);
 		$username=mysql_real_escape_string($username);
    }
    if (!isset($_POST["password"]) or strlen($_POST["password"])==0)
    	$passwordErr = "Please enter something";
    else
    {
     	$password=strval($_POST["password"]);
        $password=mysql_real_escape_string($password);
    }
    if($passwordErr==="" && $usernameErr==="" )
    {
        $sql="insert into register values('$username','$password')";
	    if($conn->query($sql))
        {
            echo"REGISTERED".'<br>'."YOU WILL BE DIRECTED TO THE LOGIN PAGE";
            header("refresh:2;url=http://172.30.122.71/chat/exUser.php" );
        }
	    else
		    echo $conn->error;
    }
}
?>
<style>
    h2
    {
        text-align: center;
        color: rgb(0,100,400);
    }
    ::-webkit-input-placeholder
    { /* WebKit browsers */
        color:    rgb(0,100,400);
        opacity:0.6;
    }
    :-moz-placeholder
    { /* Mozilla Firefox 4 to 18 */
        color:    rgb(0,100,400);
        opacity:  0.6;
    }
    ::-moz-placeholder
    { /* Mozilla Firefox 19+ */
        color:    #909;
        opacity:  1;
    }
    :-ms-input-placeholder
    { /* Internet Explorer 10+ */
        color:    #909;
    }
    p.redfont
    {
        color:rgb(500,0,0);
    }
</style>
<h2 >Register with username and password</h2>
<style>
.error {color: #FF0000;}
</style>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?=($_SERVER['PHP_SELF'])?>"> 
    <div class="input-group input-group-lg">
    <span class="input-group-addon" id="sizing-addon1"></span>
    <input type="text" class="form-control " name="username" value ="<?php echo $username;?>" placeholder="Username" aria-describedby="sizing-addon1"><font color="red">*
    </div>
	<span class="error"> <?php echo $usernameErr;?></span>
	<br><br>
    <div class="input-group input-group-lg">
    <span class="input-group-addon" id="sizing-addon1"></span>
    <input type="password" class="form-control" name="password" value ="" placeholder="Password" aria-describedby="sizing-addon1"><font color="red">*
    </div>
    <span class="error"> <?php echo $passwordErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Register"> 
</form>
