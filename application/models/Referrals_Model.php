<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referrals_Model extends CI_Model {

    public function get_referrals()
    {
        if (!empty($this->input->get("search"))) {

            $this->db->like('email', $this->input->get("search"));
            $this->db->or_like('code', $this->input->get("search"));
        }

        $query = $this->db->get("referrals");

        return $query->result();

    }

    public function insert_referral()
    {

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'code' => $this->input->post('code')
        );

        return $this->db->insert('referrals', $data);

    }

    public function update_referral($id) {

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'code' => $this->input->post('code')
        );

        if ($id == 0) {
            return $this->db->insert('referrals', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('referrals', $data);

        }
    }

    public function find_referral($id)
    {
        return $this->db->get_where('referrals', array('id' => $id))->row();

    }

    public function get_referral_by_code($code)
    {
        return $this->db->get_where('referrals', array('code' => $code))->row();

    }

    public function delete_referral($id)
    {
        return $this->db->delete('referrals', array('id' => $id));
    }


}