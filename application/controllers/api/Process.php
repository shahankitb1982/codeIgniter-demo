<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * Class Process
 */
class Process extends REST_Controller {

    /**
     * Process constructor.
     */

    public function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->model('Referrals_Model');
        $this->referrals_model = new Referrals_Model;

    }

    /**
     * API to get all data on basis fo referral code.
     *
     */
    public function index_post() {

        $referralcode = $this->post('referralcode');

        if (!empty($referralcode)) {
            $referral = $this->referrals_model->get_referral_by_code($referralcode);

            if ($referral) {
                $this->response($referral, REST_Controller::HTTP_OK);
            }
            else {
                $this->response(['Referral code not exists.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else {
            $this->response(['Referral code required.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
