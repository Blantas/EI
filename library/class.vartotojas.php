<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-21
 * Time: 21:03
 */

class vartotojas
{
    private $db;

    private $user_id;
    private $user_name;
    private $user_status;

    public $user_groups = array();

    private $klaiduZinutes;

    function __construct($PDO)
    {
        $this->db = $PDO;

        if($this->arPrisijunges())
        {
            $this->user_id = $_SESSION["user_session"];
            $this->user_name = $_SESSION["user_name"];
            $this->user_status = $_SESSION["user_status"];

            // echo "vartotojas([" . $this->user_id . "] " . $this->user_name . ")<br/>";

            $this->gautiGrupes();
        }
    }

    public function sukurti($user_name, $user_phone, $user_joined, $user_left, $user_status, $user_login, $user_email, $user_pass)
    {
        try {
            $pasleptasSlaptazodis = password_hash($user_pass, PASSWORD_DEFAULT);

            $sql = $this->db->prepare("INSERT INTO ei_users(user_login,user_name,user_email,user_phone,user_joined,user_left,user_status,user_password) 
                                        VALUES(:user_login,:user_name,:user_email,:user_phone,:user_joined,:user_left,:user_status,:user_password)");

            $sql->bindparam(":user_login",      $user_login);
            $sql->bindparam(":user_name",       $user_name);
            $sql->bindparam(":user_email",      $user_email);
            $sql->bindparam(":user_phone",      $user_phone);
            $sql->bindparam(":user_joined",     $user_joined);
            $sql->bindparam(":user_left",       $user_left);
            $sql->bindparam(":user_status",     $user_status);
            $sql->bindparam(":user_password",   $pasleptasSlaptazodis);
            $sql->execute();

            // echo $pasleptasSlaptazodis;
            return $sql;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            $klaiduZinutes[] = $e->getMessage();
        }
    }

    public function prisijungti($user_login, $user_email, $user_password)
    {
        try
        {
            $sql = $this->db->prepare("SELECT * FROM ei_users WHERE user_login=:user_login OR user_email=:user_email LIMIT 1");
            $sql->execute(array(':user_login'=>$user_login, ':user_email'=>$user_email));
            $rezultatas=$sql->fetch(PDO::FETCH_ASSOC);
            if($sql->rowCount() > 0)
            {
                if(password_verify($user_password, $rezultatas['user_password']))
                {
                    $_SESSION["user_session"] = $rezultatas["ID"];
                    $_SESSION["user_name"] = $rezultatas["user_name"];
                    $_SESSION["user_status"] = $rezultatas["user_status"];

                    $this->user_id = $rezultatas["ID"];
                    $this->user_name = $rezultatas["user_name"];
                    $this->user_status = $rezultatas["user_status"];
                    $this->gautiGrupes();
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function gautiGrupes()
    {
        $sql = "SELECT t1.group_ID, t2.group_name FROM ei_user_groups as t1
                JOIN ei_groups as t2 ON t1.group_ID = t2.ID
                WHERE t1.user_ID = :user_id";
        $sql = $this->db->prepare($sql);
        $sql->execute(array(":user_id" => $this->user_id));

        //echo "Priklauso šioms grupėms: ";
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            //echo $row["group_name"] . " ";
            $grupesTeises = (new grupe($this->db))->grupesTeises($row["group_ID"], $this->db);
            $this->user_groups[$row["group_name"]] = $grupesTeises;
        }
        //print_r($this->user_groups);
    }

    public function arTuriTeise($teisesPavadinimas) {
        foreach ($this->user_groups as $grupe)
        {
            if(isset($grupe[$teisesPavadinimas])) return true;
        }
        return false;
    }

    public function arPrisijunges()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
        return false;
    }

    public function eiti($url)
    {
        header("Location: $url");
        exit();
    }

    public function atsijungti()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_status']);
        return true;
    }

    public function klaidos()
    {
        return $this->klaiduZinutes;
    }
}