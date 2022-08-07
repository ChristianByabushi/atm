<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\operators;
use App\Models\purchase;
use App\Models\userModel;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;

class documentExit extends BaseController
{
    private $dompdf;

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
        $this->dompdf = new Dompdf(['chroot' => '/xampp/htdocs/project']);
        $options = $this->dompdf->getOptions();
        $options->set(array('isRemotedEnabled' => true, "isHtml5ParserEnabled"=> true));
        $this->dompdf->setOptions($options);
        
    }
    public function viewprintgoodby($concerndeId)
    {
        $data = [
            "items" => $this->purchase->displayonegooodby($concerndeId),
            "resultgoodby" => $this->purchase->displayonegooodbyResult($concerndeId),
        ];
      
      return  view("achat/goodbyviewprint", $data);

    }

    public function printgoodby($concerndeId="")
    {
        $data = [
            "items" => $this->purchase->displayonegooodby($concerndeId),
            "resultgoodby" => $this->purchase->displayonegooodbyResult($concerndeId),
        ];
        $element = view('achat/goodbyprint', $data);
        $this->dompdf->loadHtml($element);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream('BonAchat.pdf', ['Attachement' => 1]); 
        view("achat/goodbyprint", $data);
    }

    public function ListOfgoodby($d=""){
        if ($d ==""){
            $d = Time::createFromDate();
        }

        $data['listGoodby']=$this->purchase->getListGoodby($d);
        $data['resultListGoodby']=$this->purchase->getResultListGood($d); 
        $data['dateRapport']= Time::createFromDate();
        $this->dompdf->loadHtml(view('achat/listgoodbyprint', $data));
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream('ListBonAchat.pdf', ['Attachement' => 1]); 
        return view('achat/approvisionnement');
    }
      
}