<?php
class HomePage{
    public function getUserCount($db){
        if($db!=false&&$db!=null){
            $query=$db->prepare("SELECT COUNT(*) FROM user");
            $query->execute();
            $result=$query->fetch(PDO::FETCH_ASSOC);
            return $result["COUNT(*)"];
        }
        return "Err";
    }
    public function getLibraryFileCount($db){
        if($db!=false&&$db!=null){
            $query=$db->prepare("SELECT COUNT(*) FROM music");
            $query->execute();
            $result=$query->fetch(PDO::FETCH_ASSOC);
            return $result["COUNT(*)"];
        }
        return "Err";
    }
    public function getFilesConvertedCount($db){
        if($db!=false&&$db!=null){
            $query=$db->prepare("SELECT COUNT(*) FROM jobs WHERE completed=1");
            $query->execute();
            $result=$query->fetch(PDO::FETCH_ASSOC);
            return $result["COUNT(*)"];
        }
        return "Err";
    }
}
?>