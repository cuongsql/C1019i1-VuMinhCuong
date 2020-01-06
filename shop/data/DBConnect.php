<?php
class DBConnect
{
    protected $dns;
    protected $user_data;
    protected $password_data;
    
    public function __construct($dns, $user_data, $password_data) {
        $this->dns = $dns;
        $this->user_data = $user_data;
        $this->password_data = $password_data;
    }

    public function connect()
    {
        $conn = null;
        try{
            $conn = new PDO($this->dns,$this->user_data,$this->password_data);
        } catch(PDOException $e){
            return $e->getMessager();
        }
        return $conn;
    }
}