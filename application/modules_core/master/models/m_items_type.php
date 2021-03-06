<?php

class m_items_type extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_items_type(){
        return $this->db->get('items_type')->result();
    }

    function get_total_rows(){
        return $this->db->get('items_type')->num_rows();
    }
    
    function get_check_duplicate_items($item_name){
        return $this->db->get_where('items_type',array('name'=>$item_name))->row();
    }
    
    function get_check_duplicate_items_ex_self($item_name,$id){
        $sql = "SELECT 
                    it.*
                FROM items_type it
                WHERE
                    it.name='$item_name' AND
                    it.id<>'$id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    function add_items_type($params) {
        $this->db->insert('items_type',$params);
    } 

    function get_item_by_id($id){
        return $this->db->get_where('items_type',array('id'=>$id))->row();
    }

    function edit_items_type($params) {
        $this->db->update('items_type',$params,array('id'=>$params['id']));
    }

    function delete_items($params) {
       $this->db->delete('items_type',$params,array('id'=>$params['id']));
    }

}
