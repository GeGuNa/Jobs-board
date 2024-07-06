<?php



session_start();

ob_start(); 

//$sess = session_id();

 
date_default_timezone_set('Asia/Tbilisi');






error_reporting(E_ALL); 
set_time_limit(60);




ini_set('magic_quotes_gpc', 0);
ini_set('display_errors',1);



$time = intval($_SERVER['REQUEST_TIME']);
$time = time();




function unsafeChar($var)
{
    return str_replace(array("&gt;", "&lt;", "&quot;", "&amp;"), array(">", "<", "\"", "&"), $var);
}


function safechar($var)
{
    return htmlspecialchars(unsafeChar($var));
}


function safe($var)
{
    return str_replace(array('&', '>', '<', '"', '\''), array('&amp;', '&gt;', '&lt;', '&quot;', '&#039;'), str_replace(array('&gt;', '&lt;', '&quot;', '&#039;', '&amp;'), array('>', '<', '"', '\'', '&'), $var));
}



function random_string($length = 8) {
    $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($string), 0, $length);
}



function random_string2($length) {
    $str = random_bytes($length);
    $str = base64_encode($str);
    $str = str_replace(["+", "/", "="], "", $str);
    $str = substr($str, 0, $length);
    return $str;
}




function random_string3($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}



function gen_String(){
   $bytes = random_bytes(20);

return $bytes;
}





function encrypt($plaintext) {
		
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = openssl_random_pseudo_bytes($ivlen);
	$ciphertext_raw = openssl_encrypt($plaintext, $cipher, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
	$hmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
	$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
		return $ciphertext;
}
	
	
	
function decrypt($ciphertext){
		
	$c = base64_decode($ciphertext);
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = substr($c, 0, $ivlen);
	$hmac = substr($c, $ivlen, $sha2len=32);
	$ciphertext_raw = substr($c, $ivlen+$sha2len);
	$plaintext = openssl_decrypt($ciphertext_raw, $cipher, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
	$calcmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
	if (hash_equals($hmac, $calcmac))
	{
		return $plaintext;
	}
	
		
	}
	




 function get_ip()
{
	$value = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$value = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$value = $_SERVER['REMOTE_ADDR'];
	}
  
	return $value;
}

function is_valid_id($id)
{
  return is_numeric($id) && ($id > 0) && (floor($id) == $id);
}


function if_integer($phone) {

	if ($phone == 0)return false;
	if (preg_match('/^\d+$/', $phone) && $phone[0] != 0)return true;
	return false;
	
}



function convertAndBlur($inputIMG, $dst, $width, $height, $quality) {


   $img = new Imagick($inputIMG);
   $img->cropThumbnailImage($width,$height);
   $img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality($quality);
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

function redirect2($to = '/', $time = 0) {
    $string = sprintf('Refresh: %d; url=%s', $time, $to);

    header($string);
}

function is_image($name) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);

if (!in_array($ext, $allowedFiles)) {
    return false;
} else {
	return true;
}

}


function check_image($path, $ext)
{
	$check = FALSE;
    if ($ext == 'gif') {
        $check = imagecreatefromgif($path);
    } elseif ($ext == 'png') {
        $check = imagecreatefrompng($path);
    } elseif ($ext == 'jpeg' OR $ext = 'jpg') {
        $check = imagecreatefromjpeg($path);
    }

	if ($ext == 'gif' && $check) {
  		$contents = file_get_contents($path);
  		if (strpos($contents, 'php') !== FALSE) {
      		$check = FALSE;
  		}
	}

    return ($check) ? TRUE : FALSE;
}



function whenTm($time=0) {
	
$param = 'j M Y  H:i';
$param2 = ' H:i';

$nowt = time();
$minused = $nowt - $time;

if (abs((int)$time) == 0) { $time=time(); }


$MN = array("იან", "თებ", "მარ", "აპრ", "მაი", "ივნ", "ივლ", "აგვ", "სექ", "ოქტ", "ნოე", "დეკ");


$MN=array("კვი", "ორშ", "სამ", "ოთხ", "ხუთ", "პარ", "შაბ");

if ($minused < 5) { return ' now'; }
if ($minused < 60) { return $minused.' sec ago'; }
else if ($minused < 3600) { return round($minused/60).' min ago'; }
else if ($minused < 86400) { return round($minused/3600).' hr ago'; }
else if ($minused < 172800) { return 'yesterday  at '.date("H:i", $time); }
else if ($minused < 172800*2) { return '2 days ago '.date("H:i", $time); }
else { 
	return date("d M, Y", $time); 
}

}


