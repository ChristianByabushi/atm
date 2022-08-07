<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class purchase extends Model
{
    protected $db;
    public $session;
    public $bdBuider;
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        $this->bdBuider = $this->db->table('atm_article');
    }

    public function lastIdProduct()
    {
        $result = $this->db->query('SELECT * FROM atm_article')->getResult();
        return count($result);
    }

    public function deleStockItem($data=[], $id=""){
        $this->db->table('atm_goodby')->where('idGoodby', $id)->update($data); 

    } 

    public function getListGoodby($data)
    {
        $query = "SELECT atm_goodby.idGoodby, atm_goodby.create_at, concat(atm_saler.first_name,'_',atm_saler.id) as Fssr_id, sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction ) as TotalApayer,
        atm_goodby.reduction, sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)- atm_goodby.reduction as netApayer
        FROM atm_stockitem, atm_saler, atm_goodby WHERE (atm_stockitem.deleted = 0 and atm_goodby.deleted = 0 
        and atm_goodby.idGoodby = atm_stockitem.idGoodby and atm_goodby.idSaler= atm_saler.id and
        atm_goodby.create_at >='$data') GROUP by atm_goodby.idGoodby Order by atm_goodby.create_at asc"; 
        return $this->db->query($query)->getResult();
    }

    public function getResultListGood($date)
    {
        $query = "SELECT sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction) as TotalApayer,
        (SELECT sum(atm_goodby.reduction ) FROM atm_goodby WHERE (atm_goodby.create_at >='$date')) as reductionTotgoodby,
        SUM(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)- (SELECT sum(atm_goodby.reduction )
        FROM atm_goodby WHERE (atm_goodby.create_at >='$date')) as netApayer FROM atm_stockitem, atm_saler, atm_goodby
        WHERE (atm_stockitem.deleted = 0 and atm_goodby.deleted = 0 and atm_goodby.idGoodby = atm_stockitem.idGoodby and atm_goodby.idSaler= atm_saler.id
        and atm_goodby.create_at >='$date')
        Order by atm_goodby.create_at asc";
        return $this->db->query($query)->getRow();
    }

    public function allFrom($table)
    {
        return $this->db->query('SELECT * FROM ' . $table)->getResult();
    }
   
    public function displayonegooodbyResult($id)
    {
        $query = "SELECT atm_goodby.idGoodby, atm_goodby.create_at, concat(atm_saler.first_name, '-', atm_saler.last_name) as nameSaler,
          SUM(atm_stockitem.reduction) as ReductionBrute, SUM(atm_stockitem.puby * atm_stockitem.qteby ) as totNoReduction,
          SUM(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction) as totBrut, atm_goodby.reduction as reductionBon,
          (SUM(atm_stockitem.puby * atm_stockitem.qteby- atm_stockitem.reduction)-(atm_goodby.reduction) )as netApayer
           FROM atm_goodby,atm_saler, atm_stockitem
        WHERE(atm_stockitem.idGoodby = $id and atm_goodby.idGoodby = $id and atm_goodby.idSaler = atm_saler.id and atm_stockitem.deleted=0)";
        return $this->db->query($query)->getRow(); 
    }
  
    public function displayonegooodby($id)
    {
        $query = "SELECT atm_stockitem.idStock, atm_article.title, atm_stockitem.idGoodby,
        atm_stockitem.description, atm_stockitem.puby, atm_stockitem.qteby, atm_stockitem.reduction,
        (atm_stockitem.puby * atm_stockitem.qteby) as totbrutNoReduction,
         (atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction) as pt FROM atm_stockitem,
        atm_article WHERE(atm_stockitem.idGoodby = " . $id . " and atm_article.id = atm_stockitem.idItem )";
        return $this->db->query($query)->getResult();
    } 
    
    public function getElementWhere($table, $id){ 
        $result = $this->db->table($table)->select("*")->getWhere(array("id" => $id, "deleted" => 0)); 
        return $result->getResult();
    }

    public function getElementWher($table, $idValue)
    {
        $result = $this->db->table($table)->select("*")->getWhere(array("id" => $idValue, 
         $table.'.deleted' => 0, 'atm_saler.deleted' => 0));
        return $result->getResult();
    }
    
    public function get_goodby_data($table, $idValue)
    {
        $result = $this->db->table($table)->select("*")->join('atm_saler', 'atm_saler.id ='. $table.'.idSaler')
         ->getWhere(array('idGoodby'=> $idValue, $table.'.deleted' => 0, 'atm_saler.deleted' => 0));
        return $result->getRow();
    }     
 
    //part of
    public function addtoTable($array = [], $table)
    {
        $this->db->table($table)->insert($array);
    }
   
    public function edit_good_by($data=[], $id=""){
        $this->db->table('atm_goodby')->where('idGoodby', $id)->update($data);
    }
    //part of stock item

}