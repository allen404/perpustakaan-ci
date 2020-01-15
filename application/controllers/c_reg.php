<?php
    class c_reg extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_regbuku');
            $judul = "DATA REGISTRASI BUKU";
            $data['judul'] = $judul;
            $data['reg_buku'] = $this->model_regbuku->view_reg_buku()->result();
            $this->load->view('reg_buku',$data);
        }
        
        function input()   
        {
            $this->load->view('input_regbuku');
        }
        
        function input_simpan()
        {
            $reg_buku = array(
                'no_reg'  =>  $this->input->post('no_reg'),
                'id_buku'    =>  $this->input->post('id_buku'),
                'kode_rak' => $this->input->post('kode_rak'),
                'tgl_registrasi' => $this->input->post('tgl_registrasi'));

            $this->db->insert('reg_buku',$reg_buku);
            redirect('c_reg');
        }
        
        function edit()
        {
            $this->load->model('model_regbuku');
            $no_reg = $this->uri->segment(3);
            $data['product'] = $this->model_regbuku->product($no_reg)->row_array();
            $this->load->view('edit_regbuku',$data);
        }
        
        function edit_simpan()
        {
            $id = $this->input->post('no_reg');
            $reg_buku = array(
                'no_reg'  =>  $this->input->post('no_reg'),
                'id_buku'    =>  $this->input->post('id_buku'),
                'kode_rak' => $this->input->post('kode_rak'),
                'tgl_registrasi' => $this->input->post('tgl_registrasi'));

            $this->db->where('no_reg',$id);
            $this->db->update('reg_buku',$reg_buku);
            redirect('c_reg');
        }
        
        function delete()
        {
            $this->load->model('model_regbuku');
            $no_reg = $this->uri->segment(3);
            $this->db->where('no_reg', $no_reg);
            $this->db->delete('reg_buku');
            $this->model_regbuku->delete($no_reg);
            redirect('c_reg');
        }

        function reg_buku()
        {
            $data['offset'] = $this->uri->segment(3);
        }
        
    }
?>