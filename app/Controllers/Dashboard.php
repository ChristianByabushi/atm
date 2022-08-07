<?php
namespace App\Controllers;

use App\Models\purchase;
use App\Models\userModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    //operators
    private $db;
    private $userModel;
    private $purchase;
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->userModel = new userModel($this->db); //
        $this->purchase = new purchase($this->db);
        $this->form_validation = \Config\Services::validation();
        $this->signinValidationErrors = array();
        $this->session = \config\Services::session();
        helper('email');
    }

    public function index()
    {
        return view('dashboard/main');
    }

    public function profile()
    {
        return view('profile/infoUpdate');
    }

    public function customer()
    {
        return view('operators/customer');
    }
    public function getElementId($table, $idValue)
    {
        echo json_encode($this->purchase->getElementWhere($table, $idValue));
    } 

        
    

   
    public function getNumberOfItems($table)
    {
        echo json_encode($this->userModel->lastIdProduct($table));
    }
    public function lastProductId()
    {
        echo json_encode($this->purchase->lastIdProduct());
    }

       public function allFrom($table)
    {
        echo json_encode($this->purchase->allFrom($table));
    }

    public function bien()
    {
        return view('achat/defineGood');
    }
    public function signin()
    {
        return view('signin/index');
    }

    public function signOut()
    {
        session()->destroy('user_connected');
        return redirect()->to('/');
    }

    public function essai()
    {
        if (isset($_POST)) {
            $email = $this->request->getPost("username");
            $password = $this->request->getPost("password");
        } else {
            $email = "rien";
        }

        $data = [
            'user_info' => $this->userModel->authorize_login($email, $password),
            'email' => $email,
        ];
        return view('signin/essai', $data);
    }

    // Authorise the connection to dashbord
    public function authenticate()
    {
        $rules = [
            'UserEmail' => [
                'rules' => 'required||valid_email|',
                'label' => 'Error Email ',
                'errors' => [
                    'required' => 'Adresse mail est requise svp!',
                    'valid_email' => 'L\'email n\'est pas valide, veuillez le modifier',
                ],
            ],
            'UserPassword' => [
                'rules' => 'required|min_length[4]|max_length[50]|',
                'label' => 'Error name ',
                'errors' => [
                    'required' => 'Le mot de passe est requis',
                ],
            ],
        ];

        if (isset($_POST)) {
            $email = $this->request->getPost("username");
            $password = $this->request->getPost("password");
        } else {
            $email = "rien";
        }
        $session = session();

        if ($this->validate($rules)) {
            $session->setFlashdata("validation", $this->validator->getErrors());
            return redirect()->to('/');
        }

        $result = $this->userModel->authorize_login($email, $password);

        if ($result !== true) {
            //authentication failed
            $session->setFlashdata("passWordEmailError", $result);
            return redirect()->to('/');

        }
        //authentication success
        return redirect()->to('dashboard/index');
    }
    public function rulesProduct()
    {
        $rules = [
            'numero' => [
                'rules' => 'required',
                'label' => 'Error Number ',
                'errors' => [
                    'required' => 'Le numero n\'est pas correct',
                ],
            ],
            'title' => [
                'rules' => 'required',
                'label' => 'Error Number ',
                'errors' => [
                    'required' => 'Le titre n\'est doit pas etre vide',
                ],
            ],
            'description' => [
                'rules' => 'required',
                'label' => 'Error Number ',
                'errors' => [
                    'required' => 'La dimension est requise',
                ],
            ],
            'dimension' => [
                'rules' => 'required',
                'label' => 'Error dimension ',
                'errors' => [
                    'required' => 'La dimension est requise',
                ],
            ],
            'qualite' => [
                'rules' => 'required',
                'label' => 'Error dimension ',
                'errors' => [
                    'required' => 'La qualité ne doit pas etre vide',
                ],
            ],
        ];
        return $rules;
    }

    public function recordProduct()
    {
        $rules = [
            'numero' => [
                'rules' => 'required|is_unique[atm_article.id]',
                'label' => 'Error Number ',
                'errors' => [
                    'required' => 'Erreur : Le numero n\'est pas correct ',
                    'is_unique' => 'le numero du bien doit etre unique',
                ],
            ],

            'image' => [
                'rules' => 'is_image[image]',
            ],

            'categorie' => [
                'rules' => 'required|is_not_unique[atm_categorie.id]',
                'label' => 'Error Email ',
                'errors' => [
                    'required' => 'Categorie vide!',
                    'is_not_unique' => ' Erreur : Vous devez selectionner une categorie valide',
                ],
            ],

        ];

        $session = session();

        if ($this->validate($rules)) {
            // record product
            $file = $this->request->getFile('image');

            $correctImage = ['image' => [
                'rules' => 'is_image[image]',
            ]];
            if ($file->isValid() && !$file->hasMoved() && ($this->validate($correctImage))) {
                $file->move('./uploads/productImage');
            }

            $data = array(
                'id' => $this->request->getPost('numero'),
                'title' => $this->request->getPost('title'),
                'qualite' => $this->request->getPost('qualite'),
                'dimension' => $this->request->getPost('dimension'),
                'idCategorie' => $this->request->getPost('categorie'),
                'description' => $this->request->getPost('description'),
                'created_at' => $this->request->getPost('create_at'),
                'image' => $file->getName(),
                'deleted' => 0,
            );
            $this->purchase->addtoTable($data, 'atm_article');
            $dataValidation['success'] = true;
        } else { // when there's error
            //$dataValidation['errorDetected'] = $this->validator->listErrors();
            $dataValidation['errorDetected'] = true;
        }
        echo json_encode($dataValidation);
        //data    return view('achat/approvisionnement',$dataValidation );
        //        return view('achat/approvisionnement', $dataValidation);
    }

}
