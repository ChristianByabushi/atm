<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class operators extends Model
{
    protected $db;
    public $session;
    public $bdBuider;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        $this->bdBuider = $this->db->table('atm_article');
    }

    public function addClient($array = [])
    {
        $this->db->table('atm_client')->insert($array);
    }  

    public function  getOperators($table){
        $result = $this->db->table($table)->select("*")->getWhere(array("deleted" => 0));
        return $result->getResult();
    } 
    public function allArticles(){
        return  $this->db->query('SELECT * FROM atm_article')->getResult(); 
    } 

}
