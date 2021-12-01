<?php
require_once("server.php");
$event=$_GET['event'];
switch ($event) {
	 case "login":
		$u=$_GET['username'];
		$p=md5($_GET['password']);
		$check='';
        $sql=mysqli_query($conn,"select username,password,avartar from users where username='".$u."' and password='".$p."'"); 
		while($rows=mysqli_fetch_array($sql))
        {
            $usertemp['username']=$rows['username'];
            $usertemp['password']=$rows['password'];
			$usertemp['avartar']=$rows['avartar'];
            $check=$rows['username'];
        }
		if($check!=''){
			$jsonData['event'] =1;
		
			$jsonData['items'] =$usertemp;
		
			echo json_encode($jsonData);
		}else
		{
			$jsonData['event'] =0;
		
			echo json_encode($jsonData);
		}
		mysqli_close($conn);
		 break;
		default:
        # code...
        break;
}
?>