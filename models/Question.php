<?php
//Herencia
class Question extends Database{

    public function all($id){
        try{
            $result = parent::connect()->prepare("CALL ReadSurvey_QuestionFromSurvey(?)");
            $result->bindParam(1, $data['id'], PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function register($data){
        try{
            $result = parent::connect()->prepare("CALL CreateSurvey(?, ?)");
            $result->bindParam(1, $data['name'], PDO::PARAM_STR);
            $result->bindParam(2, $data['description'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Survey->register() " . $e->getMessage());
        }
    }

    public function registerQuestion($data){
        try{
            $result = parent::connect()->prepare("CreateQuestion(?,?)");
            $result->bindParam(1, $data['question'], PDO::PARAM_STR);
            $result->bindParam(2, $data['type'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Survey->register() " . $e->getMessage());
        }
    }

    public function find($id){
        try{
            $result = parent::connect()->prepare("CALL ReadSurvey(?)");
            $result->bindParam(1, $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetch();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    //UpdateSurvey(?,?,?)
    public function update_register($data){
        try{
            $result = parent::connect()->prepare("CALL UpdateSurvey(?,?,?)");
            $result->bindParam(2, $data['name'], PDO::PARAM_STR);
            $result->bindParam(3, $data['description'], PDO::PARAM_STR);
            $result->bindParam(1, $data['id'], PDO::PARAM_INT);
            return $result->execute();
        }catch (Exception $e){
            die("Error Survey->update_register() " . $e->getMessage());
        }
    }
    public function delete_register($data){
        try{
            $result = parent::connect()->prepare("CALL DeleteSurvey(?)");
            $result->bindParam(1, $data['id'], PDO::PARAM_INT);
            return $result->execute();
        }catch (Exception $e){
            die("Error Survey->update_register() " . $e->getMessage());
        }
    }
}


