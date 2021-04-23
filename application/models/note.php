<?php
    class Note extends CI_Model{
        public function show_all_notes(){
            return $this->db->query("SELECT * FROM notes")->result_array();
        }
        public function edit_note($edited_note){
            return $this->db->query("UPDATE notes SET title = ?, description = ?, updated_at = NOW() WHERE id = ? ;", array($edited_note['title'], $edited_note['description'], $edited_note['id']));
        }
        public function add_note($title){
            return $this->db->query("INSERT INTO notes (title, created_at) VALUES (?, NOW());", array($title));
        }
        public function delete_note($note){
            return $this->db->query("DELETE FROM notes WHERE id = ?", $note['id']);
        }
    }
?>