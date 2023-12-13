<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class newProj extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        $this->load->model("newCrud");
    }
    // .... Show all data.....
    public function index()
    {
       $data['data']=$this->db->get('newproj')->result();
        $this->load->view('proj/list',$data);
    }

    // ...... create operation.....
    public function create()
    {
        $this->load->view('proj/create');
    }
    // ........ Store DATA.........
    public function store()
    {
        $name = $this->input->POST('name');
        $email = $this->input->POST('email');
         $contact = $this->input->POST('contact'); 
         $suggestion = $this->input->POST('suggestion');
         $data = [
           'name' => $name,
           'email' => $email,
           'contact' => $contact,
           'suggestion' => $suggestion
         ];
         $this->newCrud->store('newproj',$data);
       redirect(base_url());

    }
    // ......... Get data for editing........
    public function edit($id){
        $fetchData = $this->newCrud->edit('newproj',$id);
        if($fetchData){
            $data['data'] = $fetchData;
            $this->load->view('proj/edit',$data);
        

        }else{
            echo "No Data Found";
        }
        
     

        }
        // redirect(base_url());
        // ......... Update Data........
        public function update($id){
            $name = $this->input->POST('name');
             $email = $this->input->POST('email');
              $contact = $this->input->POST('contact'); 
              $suggestion = $this->input->POST('suggestion');
              $data = [
                'name' => $name,
                'email' => $email,
                'contact' => $contact,
                'suggestion' => $suggestion
              ];
              $this->db->where('id', $id);
              $updateQuery = $this->db->update('newproj', $data);
              if($updateQuery){
                echo "Data update successfully";
              }else{
                echo "data not updated";

              }

           
            redirect(base_url());
        }
    //     public function delete( $id){
    //       return $this->db->delete('newproj' , $id);

    //         redirect(base_url());

    // }
    public function delete($id)
{
    // Assuming you have a model method named 'deleteRecord'
    $result = $this->newCrud->deleteRecord('newproj', $id);

    if ($result) {
        $this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to delete record.</div>');
    }

    redirect(base_url());
}
}
