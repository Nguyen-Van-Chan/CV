<?php
require_once("server.php");//Đưa code của file server vào file apiall

$event=$_GET['event']; //nhận sự kiện từ client gửi lên
 
switch ($event) {
		case "insertSach":
			$masach=$_GET['mas'];
			$tensach=$_GET['tens'];
			$sotrang=(float)$_GET['sotrang'];
			$giasach=(float)$_GET['giasach'];
			$ngayxb=$_GET['ngayxb'];
		    $matl=$_GET['matl'];
			$maxb=$_GET['maxb'];
			
		
        $sql="INSERT INTO sach(masach,tensach,sotrang,giasach,ngayxb,slton,matl,maxb) values('".$masach."','".$tensach."','".$sotrang."','".$giasach."','".$ngayxb."','0','".$matl."','".$maxb."')"; 
       //$sql="INSERT INTO sach(masach,tensach) values('".$masach."','".$tensach."')"; 
       
            if (mysqli_query($conn, $sql)) {
                $res[$event] = 1;
            } else {
                $res[$event] = 0;
            }
        
        echo  json_encode($res);
        mysqli_close($conn);
	 break;	
	case "insertTL":
       
        $matl=$_GET['matl'];
		$tentl=$_GET['tentl'];
	//	echo $matl."-".$tentl;
	
        $sql="INSERT INTO theloai(matl,tentl) values('".$matl."','".$tentl."')"; 
       
            if (mysqli_query($conn, $sql)) {
                $res[$event] = 1;
            } else {
                $res[$event] = 0;
            }
        
        echo json_encode($res);
        mysqli_close($conn);
	 break;	
	 case "UpdateTL":
       
        $matl=$_GET['matl'];
		$tentl=$_GET['tentl'];
	
        $sql="update theloai set tentl='".$tentl."' where matl='".$matl."'"; 
       
            if (mysqli_query($conn, $sql)) {
                $res[$event] = 1;
            } else {
                $res[$event] = 0;
            }
        
        echo json_encode($res);
        mysqli_close($conn);
	 break;	
	 case "DeleteTL":
       
        $matl=$_GET['matl'];
		
        $sql="delete from theloai  where matl='".$matl."'"; 
       
            if (mysqli_query($conn, $sql)) {
                $res[$event] = 1;
            } else {
                $res[$event] = 0;
            }
        
        echo json_encode($res);
        mysqli_close($conn);
	 break;	
	case "getALLTheLoai":
		
		$mang=array();
        $matl=$_GET['matl'];
        $tentl=$_GET['tentl'];
		
        $sql=mysqli_query($conn,"select * from theloai where (MATL like '%".$matl."%')"); 
		while($rows=mysqli_fetch_array($sql))
        {
           
            $usertemp['matl']=$rows['MATL'];
            $usertemp['tentl']=$rows['TENTL'];
			
            array_push($mang,$usertemp);
        }
        $jsonData['items'] =$mang;
        echo json_encode($jsonData);
		mysqli_close($conn);
		 break;	
	//api dùng để hiển thị dữ liệu lên tren combobox
	case "getTheLoai":
		$mang=array();    
        $sql=mysqli_query($conn,"select * from theloai"); 
		while($rows=mysqli_fetch_array($sql))
        {
            $usertemp['matl']=$rows['MATL'];
            $usertemp['tentl']=$rows['TENTL'];
            array_push($mang,$usertemp);
        }
        $jsonData['items'] =$mang;
        echo json_encode($jsonData);
		mysqli_close($conn);
		 break;	
	case "getNXB":
		$mang=array();    
        $sql=mysqli_query($conn,"select maxb,tenxb from nhaxb"); 
		while($rows=mysqli_fetch_array($sql))
        {
            $usertemp['maxb']=$rows['maxb'];
            $usertemp['tenxb']=$rows['tenxb'];
            array_push($mang,$usertemp);
        }
        $jsonData['items'] =$mang;
        echo json_encode($jsonData);
		mysqli_close($conn);
		 break;	
	
		default:
        # code...
        break;
}
?>