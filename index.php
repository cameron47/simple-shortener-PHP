<?php
Class short{
	private $servername = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'shortener';
	private $conn;

	function __construct() {
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$this->conn = $conn;
	}
	private function check_key($key){
		$query = "SELECT * FROM url_short WHERE keys_url = '$key'";
		$result = mysqli_query($this->conn,$query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
		else{
			return false;
		}
	}
	private function insert2shortlink($url,$key){
		$query = "INSERT INTO url_short (url,keys_url,view) VALUES ('$url','$key','0')";
		$result = mysqli_query($this->conn,$query);
	}
	private function update_view($key,$view){
		$query = "UPDATE url_short set view='$view' WHERE keys_url='$key'";
		$result = mysqli_query($this->conn,$query);
	}
	private function script_redirect($data){
		$this->update_view($data['keys_url'],$data['view']+1);
		return '<meta http-equiv="refresh" content="0; url='.$data['url'].'/" />';
	}
	private function generator_key($length = 10){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}
	public function executes($url=null,$key=null){
		if($url==null){
			$check_key = $this->check_key($key);
			if($check_key !== false) {
				return $this->script_redirect($check_key);
			}
		}elseif($key==null){
			$keys = $this->generator_key(5);
			$check_key = $this->check_key($keys);
			if($check_key !== false) {
				return $this->script_redirect($check_key);
			}
			$this->insert2shortlink($url,$keys);
			$shorturl = 'shorturl : '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?key='.$keys;
			$shorturl = str_replace("?url=$url","",$shorturl);
			return $shorturl;
		}
	}
}
$short = new short;
if(isset($_GET['url'])){
echo $short->executes($_GET['url'],null);
die();
}elseif(isset($_GET['key'])){
echo $short->executes(null,$_GET['key']);
die();
}else{
	echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?url=example.com'.' OR '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?key=keyxa';
}
