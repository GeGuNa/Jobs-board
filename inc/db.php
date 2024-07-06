<?php


class PDOORM
{
    private $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;

   
   /* public function __construct($dsn, $username, $password)
    {
        $this->pdo = new PDO($dsn, $username, $password);
    }*/
    
    
    /*
		database    soc
		user:       soc
		password:   123456
		host    :   localhost
    
    */

    public function __construct($host, $dbname, $username, $password)
    {
		
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        
        $this->connect();
        
    }

    public function connect()
    {
		
        /* 
         for mysql
         $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
         $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        */
        
		$dsn = "pgsql:host={$this->host};dbname={$this->dbname}";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


        try {
			
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            $this->pdo->exec("SET timezone = 'Asia/Tbilisi';");
            
            
            
            /* for mysql
				$this->pdo->exec("SET sql_mode = 'NO_ENGINE_SUBSTITUTION';");
				$this->pdo->exec("SET time_zone = '+04:00';");
            */
            
            
        } catch (PDOException $e) {
			
			file_put_contents($_SERVER['DOCUMENT_ROOT'].'/inc/pdo.txt', $e->getMessage(), FILE_APPEND);
			
            die("Connection failed: " . $e->getMessage());
        }
        
    }
    
    
    
    //not prepared statement
     public function Exec(string $query)
    {
        $statement = $this->pdo->exec($query);
        return $statement;
    }   
    
   
    public function stuff($query)
    {
        $statement = $this->pdo->prepare($query);
        return $statement;
    }   
      
    

    public function getById(string $table, int $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();
    }

