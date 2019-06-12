<?php 
$ip=$_SERVER['HTTP_CF_CONNECTING_IP'];
$res1 = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=$ip");  
$res1 = json_decode($res1); 
$array = get_object_vars($res1);
foreach($array as $value){
}
if ($value->country_id!="CN"){
	if ($_SERVER["QUERY_STRING"]=="lang=zh"){	
	$title="谷歌二步验证Demo";
	$alertboard="<p>这只是一个<strong>演示站点</strong>，需要浏览器启用cookie和HTML5。</p><p>如果没有刷新Cookie，生成的密钥将存储在浏览器的cookie中7天。本网站不应用于对真实服务的身份验证。</p><p>谷歌服务请在合适的网络测试环境下进行。</p><p>作者不承担任何损害赔偿责任。</p>";
	$inputhere="请随便输入一个邮箱";
	$holder="在这里输入邮箱";
	$submithere="提交";
	$qrcode="用你的谷歌二步验证APP扫描下面的二维码：";
	$reput="然后输入你的谷歌验证的验证码";
	$yoursrt="你的密钥是：";
	$purgecookie="清除Cookie";
	$copytoclip="复制";
	$copysuccess="复制成功";
	$copyfailed="复制失败";
	$correct="✅动态口令正确";
	$wrong="❌动态口令错误";
	$myblog="我的博客";
	$changesecret="更换密钥";
}else{
	$title="Google Authenticator Demo";
	$alertboard="<p>This is only <strong>demo site</strong> and requires enabled cookies and HTML5 compatibile browser. It is never safe to transfer TOTP secret via <strong>unsecured protocol</strong> or store it in <strong>usecured cookie</strong> in user's browser!</p><p>Generated TOTP is stored in a browser's cookie for 7 days if not refreshed. This website should not be used for authentication to real services.<br>Author do not takes responsibilities for any damages.</p>";
	$inputhere="Please input a random email address";
	$holder="Input email addr here";
	$submithere="Submit";
	$qrcode="The QR Code for this secret (to scan with the Google Authenticator App: ";
	$reput="Then input your Google Authenticator Code here";
	$yoursrt="Your secret is:";
	$purgecookie="Purge Cookie";
	$copytoclip="Copy";
	$copysuccess="Copy Success";
	$copyfailed="Copy Failed";
	$correct="✅Code Correct";
	$wrong="❌Code Wrong";
	$myblog="My Blog";
	$changesecret="Regain Secret";
	}

}else{
	if ($_SERVER["QUERY_STRING"]=="lang=en"){	
	$title="Google Authenticator Demo";
	$alertboard="<p>This is only <strong>demo site</strong> and requires enabled cookies and HTML5 compatibile browser. It is never safe to transfer TOTP secret via <strong>unsecured protocol</strong> or store it in <strong>usecured cookie</strong> in user's browser!</p><p>Generated TOTP is stored in a browser's cookie for 7 days if not refreshed. This website should not be used for authentication to real services.<br>Author do not takes responsibilities for any damages.</p>";
	$inputhere="Please input a random email address";
	$holder="Input email addr here";
	$submithere="Submit";
	$qrcode="The QR Code for this secret (to scan with the Google Authenticator App: ";
	$reput="Then input your Google Authenticator Code here";
	$yoursrt="Your secret is:";
	$purgecookie="Purge Cookie";
	$copytoclip="Copy";
	$copysuccess="Copy Success";
	$copyfailed="Copy Failed";
	$correct="✅Code Correct";
	$wrong="❌Code Wrong";
	$myblog="My Blog";
	$changesecret="Regain Secret";
}else{
	$title="谷歌二步验证Demo";
	$alertboard="<p>这只是一个<strong>演示站点</strong>，需要浏览器启用cookie和HTML5。</p><p>如果没有刷新Cookie，生成的密钥将存储在浏览器的cookie中7天。本网站不应用于对真实服务的身份验证。</p><p>谷歌服务请在合适的网络测试环境下进行。</p><p>作者不承担任何损害赔偿责任。</p>";
	$inputhere="请随便输入一个邮箱";
	$holder="在这里输入邮箱";
	$submithere="提交";
	$qrcode="用你的谷歌二步验证APP扫描下面的二维码：";
	$reput="然后输入你的谷歌验证的验证码";
	$yoursrt="你的密钥是：";
	$purgecookie="清除Cookie";
	$copytoclip="复制";
	$copysuccess="复制成功";
	$copyfailed="复制失败";
	$correct="✅动态口令正确";
	$wrong="❌动态口令错误";
	$myblog="我的博客";
	$changesecret="更换密钥";
	}
	
}
?>
