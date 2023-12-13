<?php
class newCrud extends CI_Model
{
//     public function insert($table, $data){
//         $result= $this->db->insert($table, $data);
//         return $result;
//     }
//     public function update($table , $data ,$id){
//         $result = $this->db->where('id', $id)->update($table, $data);
//         return $result;
//     }
//     public function delete($table, $id){
//         $result= $this->db->delete($table, ['id'=>$id]);
//         return $result;
//     }
//     public function get_records($table)
//     {
//         $result= $this->db->get($table)->result();
//         return $result;
//     }
//     public function find_record_by_id($table, $id){
//         $result=$this->db->get_where($table, ['id'=> $id])->row();
//         return $result;
//     }
public function get($table){

    $query = $this->db->get($table);
    return $query->result_array();
}
public function store($table,$data){
    return $this->db->insert($table,$data);

}
public function edit ($table , $id){
    return $this->db->get_where($table,['id'=>$id])->row();
    echo $this->db->last_query();
}
public function update ($table,$id, $data){
    $this->db->where('id',$id);
    return $this->db->update($table,$data );
}
// public function delete( $table , $id){
//     return $this->db->delete($table , ['id'=>$id])->row();
// }
public function deleteRecord($table, $id) {
    return $this->db->delete($table, ['id' => $id]);
}
}