<?php
    class c_penulis extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_penulis');
            $judul = "DATA PENULIS";
            $data['judul'] = $judul;
            $data['penulis'] = $this->model_penulis->view_penulis()->result();
            $this->load->view('penulis',$data);
        }
        
        function input()
        {
            $this->load->view('input_penulis');
        }
        
        function input_simpan()
        {
            $penulis = array(
                'id_penulis'  =>  $this->input->post('id_penulis'),
                'nama_penulis'  =>  $this->input->post('nama_penulis'),
                'alamat_penulis'    =>  $this->input->post('alamat_penulis'),
                'no_telp'    =>  $this->input->post('no_telp'));
            $this->db->insert('penulis',$penulis);
            redirect('c_penulis');
        }
        
        function edit()
        {
            $this->load->model('model_penulis');
            $id_penulis = $this->uri->segment(3);
            $data['product'] = $this->model_penulis->product($id_penulis)->row_array();
            $this->load->view('edit_penulis',$data);
        }
        
        function edit_simpan()
        {
            $id = $this->input->post('id_penulis');
            $penulis = array(
                'id_penulis'  =>  $this->input->post('id_penulis'),
                'nama_penulis'  =>  $this->input->post('nama_penulis'),
                'alamat_penulis'    =>  $this->input->post('alamat_penulis'),
                'no_telp'    =>  $this->input->post('no_telp')

            );
            $this->db->where('id_penulis',$id);
            $this->db->update('penulis',$penulis);
            redirect('c_penulis');
        }
        
        function delete()
        {
            $this->load->model('model_penulis');
            $id_penulis = $this->uri->segment(3);
            $this->db->where('id_penulis', $id_penulis);
            $this->db->delete('penulis');
            $this->model_penulis->delete($id_penulis);
            redirect('c_penulis');
        }

        function penulis()
        {
            $data['offset'] = $this->uri->segment(3);
        }
        
    }
?>