<?php

class Report {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getReports(){
        $this->db->query('SELECT *
                            FROM reports
                            ORDER BY entry_at DESC');
        $result = $this->db->resultSet();

        return $result;
    }

    public function addReport($data){
        $this->db->query('INSERT INTO reports(amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_by) VALUES (:amount, :buyer, :receipt_id, :items, :buyer_email, :buyer_ip, :note, :city, :phone, :hash_key, :entry_by)');
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':buyer', $data['buyer']);
        $this->db->bind(':receipt_id', $data['receipt_id']);
        $this->db->bind(':items', $data['items']);
        $this->db->bind(':buyer_email', $data['buyer_email']);
        $this->db->bind(':buyer_ip', $data['buyer_ip']);
        $this->db->bind(':note', $data['note']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':hash_key', $data['hash_key']);
        $this->db->bind(':entry_by', $data['entry_by']);
        
        //execute 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //delete a report
    public function deleteReport($id){
        $this->db->query('DELETE FROM reports WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    // search report
    public function searchReport($data){        
        $this->db->query('SELECT * FROM reports WHERE entry_at between :fromDate AND :toDate');
        if($data['userId']){
            $this->db->query('SELECT * FROM reports WHERE entry_at between :fromDate AND :toDate AND entry_by = :userId ');
        }
        $this->db->bind(':fromDate', $data['fromDate']);
        $this->db->bind(':toDate', $data['toDate']);
        if($data['userId']){
            $this->db->bind(':userId', $data['userId']);
        }        
        $result = $this->db->resultSet();
        return $result;
    }
}