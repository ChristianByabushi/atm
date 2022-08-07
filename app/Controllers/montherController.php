<?php
namespace App\Controllers;
class montherController extends BaseController
{ 
//this class avoid recoding functions

//validate submitted data
    protected function validate_submitted_data($fields = array(), $return_errors = false)
    {
        $final_fields = array();

        foreach ($fields as $field => $validate) {
            //we've to add permit_empty rule if the field is not required
            if (strpos($validate, 'required') !== false) {
                //this is required field
            } else {
                //so, this field isn't required, add permit_empty rule
                $validate .= "|permit_empty";
            }

            $final_fields[$field] = $validate;
        }

        if (!$final_fields) {
            //no fields to validate in this context, so nothing to validate
            return true;
        }

        $validate = $this->validate($final_fields);

        if (!$validate) {
            $validation = \Config\Services::validation();
            $message = $validation->getErrors();

            if ($return_errors) {
                return $message;
            }

            echo json_encode(array("success" => false, 'message' => json_encode($message)));
            exit();
        }
    }

}