    public function getAll(string $table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save($user)
    {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->execute();
    }

    public function delete(string $where, string $col,  int $id)
    {
			
        $stmt = $this->pdo->prepare("delete from $where where $col = ?",[$id]);

		$stmt->execute([$id]);
        
       //return $stmt;
       
    }
   
   
    public function queryUnpr($sql)
    {
        $statement = $this->pdo->query($sql);
        return $statement->fetch();
    } 
    
    public function queryUnprepared($sql)
    {
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
    
    
   public function query($sql, $params = [])
   {
	   
		$kq1 = count($params);
	   
        try {
            $stmt = $this->pdo->prepare($sql);
            
        if ($kq1>0)
			$stmt->execute($params);
		else 
			$stmt->execute();
		
		
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function fetchOne($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function getLastInsertedId()
    {
        return $this->pdo->lastInsertId();
    }
    
 	public function queryCounter($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> rowCount();
	}
	
	public function queryCounterArray($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> rowCount();
	}   
    
   
	public function queryFetchColumn($sql, $params = []) {
		$stmt = $this -> query($sql, $params);
		return $stmt -> fetchColumn();
	}   
     
   
    

    
    public function esc($text) {
        return str_replace(array( '\\', "\0", "\n", "\r", "'", '"', "\x1a" ), array( '\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z' ), $text);
    }
    
    
    
}

		
 
$pdo = new PDOORM("localhost", "hr", "dev", "devi_123");


include("user.php");

//$param = $pdo->fetchOne("SELECT * FROM uzer WHERE id = '11'");


//$param = $pdo->fetchOne("SELECT * FROM uzer WHERE id = ?",[11]);



//$param = $pdo->queryUnpr("SELECT * FROM uzer WHERE id = 25");
//var_dump($param);



//$pdo->query("insert into uzer (name) values(?)",['qwe_kne1zzz_ქქქქქ']);





//if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip2['xff'] = $_SERVER['HTTP_X_FORWARDED_FOR'];$ipa = $_SERVER['HTTP_X_FORWARDED_FOR'];}
//if(isset($_SERVER['HTTP_CLIENT_IP'])){$ip2['cli'] = $_SERVER['HTTP_CLIENT_IP'];$ipa = $_SERVER['HTTP_CLIENT_IP'];}
//if(isset($_SERVER['REMOTE_ADDR'])){$ip2['add'] = $_SERVER['REMOTE_ADDR'];$ipa = $_SERVER['REMOTE_ADDR'];}



//job type
$jjj_type = ['','სრული განაკვეთი','ნახევარი განკვეთი','ჰიბრიდული','დისტანციური','სხვა'];


//salary type
$jjj_salary_type = ['','ყოველთვიური','საათობრივი','7 დღეში ერთხელ','მოლაპარაკებით'];


//experience
$jjj_experience = ['','არ აქვს მნიშვნელობა','1 წელზე ნაკლები','2 წელი','3 წელი','სხვა'];


//job_gender
$jjj_gender = ['','კაცი','ქალი','არ აქვს მნიშვნელობა'];


//job_qualification
$jjj_qualification = ['','Certificate','Diploma','Associate','Bachelors degree','Masters degree','Other'];




function Fetch($query, $column, $id) {
	
                global $pdo;
                $shop = $pdo->query("SELECT * FROM $query WHERE $column = ?", [$id]);
               // $shop -> execute([$idshop]);
                $shop = $shop->fetch(PDO::FETCH_ASSOC);
                
			//	$m = $db->prepare('SELECT * FROM `method` WHERE `id` = ?');
				//$m -> execute([$shop['method']]);
				//$m = $m -> fetch(PDO :: FETCH_ASSOC);
				//return $m[$method];
				return $shop;
            
 }
            
            
            function money($pr,$sum){
				
              if($pr != 0)  $pr = $pr+3;
              $sum = str_replace(',','',$sum);
                $amount = ($pr/100*$sum)+$sum;
            
                return number_format($amount, 2, '.', '');
                
            }






function sendTelegram($user, $text)
{
    	$response = [
				'chat_id' => $user,
				'text' => $text
			];
	$ch = curl_init('https://api.telegram.org/bot' . TOKEN_TG . '/sendMessage');  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_PROXY, PROXY);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);
	curl_close($ch);
 
	return $res;
}
 

 	function notifSend($id,$text){
			global $db,$mailSMTP,$template;
	$us = $db->prepare('SELECT * FROM `users` WHERE `user_id` = ?');
	$us -> execute([$id]);
	$us = $us -> fetch(PDO :: FETCH_ASSOC);
	
	$notif = $db->prepare('UPDATE `users` SET `notif` = ? WHERE `user_id` = ?');
	$notif -> execute([1,$id]);
	
        if(!empty($us['telegram'])) sendTelegram($us['telegram'], $text);
	
$sql = $db->prepare("INSERT INTO `mail` (`user`,`read`,`text`,`time`) VALUES (?,?,?,?)");
$sql->execute([$id,0,$text,time()]);
	
		$from = array(
    "Robot USPAY.ge", //sender name
    "robot@uspay.ge" // send to
);
$msg = nl2br('hello, '.$us['nick'].PHP_EOL.$text);
	
 $mail = $template->render('email.notice', [
    'notice' => $msg
]);
	
	$mailSMTP->send($us['email'], 'hello ...', $mail, $from); 

 
			

			
			
			
		}
		
		
	function setting($var){
	    global $db;
	  $setting = $db->prepare('select * from config where name = ?');
	  $setting -> execute([$var]);
	  $setting = $setting->fetch(PDO :: FETCH_OBJ);
	  return $setting->value;
	}


    function paysum(){
        global $db,$user;
        
    $sql = $db->prepare('select * from `shop` where `user` = ?');
    $sql -> execute([$user->get()->user_id]);
    $sql = $sql -> fetchAll();
        $sum = 0;
            foreach($sql as $res){
                
            $month = $db->prepare('SELECT SUM(`summa`) as sum FROM `payments` WHERE `test` = ? and `status` = ? and `shop` = ?');
            $month -> execute([0,3,$res['id']]);
            $month = $month ->fetch(PDO :: FETCH_ASSOC); 
            
            if($month['sum'] > 0) $sum = $sum + $month['sum'];
            
            }
            
        return $sum;
    }
    
    
    function shop($id){
	    global $db;
	  $shop = $db->prepare('select * from shop where id = ?');
	  $shop -> execute([$id]);
	  $shop = $shop->fetch(PDO :: FETCH_OBJ);
	  return $shop;
	}
	
	
  function method($id){
	    global $db;
	  $method = $db->prepare('select * from method where id = ?');
	  $method -> execute([$id]);
	  $method = $method->fetch(PDO :: FETCH_OBJ);
	  return $method;
	}
	
	
	function Curl(){
	    $ch = curl_init('https://uspay.ge/result/callback');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);
	}






$Time = $_SERVER['REQUEST_TIME'];


?>
