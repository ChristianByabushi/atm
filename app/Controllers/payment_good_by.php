<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\operators;
use App\Models\payment;
use CodeIgniter\I18n\Time;
use App\Models\purchase;
use App\Models\userModel;

class payment_good_by extends BaseController
{
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->userModel = new userModel($this->db); //
        $this->payment = new payment($this->db);
        $this->operators = new operators($this->db);
        $this->form_validation = \Config\Services::validation();
        $this->signinValidationErrors = array();
        $this->session = \config\Services::session();
    }

    public function addByPayment(){ 
        $data = array(
            'idPayment' =>null,
            'idGoodby' => $this->request->getPost('idGoodby'),
            'datePayement' => $this->request->getPost('datePayement'),
            'amount' => $this->request->getPost('amount'),
            'deleted' => 0
        );
        $this->payment->addPaymentGoodby($data);
        $result['reponse'] = true;
        echo json_encode($data); 
    } 

    public function loadListPaymentBy($d = "",$Kindshow= 0, $limit="10", $offset=1)
    {
        if ($d ==""){
            $d = Time::createFromDate();
        }  
        $data['listPayment']=$this->payment->getPaymentBy($d, $Kindshow,$limit,$offset);  
        $data['resultListPayment']=$this->payment->getPaymentByResult($d);
        echo json_encode($data);    
    } 
    public function getElementPayment($id){ 
        echo json_encode($this->payment->getElement($id));
    }  
    public function get_goodby_saler_data(){
        echo json_encode($this->payment->get_goodby_data());
    } 
    public function editPaymentby($id){
        $data = array( 
            'datePayement' => $this->request->getPost('datePayement'),
            'amount' => $this->request->getPost('amount'),
            'idGoodby' => $this->request->getPost('idGoodby'),
        ); 
        $this->payment->edit_payment_by($data, $id);
        $result['reponse'] = true;
        echo json_encode($result); 
    } 
public function deletePayement($id){ 
     $this->payment->deletePayement(array("deleted"=>1), $id); 
    $result['reponse'] = true;
    echo json_encode($result); 
} 
} 
