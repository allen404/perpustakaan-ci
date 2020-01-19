<?php
    class c_penerbit extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_penerbit');
            $judul = "DATA PENERBIT";
            $data['judul'] = $judul;
            $data['penerbit'] = $this->model_penerbit->view_penerbit()->result();
            $this->load->view('penerbit',$data);
        }
        
        function input()
        {
            $this->load->view('input_penerbit');
        }
        
        function input_simpan()
        {
            $penerbit = array(
                'id_penerbit'  =>  $this->input->post('id_penerbit'),
                'nama_penerbit'  =>  $this->input->post('nama_penerbit'),
                'alamat_penerbit'    =>  $this->input->post('alamat_penerbit'),
                'no_telp'    =>  $this->input->post('no_telp'));
            $this->db->insert('penerbit',$penerbit);
            redirect('c_penerbit');
        }
        
        function edit()
        {
            $this->load->model('model_penerbit');
            $id_penerbit = $this->uri->segment(3);
            $data['product'] = $this->model_penerbit->product($id_penerbit)->row_array();
            $this->load->view('edit_penerbit',$data);
        }
        
        function edit_simpan()
        {
            $id = $this->input->post('id_penerbit');
            $penerbit = array(
                'id_penerbit'  =>  $this->input->post('id_penerbit'),
                'nama_penerbit'  =>  $this->input->post('nama_penerbit'),
                'alamat_penerbit'    =>  $this->input->post('alamat_penerbit'),
                'no_telp'    =>  $this->input->post('no_telp')

            );
            $this->db->where('id_penerbit',$id);
            $this->db->update('penerbit',$penerbit);
            redirect('c_penerbit');
        }
        
        function delete()
        {
            $this->load->model('model_penerbit');
            $id_penerbit = $this->uri->segment(3);
            $this->db->where('id_penerbit', $id_penerbit);
            $this->db->delete('penerbit');
            $this->model_penerbit->delete($id_penerbit);
            redirect('c_penerbit');
        }

        function penerbit()
        {
            $data['offset'] = $this->uri->segment(3);
        }
        
    }
?>