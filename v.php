<?php
include 'db.php';


    $res=mysqli_query($link,"SELECT * FROM license WHERE id='1'");
	$num=mysqli_num_rows($res);
	if($num>=1){
    	$row=mysqli_fetch_array($res);
		$package_name=$row['package_name'];
		$license=$row['license'];
		if ($package_name == '0' || $license == '0') {
		    header("location: key.php");
		} else {
		    $user = $package_name;
$code = $license;
    
$post = [
    'package_name' => $user,
    'verification_code' => $code,
];

$ch = curl_init('http://hdcbbackground.com/Verification/verify.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
$d = curl_exec($ch);
$d = json_decode($d, true);
 if($d['status'] == 'true')
 {
     $c=$_POST['code'];
     $u=$_POST['user'];
     $is_blocked = $d['is_blocked'];
     $msg = $d['message'];
     $key = "UPDATE license SET license= '$code',package_name= '$user',is_blocked='$is_blocked' WHERE id='1'";
     $db = mysqli_query($link,$key);
 }else{
      header("location: key.php");
     }
}
}else {
        header("location: key.php");
    }



?>