function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}

function vid_y1(){
	   $url = "$videourl";
              $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
              $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

              if (preg_match($longUrlRegex, $url, $matches)) {
                  $youtube_id = $matches[count($matches) - 1];
              }

              if (preg_match($shortUrlRegex, $url, $matches)) {
                  $youtube_id = $matches[count($matches) - 1];
              }
            $fullEmbedUrl = 'https://www.youtube.com/embed/' . $youtube_id ;
}

function ConvertImage($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 
if ($type == 'scaled') {
   $img->cropThumbnailImage(800,420);
}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

function ifImage($name, $filep = null) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);





	if ($ext == 'gif' && $filep != null) {
		
			$contents = file_get_contents($filep);
			if (strpos($contents, 'php') !== FALSE) {
				return false;
			}
			
	} else {



		if (!in_array($ext, $allowedFiles)) {
			return false;
		} else {
			return true;
		}

	}


}









function Hashing(string $pass, string $salt = "kek_1252"){
	return hash("sha256", "$pass$salt");
}


function if_email(string $mail) {
	return filter_var($mail, FILTER_VALIDATE_EMAIL);
}


function Error(string $text, string $url = "?"){
	$_SESSION['err'] = $text; 
	header("Location: $url"); 
	exit; 
}


function Success(string $text, string $url = "?"){
	$_SESSION['message'] = $text; 
	header("Location: $url"); 
	exit; 
}




function num($a) {

	return abs((int)$a);

}



function filter(string $stuff, string $type = 'num') {

if ($type == 'num')
	return abs((int)$stuff);
else 
	return mysql_real_escape_string($stuff);
	
}






function redirection(string $link) {
	header("location: $link");
	exit;
}


function replaceEscapeString(string $text)
{

	$text = str_replace(["\x5C","\x5c"], ['∖','∖'], $text);

	//$text = str_replace('\\', '&#92;', $text);

	$text = stripslashes($text);

	return $text;   

	//return htmlentities($text, ENT_QUOTES, 'utf-8');

}




function mysql_real_escape_string(string $text): string {
	$k1 = replaceEscapeString($text);
	return $k1;
}


function my_esc(string $str): string {
	$k1 = replaceEscapeString($str);
	//return remove_chars($k1);
	return $k1;
}






function erase_cookie(string $name) {
	setcookie($name, "", time()-3600, "/");
}

function set_cookie(string $name, $value, $time) {
	setcookie($name, $value, $time, "/");
}








function strlen2($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
         
}



function text_size($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
         
}


function utf_strlen($msg) {

		 $msg = trim($msg);

         if (function_exists('mb_strlen')) return mb_strlen($msg, 'utf-8');
         if (function_exists('iconv_strlen')) return iconv_strlen($msg, 'utf-8');
         if (function_exists('utf8_decode')) return strlen(utf8_decode($msg));
         return strlen($msg);
    
} 


function utf_substr($text, $min, $max) {

		$text = trim($text);

        if (function_exists('mb_substr')) return mb_substr($text, $min, $max, 'utf-8');
        else if (function_exists('mb_strcut')) return mb_strcut($text, $min, $max, 'utf-8');
        else if (function_exists('iconv_substr')) return iconv_substr($text, $min, $max, 'utf-8');
        else return substr($text, $min, $max);
    
} 





//even georgian words can be split by using this function 
function Split_String_utf8($str, $qz = 0) {
	if ($qz == 0)return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
	else return mb_str_split($str);
}






class Text {

public $text;


public function __construct(string $text) {
	$this->text = $text;
}


public function escaped() {

$str = $this->text;

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
//$str=makeUrltoLink($str); 
$str = smiles($str); 
$str = $this->bbcode($str); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;

    
}


public function unescaped() {
	
$str = $this->text;

$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); 
$str = nl2br($str); 
$str = stripslashes($str);

return $str;


}



function makeUrltoLink() {
	
	
$text = $this->text;	


//$text = htmlentities($text, ENT_QUOTES, 'UTF-8'); 
//$text = nl2br($str);

$q21 = "#ht(tp|tps)((://www\.)|(://))(\w+)\.(\w+)#i";

$qq2 = preg_replace($q21, '<a href="$0">$0</a>', $text);

 return $qq2;
}
 
 





