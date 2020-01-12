<?php 

class Admin_model extends CI_model {
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function getUser($limit, $start)
    {
        return $this->db->get('user',$limit,$start)->result_array();
    }
    public function countAllUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function tambahDataUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_identitas" => $this->input->post('no_identitas', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "password" => md5($this->input->post('password')),
            "level" => $this->input->post('level',true)
        ];

        $this->db->insert('user', $data);
    }

    public function hapusDataUser($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('user', ['id' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function ubahDataUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "no_identitas" => $this->input->post('no_identitas', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "password" => md5($this->input->post('password')),
            "level" => $this->input->post('level',true)
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('no_identitas', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('user')->result_array();
    }
}