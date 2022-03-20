<?php 
date_default_timezone_set("Europe/Berlin");
$time = time();
session_start();
$connect = connect();
$info = info();
$ip =  get_client_ip();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function connect(){
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "";
	$DB_NAME = "project_31";
	$CONNECT = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	return $CONNECT;
}

function to_timestamp(){
	$d = DateTime::createFromFormat(
		'd-m-Y H:i:s',
		'22-09-2008 00:00:00',
		new DateTimeZone('EST')
	);
	
	if ($d === false) {
		return false;
	} else {
		return $d->getTimestamp();
	}
	return false;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function filter_namex($strip = null, $replace = null, $full_name = null){

    $r = "";

    $u = explode($strip, $full_name);

    $i = 0;

    foreach($u as $data){

        if($i != 0){

            $data = $replace.$data;

        }

        $r .= $data;

        $i++;

    }

    return $r;

}


function upload($tmp_file, $type = false){
	$mime_file_type = explode("/", mime_content_type($tmp_file));
	$result = false;
	if($type == false || $type == $mime_file_type[0]){
		$file_path = "uploads/".date("Y/M/");
		if (!file_exists($file_path)) {
			mkdir($file_path, 0777, true);
		}
		$file_name = $file_path.$mime_file_type[0]."-".time()."-".rand().".".$mime_file_type[1];
		if(move_uploaded_file($tmp_file, $file_name)){
			$result = $file_name;
		}
	}
	return $result;
}


function sent_mail($to = null, $fname = null, $message = null, $subject = null, $reply_to_this = null){
	global $info;
	$fname = ucwords(strtolower(addslashes($fname)));
	$to = (strtolower(addslashes(strip_tags($to))));
	

	$website_title = $info['title'];
	$website_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'];
	if ($reply_to_this != null) {
		$web_mail = $reply_to_this;
	}else{
		$web_mail = "no-reply@lemarbuchladen.de";
	}	
	$logo = "https://www.kjibon.com/wp-content/uploads/2022/03/logo2-150x150.png";

	if ($subject == null) {
		$subject = "Notification from $website_title";
	}
	$header = '';
	$headerX['Content-Type'] = 'text/html;charset: ISO-8859-1';
	$headerX['MIME-Version'] = '1.0';
	$headerX['X-Priority'] = '1';
	$subject = ucwords(strtolower(addslashes(strip_tags($subject))));
	// $headerX['Priority'] = 'Urgent';
	// $headerX['Importance'] = 'High';
	// $headerX['X-MSMail-Priority'] = 'High';
	$headerX['Return-Path'] = 'info@kjibon.com';
	$headerX['Reply-To'] = $web_mail;
	$headerX['X-Mailer'] = 'PHP/'.phpversion();
	$headerX['From'] = "$website_title <$web_mail>";

	$header = $headerX;
	$mail_body = '
	<body style="margin: 0; padding: 0;">
		<table style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing: border-box;font-size: 14px;width: 100%;background: #f6f6f6;margin: 0;padding: 0;user-select: none;">
			<tbody>
				<tr style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing: border-box;font-size: 14px;margin: 0;padding: 0;">
					<td style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing: border-box;font-size: 14px;vertical-align: top;display: block!important;max-width: 600px!important;clear: both!important;margin: 0 auto;padding: 0;min-width:400px;">
						<div style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing: border-box;max-width: 600px;display: block;margin: 0 auto;padding: 20px;padding-top: 50px">
							<table style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing: border-box;font-size: 12px;border-radius: 3px;background: #fff;margin: 0;padding: 0;border: 1px solid #e9e9e9; width: 100%; padding: 16px;color: #8d8d8d;">
								<tbody>
									<tr>
										<td><br></td>
									</tr>
									<tr>
										<td style="margin: 0 auto;display: flex;align-items: center;justify-content: space-between;">
											<a target="_blank" href="'.$website_url.'">
												<img style="width: auto;height: 70px;pointer-events: none;" src="'.$logo.'">
											</a>
											<div  style="display: flex;justify-content: center;margin-left: auto;">
												'.date("H:i:s A").'<br>
												'.date("d M, Y").'
											</div>
										</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
									<tr>
										<td>Hi <b>'.$fname.'</b>,</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
									<tr style="font-size: 14px;color:#444444;">
										<td>'.$message.'</td>
									</tr>
									<tr>
										<td><br>Please keep in mind that if this mail contain any crediatials, don\'t share these or this email with anyone. Not even with your girlfriend. Never share your email and password. Keep your privacy safe.</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
									<tr>
										<td>Thank you for your time.</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
									<tr>
										<td>From, <br>'.$website_title.' team.</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
								</tbody>
							</table>
							<div style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;width:100%;clear:both;color:#999;margin:0;padding:20px">
								<table width="100%" style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0;padding:0; color: #cfcfcf;">
									<tbody><tr style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0;padding:0">
										<td style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;text-align:center;margin:0;padding:0 0 5px" align="center" valign="top">You are receiving this email to protect and verify users crediatials and personal informations.</td>
									</tr>
									<tr style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:14px;margin:0;padding:0">
										<td style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:12px;vertical-align:top;text-align:center;margin:0;padding:0 0 5px" align="center" valign="top">
											© 2021-'.date('y').' All rights reserved by <a target="_blank" style="color: lightpink;" href="'.$website_url.'">'.$website_title.'</a>.'.base64_decode('UHJvZ3JhbW1lZCBieSA8YSB0YXJnZXQ9Il9ibGFuayIgc3R5bGU9ImNvbG9yOiBsaWdodHBpbms7IiBocmVmPSJodHRwczovL2luc3RhZ3JhbS5jb20vUHJvZ3JhbW1lckppYm9uIj5Qcm9ncmFtbWVySmlib248L2E+IA==').'
										</td>
									</tr>
								</tbody></table>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
	';
	if (mail($to, $subject, $mail_body, $header)) {
		return $to;
	}else{
		return false;
	}
}
function rearrange_files($arr) {
	foreach($arr as $key => $all) {
	    foreach($all as $i => $val) {
	        $new_array[$i][$key] = $val;    
	    }    
	}
		return $new_array;
}
function times($ss) {
	$result = "";
	$s = $ss%60;
	$m = floor(($ss%3600)/60);
	$h = floor(($ss%86400)/3600);
	$d = floor(($ss%((365.25/12)*86400))/86400);
	$M = floor(($ss%(((365.25/12)*86400)*12))/((365.25/12)*86400));
	$Y = floor($ss/(((365.25/12)*86400)*12));

	if ($Y > 0) {
		$result .= $Y."y ";
	}
	if ($M > 0) {
		$result .= $M."m ";
	}
	if ($d > 0) {
		$result .= $d."d ";
	}
	if ($h > 0) {
		$result .= $h."h ";
	}
	if ($m > 0) {
		$result .= $m."m ";
	}/*
	if ($s > 0) {
		$result .= $s."s ";
	}*/

	return $result;
}



function info(){
    $result = array();
    global $connect;
    $sql = "SELECT * FROM `info` ORDER BY `info`.`id` DESC";
    $query = mysqli_query($connect, $sql);
    if($query){
        foreach($query as $details){
            $result[$details['name']] = $details['value'];
        }
    }else{
        return false;
    }
    return $result;
}