function BBcode(string $msg) {
	
	
//$msg = $this->text;		


/*
$bbcode = array(
'/\[red\](.+)\[\/red\]/isU' => '<span style="color:#ff0000;">$1</span>',
'/\[b\](.+)\[\/b\]/isU' => '<b>$1</b>',
'/\[yellow\](.+)\[\/yellow\]/isU' => '<span style="color:#ffff22;">$1</span>',
'/\[green\](.+)\[\/green\]/isU' => '<span style="color:#00bb00;">$1</span>',
'/\[blue\](.+)\[\/blue\]/isU' => '<span style="color:#0000bb;">$1</span>',
'/\[brown\](.+)\[\/brown\]/isU' => '<span style="color:brown;">$1</span>',
'/\[white\](.+)\[\/white\]/isU' => '<span style="color:#ffffff;">$1</span>',
'/\[black\](.+)\[\/black\]/isU' => '<span style="color:black;">$1</span>',
'/\[orange\](.+)\[\/orange\]/isU' => '<span style="color:orange;">$1</span>',
'/\[pink\](.+)\[\/pink\]/isU' => '<span style="color:pink;">$1</span>',
'/\[violet\](.+)\[\/violet\]/isU' => '<span style="color:violet;">$1</span>',
'/\[gray\](.+)\[\/gray\]/isU' => '<span style="color:gray;">$1</span>',
'/\[c\](.+)\[\/c\]/isU' => '<center>$1</center>'
);
*/
$msg = preg_replace('/\[br\]/isU', '<br>', $msg);	
$msg = preg_replace('/\[url=(.*?)\](.+)\[\/url\]/isU', "<a href='$1'>$2</a>", $msg);
//$msg = preg_replace('/\[color=([\#0-9a-zA-Z]+)\](.+)\[\/color\]/isU', '<span style="color:$1;">$2</span>', $msg);
$msg = preg_replace('/\[img\](.+)\[\/img\]/isU', '<img style="max-width:40%" src="$1">', $msg);

$msg = preg_replace('~(^|\s)(htt(p|ps)://(.*?))(\s|$)~ui', "<a href='$2'>$2</a>", $msg);

//$msg = preg_replace(array_keys($bbcode), array_values($bbcode), $msg);

return $msg;
}





}






function if_whitespace(string $text){

if (trim($text) == $text) {
	return false;
} else {
	return true;
}


}









	//string first parameter
	//returns false if is not valid
    function validateUsername(string $username): bool 
    {
        if (preg_match("/^[\p{L}\p{Extended_Pictographic}\s\,\=_.\-0-9]{3,32}$/ui", $username)) return true;

        return false;
    }
    
    //if you dont want to use complicated use this one
    function validateUsername2(string $username): bool {


	$str = $username;
	$chars = ['&', '.', '!', '+', '<', '>', '\\', '"', '\'', '\x5c'];
	$length = strlen($str);

	$sts = false;

	for ($i = 0; $i < $length; $i++) {
		if (in_array($str[$i], $chars)) {
			$sts = true;
			break;
		}
	}

	
	
        return $sts;
    } 
    
    
    
    
    
 function checkEvenOrOdd($number){
    if($number % 2 == 0){
        echo "Even"; 
    }
    else{
        echo "Odd";
    }
}

function number(string $num){
	
	//for the protection purpose only )) cuz who knows what will be result in some cases ))
	//since we need just an integer  lets check it in many ways ))
	
	if (!is_numeric($num))return 0;
	
	$num1 = (int)$num;
	
	return abs($num1);
}
 
 
 
 
function time_counter(int $ab) {


if ($ab>60) {
	$cnt1 = round($ab / 300);
} else  {
	$cnt1 = 1;
}

return $cnt1." min read";
} 



function Get(string $val) {
	return $_GET[$val];
}

function Post(string $val) {
	return $_POST[$val];
}

function Cookie(string $name) {
	return $_COOKIE[$val];
}

function Session(string $name,  string $val = '') {
	
	if ($val == '') { 
		return $_SESSION[$name];
    } else {
		$_SESSION[$name] = $val;
	}
	
}



function get_Data($ip){
	$url = 'http://ip-api.com/json/'; 
	
	return file_get_contents($url."".$ip);
}

