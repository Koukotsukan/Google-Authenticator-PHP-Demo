<?php 
require_once "language.php";
?>
<html>
<title><?php echo $title;?></title>
<head>
	<link href="https://cdn.bootcss.com/twitter-bootstrap/3.0.0/css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
	<style>
		body{ text-align:center} .headr{margin:15px}
	</style>
	<div style="float:left;margin:0px">
		<a href="https://github.com/Koukotsukan"><img width="149" height="149" src="https://github.blog/wp-content/uploads/2008/12/forkme_left_green_007200.png?resize=149%2C149" class="attachment-full size-full" alt="Fork me on GitHub" data-recalc-dims="1"></a>
	</div>
	<script>
		function delCookie(){
			var exp = new Date();
			document.cookie = document.cookie = "ga" + "="+ escape ("") + ";expires=" + exp.toGMTString();
			document.cookie = document.cookie = "un" + "="+ escape ("") + ";expires=" + exp.toGMTString();
			window.location.reload();}
	</script>
</head>
<header>
	<div id="headr"><font size="20px"><?php echo $title;?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2px"><button class="btn btn-default"><a href="?lang=en">English</a></button>&nbsp;&nbsp;<button class="btn btn-default"><a href="?lang=zh">中文</a></button></font></div>
	<center><div class="alert alert-info" style="width:960px;" >
	<?php echo $alertboard;?>
	</div></center></header>
	
	<body>	
<?php
include_once "lib/GoogleAuthenticator.php";
if (!$_COOKIE['ga']) {
	if ($_SERVER["QUERY_STRING"]==""){
		$yuyan="";
	}else{
		$yuyan="?".$_SERVER["QUERY_STRING"];
	};
	echo '<p>'.$inputhere.'</p><div>
<form action="index.php'.$yuyan.'" method="post">
<center><input type="email" name="username" class="form-control" placeholder="'.$holder.'" required style="width:255px;margin:5px"></input></center>
<br><input type="submit" value="'.$submithere.'" class="btn btn-primary" ></input>
</form></div>';
    if (isset($_POST['username'])) {
        $secret = 'XVQ2UIGO75XRUKJO';
        $time = floor(time() / 30);
        $g = new GoogleAuthenticator();
        $secret = $g->generateSecret();
		$username=$_POST['username'];
		$username=base64_encode(openssl_encrypt($username,"DES-ECB","12345"));
		$secret=base64_encode(openssl_encrypt($secret,"DES-ECB","12345"));
		setcookie("un", $username, time() + "604800");
        setcookie("ga", $secret, time() + "604800"); 
		echo "<script>window.location.reload(); </script>";
    }
} else {
    include_once "lib/GoogleAuthenticator.php";
    $g = new GoogleAuthenticator();
    $secret =openssl_decrypt(base64_decode($_COOKIE["ga"]),"DES-ECB","12345");
	$username = openssl_decrypt(base64_decode($_COOKIE["un"]),"DES-ECB","12345");
    print $qrcode."<br><br><br>";
    $uu = $g->getURL($username, "demo", $secret);
    echo "<img src='" . $uu . "'/>";
    echo "<img src='https://qrcode.online/img/?type=text&data=otpauth://totp/" . $username . "(demo.niuzhaohang.top)?secret=" . $secret . "'";
	if (isset($_POST['code'])){
	if ($_POST['code']==$g->getCode($secret)) {
		echo "<script>alert ('".$correct."')</script>";
	}else{
		echo "<script>alert ('".$wrong."')</script>";
	};
	};
		if ($_SERVER["QUERY_STRING"]==""){
		$yuyan="";
	}else{
		$yuyan="?".$_SERVER["QUERY_STRING"];
	};
		echo '<br><br><br><br><br><br><p>'.$reput.'</p><form action="index.php'.$yuyan.'" method="post" id="2"><center>
<input type="text" name="code" class="form-control" maxlength="6" required style="width:255px;margin:5px"></input></center>
<input type="submit" class="btn btn-primary" value="'.$submithere.'"></input>
</form><br>';
	echo $yoursrt.$secret.'<button class="btn btn-success" data-clipboard-text="'.$secret.'">'.$copytoclip.'</button><br><br><br>';
	echo '<input type="submit" class="btn btn-danger" onclick="delCookie()" value="'.$changesecret.'"></input>';
}
?>
	</body>
		<footer>
			<script>var clipboard = new ClipboardJS('.btn');clipboard.on('success', function(e) {alert("<?php echo $copysuccess;?>")});clipboard.on('error', function(e) {alert("<?php echo $copyfailed;?>")});</script>
				<br><a href="https://blog.niuzhaohang.top"><?php echo $myblog;?></a>&nbsp;&nbsp;&nbsp;  <a href="https://github.com/Koukotsukan">Github</a>
		</footer>
</html>
