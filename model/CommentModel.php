<?php
    include_once('C:\xampp\htdocs\admin_nhahang\model\BaseModel.php');
    class CommentModel extends BaseModel{
        function getComment(){
            $sql="SELECT f.name,c.username,c.message,c.id
            FROM foods f 
            INNER JOIN comment c 
            ON f.id=c.id_food
            WHERE c.status='0'";
            return  $this->loadMoreRows($sql);
        }

        function addRepComment($repMessage,$idCmt){
            $sql="INSERT INTO reply (id, name_rep, message_rep,id_comment)
            VALUES ('','ADMIN','$repMessage','$idCmt')";
            return $this->executeQuery($sql);
        }

        function updateComment($idcmt){
            $sql="UPDATE comment
            SET status ='1'
            WHERE id='$idcmt'";
            return $this->executeQuery($sql);
        }

        function getCmtById($id){
            $sql="SELECT username,message FROM comment WHERE id='$id'";
            return $this->loadOneRow($sql);
        }
    }
?>