function get_DataOfIp($ip){
	//example
	
/*	

https://api.iplocation.net/?ip=193.176.214.42 = {
 
{"ip":"193.176.214.42","ip_number":"3249591850","ip_version":4,"country_name":"Georgia","country_code2":"GE","isp":"LLC Skytel","response_code":"200","response_message":"OK"}

}


https://api.iplocation.net/?ip=8.8.8.8 = {

{"ip":"8.8.8.8","ip_number":"134744072","ip_version":4,"country_name":"United States of America","country_code2":"US","isp":"Google LLC","response_code":"200","response_message":"OK"}
 }
	
*/	
	$url = 'https://api.iplocation.net/?ip='; 
	
	return file_get_contents($url."".$ip);
}





function convertAndBlurForPosts($imgo, $dst, $type = '') {


   $img = new Imagick($imgo);
   //$img->cropThumbnailImage($width,$height);
   //$img->resizeImage(800, 420, Imagick::FILTER_LANCZOS,1);
   //$img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality(100);
 
if ($type == 'scaled') {
   $img->cropThumbnailImage(800,420);
}
   $img->setImagePage(0, 0, 0, 0);
   $img->setImageFormat('jpeg');
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}





function if_img_upls($name) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp','bmp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);

if (!in_array($ext, $allowedFiles)) {
    return false;
} else {
	return true;
}

}





function cal_percentage($num_amount, $num_total) {
	
//if you dont want to see an error
if ($num_total==0) return 0; 	
	
  $count1 = $num_amount / $num_total;
  $count2 = $count1 * 100;
  $count = number_format($count2, 0);
  
  return $count;
}


function convert($size) {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }


//echo convert(memory_get_usage(true));



function escape($str) {
	$trans = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;', '"' => '&quot;', '\'' => "&#x27;", '\\' => '&#8726;');
	return strtr($str, $trans);
}






function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;
    $ip = ip2long($ip);
    if ($ip !== false && $ip !== -1) {
        $ip = sprintf('%u', $ip);
        if ($ip >= 0 && $ip <= 50331647)
            return false;
        if ($ip >= 167772160 && $ip <= 184549375)
            return false;
        if ($ip >= 2130706432 && $ip <= 2147483647)
            return false;
        if ($ip >= 2851995648 && $ip <= 2852061183)
            return false;
        if ($ip >= 2886729728 && $ip <= 2887778303)
            return false;
        if ($ip >= 3221225984 && $ip <= 3221226239)
            return false;
        if ($ip >= 3232235520 && $ip <= 3232301055)
            return false;
        if ($ip >= 4294967040)
            return false;
    }
    return true;
}

function get_ip_address() {
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
    return $_SERVER['REMOTE_ADDR'];
}








class Pagination {
	
public $totalRecords;
public $page;
public $perPage;
public $currentPage;
	
public function __construct(){
	
	$this->currentPage();

}


public function calculation(string $totalRecords, string $dataPerPage) {
	
	
//if ($totalRecords>$set['p_str']) {
	
$pge1d231z = $this->currentPage ;

$pge12mx31 = ceil($totalRecords/$dataPerPage);

$pge2z1aa = $dataPerPage*$pge1d231z-$dataPerPage;

//}

	return $pge2z1aa;
}

public function currentPage(){
	
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	$this->currentPage = filter($_GET['page']);
} else {
	$this->currentPage = 1;
}	
	
}

//address of a page
public function setPage(string $page, string $rest = '') {
	
	
		if (!empty($rest))
			$this->page = [$page,$rest];
		else 
			$this->page = $page;
}

//how many rows are there
public function setTotal(string $total){
	$this->totalRecords = $total;
}

//how many rows must be shown in one page
public function setPerPage(string $num){
	$this->perPage = $num;
}

public function render(){
	
$numPages = ceil($this->count / $this->perPage);	

$current = $this->currentPage();


}




