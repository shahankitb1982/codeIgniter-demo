<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referrals extends CI_Controller
{
    public $referrals;

    /**
     * Get All Data from this method.
     *
     * @return Response
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Referrals_Model');
        $this->referrals_model = new Referrals_Model;
    }

    /**
     * Display Data this method.
     *
     * @return Response
     */

    public function index()
    {
        $data['data'] = $this->referrals_model->get_referrals();

        $this->load->view('theme/header');
        $this->load->view('theme/referrals/list', $data);
        $this->load->view('theme/footer');

    }


    /**
     * Show Details this method.
     *
     * @return Response
     */

    public function show($id)
    {

        $referral = $this->referrals_model->find_referral($id);


        $this->load->view('theme/header');
        $this->load->view('theme/referrals/show', array('referral' => $referral));
        $this->load->view('theme/footer');

    }


    /**
     * Create from display on this method.
     *
     * @return Response
     */

    public function create()

    {

        $this->load->view('theme/header');

        $this->load->view('theme/referrals/create');

        $this->load->view('theme/footer');

    }

    /**
     * Create from display on this method.
     *
     * @return Response
     */

    public function process()

    {

        $this->load->view('theme/header');

        $this->load->view('theme/referrals/process');

        $this->load->view('theme/footer');

    }

    /**
     * To validate referral code via AJAX.
     */
    public function validate()
    {
        if (!empty($this->input->post('referralcode'))) {
            $referral = $this->referrals_model->get_referral_by_code($this->input->post('referralcode'));

            if ($referral) {
                echo json_encode($referral);
                exit;
               // redirect(base_url('referrals/show/' . $referral->id));
            } else {
               echo "";
               exit;
//                $this->session->set_flashdata('errors', "Referral code not exists.");
//
//                redirect(base_url('referrals/process'));
            }
        }

    }


    /**
     * Store Data from this method.
     *
     * @return Response
     */

    public function add()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('code', 'Code', 'trim|required|exact_length[6]|alpha_numeric|strtoupper');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());

            redirect(base_url('referrals/create'));

        } else {
            $this->referrals_model->insert_referral();
            redirect(base_url('referrals'));
        }
    }


    /**
     * Edit Data from this method.
     *
     * @return Response
     */

    public function edit($id)
    {

        $referral = $this->referrals_model->find_referral($id);

        $this->load->view('theme/header');
        $this->load->view('theme/referrals/edit', array('referral' => $referral));
        $this->load->view('theme/footer');
    }


    /**
     * Update Data from this method.
     *
     * @return Response
     */

    public function update($id)
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('code', 'Code', 'trim|required|exact_length[6]|alpha_numeric|strtoupper');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('referrals/edit/' . $id));
        } else {

            $this->referrals_model->update_referral($id);

            redirect(base_url('referrals'));

        }

    }


    /**
     * Delete Data from this method.
     *
     * @return Response
     */

    public function delete($id)
    {
        $referral = $this->referrals_model->delete_referral($id);
        redirect(base_url('referrals'));
    }

}
