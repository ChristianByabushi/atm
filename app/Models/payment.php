<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class payment extends Model
{
    protected $db;
    public $session;
    public $bdBuider;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        $this->bdBuiderGoodby = $this->db->table('atm_paymentBy');
        // $this->bdBuiderGoodby = $this->db->table('atm_paymentSell');
    }

    public function addPaymentGoodby($array = [])
    {
        $this->bdBuiderGoodby->insert($array);
    }
    public function getPaymentBy($date = "",$kindShow= 0, $limit, $offset)
    {   $groupByTable = "Group by idGoodby"; 
        $query="";
        if ($kindShow != 0) {  
        $groupByTable = " group by atm_paymentby.idPayment"; 
            $query = " SELECT  atm_paymentby.idPayment, atm_goodby.idGoodby, datePayement, concat(atm_saler.first_name,'_',atm_saler.id) as Fssr_id, 
            atm_goodby.reduction, amountPayed FROM atm_goodby, atm_stockitem, atm_saler 
              LEFT JOIN(SELECT atm_paymentby.deleted, atm_paymentby.idPayment, atm_paymentby.idGoodby, atm_paymentby.datePayement, 
              atm_paymentby.amount  as amountPayed
              FROM atm_paymentby $groupByTable) as atm_paymentby on atm_paymentby.idGoodby = idGoodby
              WHERE (atm_paymentby.deleted = 0 and 
              atm_goodby.deleted = 0 and atm_paymentby.datePayement >= '$date' and atm_goodby.idSaler= atm_saler.id) $groupByTable
              Order by datePayement desc limit $limit offset $offset"; 
            } else {
           $query = "SELECT  atm_paymentby.idPayment, atm_goodby.idGoodby,idPayment, datePayement, concat(atm_saler.first_name,'_',atm_saler.id) as Fssr_id, 
        sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction ) as TotalBrut, 
        atm_goodby.reduction, 
        sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)-atm_goodby.reduction as netApayer, amountPayed,
        sum(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)- atm_goodby.reduction - amountPayed as Debt 
          FROM atm_goodby, atm_stockitem, atm_saler 
          LEFT JOIN(SELECT atm_paymentby.deleted, atm_paymentby.idPayment, atm_paymentby.idGoodby, atm_paymentby.datePayement, 
          Sum(atm_paymentby.amount) as amountPayed
          FROM atm_paymentby $groupByTable ) as atm_paymentby on atm_paymentby.idGoodby = idGoodby WHERE ( atm_stockitem.deleted = 0 and atm_paymentby.deleted = 0 and 
          atm_goodby.deleted = 0 and atm_stockitem.idGoodby and atm_paymentby.idGoodby = atm_goodby.idGoodby 
          and atm_paymentby.datePayement >= '$date' and atm_goodby.idSaler= atm_saler.id ) $groupByTable Order by datePayement desc limit $limit offset $offset";
        }
        return $this->db->query($query)->getResult();
    }

    public function getPaymentByResult($date = "", $filter = 0)
    {
        $query = "SELECT SUM(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction) as TotalApayer, 
        (SELECT sum(atm_goodby.reduction) FROM atm_goodby WHERE (atm_paymentby.idGoodby = atm_goodby.idGoodby)) as reductionTotgoodby, 
        SUM(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)- (SELECT SUM(atm_goodby.reduction )
         FROM atm_goodby,atm_paymentby WHERE atm_paymentby.idGoodby = atm_goodby.idGoodby) as netApayer, 
        (SELECT Sum(atm_paymentby.amount) FROM atm_paymentby, atm_goodby 
        WHERE (atm_paymentby.idGoodby = atm_goodby.idGoodby and atm_paymentby.datePayement >='$date')) as montantPaye, 
        SUM(atm_stockitem.puby * atm_stockitem.qteby - atm_stockitem.reduction)- (SELECT SUM(atm_goodby.reduction ) 
        FROM atm_goodby,atm_paymentby WHERE atm_paymentby.idGoodby = atm_goodby.idGoodby)-
        (SELECT Sum(atm_paymentby.amount) FROM atm_paymentby, atm_goodby WHERE (atm_paymentby.idGoodby = atm_goodby.idGoodby)) as Dette
        FROM atm_stockitem, atm_saler, atm_paymentby, atm_goodby 
        WHERE (atm_stockitem.deleted = 0 and atm_paymentby.idGoodby = atm_goodby.idGoodby
         and atm_goodby.idGoodby = atm_stockitem.idGoodby and atm_goodby.idSaler= atm_saler.id  and 
         atm_paymentby.deleted = 0
         and atm_paymentby.datePayement >='$date')";
        return $this->db->query($query)->getRow();
    }
   
    public function getElement($id)
    {
        $result = $this->db->table("atm_paymentby")->select("*")
            ->getWhere(array('idPayment' => $id, 'deleted' => 0));
        return $result->getRow();
    }

    public function get_goodby_data()
    {
        $table = "atm_goodby";
        $result = $this->db->table($table)->select("*")->join('atm_saler', 'atm_saler.id =' . $table . '.idSaler')->orderBy($table . '.create_at', 'DESC')
            ->getWhere(array($table . '.deleted' => 0, 'atm_saler.deleted' => 0));
        return $result->getResult();
    }

    public function edit_payment_by($data = [], $id = "")
    {
        $this->db->table('atm_paymentby')->where('idPayment', $id)->update($data);
    }
    public function deletePayement($data = [], $id = "")
    {
        $this->db->table('atm_paymentby')->where('idPayment', $id)->update($data);
    }
}