public function rendering() {
	
//$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$currentPage = $this->currentPage;

$resultsPerPage = $this->perPage;

$startFrom = ($currentPage - 1) * $resultsPerPage;

$totalRecords = $this->totalRecords;

// ... (query execution and fetching data)

$totalPages = ceil($totalRecords / $resultsPerPage);

// Limit the number of displayed page links
$displayedPages = 5;


$halfDisplayed = floor($displayedPages / 2);
$startPage = max(1, $currentPage - $halfDisplayed);
$endPage = min($totalPages, $startPage + $displayedPages - 1);


//echo $totalPages

	if ($totalPages !=0 && $totalPages<$currentPage) {
		redirection("/");	
	}


	if (!is_array($this->page)) {
		
		$pgadsp1 = $this->page;
		$pgadsp2 = '';	
		$pgwe3 = $pgadsp1.'?page=';
		
	} else {
		
		$pgadsp1 = $this->page[0];
		$pgadsp2 = $this->page[1];		
		$pgwe3 = $pgadsp1.$pgadsp2.'&page=';
		
	}

?>
	
	
    <div class="pp_22_p1">
        <?php if ($currentPage > 1): ?>
           <div> <a class="P_area" href="<?=$pgwe3;?><?php echo $currentPage - 1; ?>"> < </a> </div>
        <?php endif; ?>

        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
             <div> <a class="P_area <?=($currentPage == $i ? "Active_page" : "");?>" href="<?=$pgwe3;?><?php echo $i; ?>"><?php echo $i; ?></a> </div>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <div> <a class="P_area" href="<?=$pgwe3;?><?php echo $currentPage + 1; ?>"> > </a>  </div>
        <?php endif; ?>
    </div>	
	
	
<?
}




public function __destruct(){
	
}	


	
}






class user {

public $user;
public $id;


	public function __construct($id) {
		
		$this->getData($id);
		$this->id = $id;
		
	}

	public function getData($id) { 

		global $pdo;	
		
		$this->user = $pdo->fetchOne("SELECT * FROM hr_user WHERE uid = ?",[$id]);
		
	}






	public function nickWithColor($color) {
		return '<a href="/"><span>'.detect($this->user['name']).'</span></a>'; 
	}


	public function nick() {
		return '
		<a href="/">
			<span>'.detect($this->user['name']).'</span>
		</a>'; 
	}

	public function NickForText() {
		return '
		<a href="/">
			<span>'.detect($this->user['name']).'</span>
		</a>'; 
	}









	public function age($engl = " ") {
		

	if ($engl == " ")$dt = "  წლის.";
	else $dt = "  years old";
		
	$dateOfBirth = "".$this->user['birth_dd']."-".$this->user['birth_mm']."-".$this->user['birth_yy']."";
	 
	// Create a datetime object using date of birth
	$dob = new DateTime($dateOfBirth);
	 
	// Get current date
	$now = new DateTime();
	 
	// Calculate the time difference between the two dates
	$diff = $now->diff($dob);
	 
	// Get the age in years, months and days
	return "".$diff->y." $dt";
	 
	// Get the age in years, months and days
	//echo "Your current age is ".$diff->y." years ".$diff->m." months ".$diff->d." days.";	
		
	}	
	


	public function existzs() {
		if (!is_scalar($this->user)) {
			header("Location: /foto");
			exit;
		}
	}









	public function pnick($size) {
		
		

		
		
			return '
					
				<a href="/">
					'.$this->photo3($size, 24, 24).'
				
					<span>'.detect($this->user['name'].' '.$this->user['surn']).'</span>
				</a>'; 
		
	}







	public function UserFullname() {
		
		return ''.detect($this->user['name']).' '.detect($this->user['surn']).''; 
		
	}





	public function NickWithLinkForUser() {
		
		

		
		
	return '
		<a href="/">
			'.detect($this->user['name'].' '.$this->user['surn']).'
		</a>'; 
		
	}

















public function photo($size = 48) {
	
	
	global $pdo;	
		
	$avatar = $pdo->fetchOne("SELECT id,id_gallery,photo_addr FROM `gallery_foto` WHERE `id_user` = ? AND `avatar` = '1'", [$this->id]);	
		
	

	
}


public function __invoke() {
	
}	

public function __get($zz){
	return $this->user[$zz];
}



   public function findIpAddress(): string
    {
        if (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = preg_replace("/[^0-9.]/", "", $_SERVER['REMOTE_ADDR']);
        }
        return htmlspecialchars(stripslashes($ip));
    }


	
	
}




function isPdf($file, $ch = 0) {
  
  

if ($ch == 1) {
     
    if (!file_exists($file)) {
        return false;
    }

}
    // Get the MIME type of the file
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $file);
    finfo_close($fileInfo);

    // Check if the MIME type is 'application/pdf'
    return $mimeType === 'application/pdf';
}


$params = [];
$params['page'] = 7;



?>
