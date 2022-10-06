<?php

class Format{
    public function formatDate($date){
       return date('F j, Y, g:i a', strtotime($date));
    }
    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }
}
?>