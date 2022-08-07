<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class userModel extends Model
{
    protected $db;
    public $session;
    public $bdBuider;
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }


    public function logout_user()
    {
        session()->destroy('user_connected');
        return redirect()->to('/');        
    }

    public function authorize_login($email, $password)
    {
        // $sql = "SELECT * FROM `atm_user` WHERE `email` = '".$email."' ";

        $result = $this->db->table("atm_user")->select("*")->getWhere(array("email" => $email, "deleted" => 0));

        //only one result 1 its authorized
        if (count($result->getResult()) !== 1) {
            $msg = "L'adresse mail est incorrect ! ";
            return $msg;
        }
        // we get information about user
        $user_info = $result->getRow();
        
        if ($result) {
            // the time im going to hash the password 
            $authenticatePassword = password_verify($password, $user_info->password);
            //if user and password are okay
            if ($password === $user_info->password) {
                $session = session();
                $session->set('user_connected', $user_info);
                return true;
            } else {
                $msg = "Le mot de passe est incorrect !";
                return $msg;
            }

        }

    }

    public function lastIdProduct($table){
        $result=  $this->db->query('SELECT * FROM '. $table .'')->getResult(); 
        return count($result);
    } 

    public function addClient($array = []){
    $this->db->table('atm_client')->insert($array); 
    }



}
