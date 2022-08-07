<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\operators;
use CodeIgniter\I18n\Time;
use App\Models\purchase;
use App\Models\userModel;

class purchase_good_by extends BaseController
{
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->userModel = new userModel($this->db); //
        $this->purchase = new purchase($this->db);
        $this->operators = new operators($this->db);
        $this->form_validation = \Config\Services::validation();
        $this->signinValidationErrors = array();
        $this->session = \config\Services::session();
        helper('email');
    }
    public function achat()
    {
        return view('achat/approvisionnement');
    }
    public function addStockitem()
    {
        $correctId = ['idItem' => ['rules' => 'is_not_unique[atm_article.id]'],
        ];
        if (!$this->validate($correctId)) {
            $result['reponse'] = false;
        } else {
            $data = array(
                'idStock' => '',
                'idGoodby' => $this->request->getPost('idGoodby'),
                'idItem' => $this->request->getPost('idItem'),
                'description' => $this->request->getPost('description'),
                'puby' => $this->request->getPost('puby'),
                'qteby' => $this->request->getPost('qteby'),
                'reduction' => $this->request->getPost('reduction'),
                'deleted' => 0,
            );
            
            $this->purchase->addtoTable($data, 'atm_stockitem');
            $result['reponse'] = true;
        }
        echo json_encode($result);
    }
     
    public function deleStockItem($id){ 
        $data = array( 
            'deleted' => 1,
        );
        $this->purchase->deleStockItem($data,$id); 
        echo json_encode($result['reponse'] = true);    
    }
    public function addClient()
    {
         $correctId = ['numero' => [
            'rules' => 'required|is_unique[atm_client.id]']];
        if (!$this->validate($correctId)) {
            $result['reponse'] = false;
        } else {
            $gender = $this->request->getPost('gender');
            if ($gender == 1) {
                $gender = "male";
            } else {
                $gender = "female";
            }

            $data = array(
                'id' => $this->request->getPost('numero'),
                'first_name' => $this->request->getPost('firstName'),
                'last_name' => $this->request->getPost('lastName'),
                'gender' => $this->request->getPost('gender'),
                'address' => $this->request->getPost('address'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'deleted' => 0,
            );
            $this->operators->addClient($data);
            $result['reponse'] = true;
        }
        echo json_encode($result);
    }

    public function client()
    {
        $data = [
            'Clients' => $this->operators->getOperators("atm_client"),
        ];
        return view('operators/client', $data);
    }

    public function addGoodby()
    {
        $correctId = ['idSaler' => ['rules' => 'is_not_unique[atm_saler.id]'],
            'idGoodby' => ['rules' => 'is_unique[atm_goodby.idGoodby]'],
        ];
        if (!$this->validate($correctId)) {
            $result['reponse'] = false;
        } else {
            $data = array(
                'idGoodby' => $this->request->getPost('idGoodby'),
                'reduction' => $this->request->getPost('reduction'),
                'idSaler' => $this->request->getPost('idSaler'),
                'create_at' => $this->request->getPost('create_at'),
                'deleted' => 0,
            );
            $this->purchase->addtoTable($data, 'atm_goodby');
            $result['reponse'] = true;
        }
        echo json_encode($result);
    }

    public function getDataGood_by($idValue)
    {
        echo json_encode($this->purchase->get_goodby_data("atm_goodby", $idValue));
    }

    public function getListGoodby($d = "")
    {
        if ($d ==""){
            $d = Time::createFromDate();
        }
        $data['listGoodby']=$this->purchase->getListGoodby($d);
        $data['resultListGoodby']=$this->purchase->getResultListGood($d);
        echo json_encode($data);
    } 

    public function get_goodby_forpayment_data(){
        echo json_encode($this->payment->get_goodby_forpayment_data());   
    }
 
    public function edit_good_by($id){
        $data = array( 
            'create_at' => $this->request->getPost('create_at'),
            'reduction' => $this->request->getPost('reduction'),
        );
        echo json_encode($this->purchase->edit_good_by($data, $id));
    }

}