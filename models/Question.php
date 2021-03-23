<?php
//Herencia
class Question extends Database{

    public function allQuestion($id){
        try{
            $result = parent::connect()->prepare("CALL ReadSurvey_QuestionFromSurvey(?)");
            $result->bindParam(1, $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function register_question($data){
        try{
            $result = parent::connect()->prepare("CALL CreateQuestion(?, ?)");
            $result->bindParam(1, $data['question'], PDO::PARAM_STR);
            $result->bindParam(2, $data['type'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register() " . $e->getMessage());
        }
    }
    public function register_answer($data){
        try{
            $result = parent::connect()->prepare("CALL CreateAnswer(?)");
            $result->bindParam(1, $data, PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register_answer() " . $e->getMessage());
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
            die("Error Question->update_register() " . $e->getMessage());
        }
    }
    public function register_survey_question($data){ 
        try{
            $result = parent::connect()->prepare("CALL CreateSurvey_Question(?, ?)");
            $result->bindParam(1, $_GET['id'], PDO::PARAM_STR);
            $result->bindParam(2, $data['question'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register_survey_question() " . $e->getMessage());
        }
    }
    public function register_question_answer($data1,$data2){ 
        try{
            $result = parent::connect()->prepare("CALL CreateQuestion_Answer(?, ?)");
            $result->bindParam(1, $data1, PDO::PARAM_STR);
            $result->bindParam(2, $data2, PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register_question_answer() " . $e->getMessage());
        }
    }

    public function assign($data){ 
        $instruction1 = false;
        $instruction2 = false;
        $instruction3 = false;
        $instruction4 = false;
        $tempCont = 1;
        $answer_register = [];
        foreach($data as $key => $dat){
            if($key == ('opt'.$tempCont) && $dat != ''){
                array_push($answer_register, $dat);
                $tempCont++;
            }
        }
        if($answer_register != []){
            $contador = 0;
            foreach($answer_register as $answer){
                $contador++;
            }
            if($contador>=2){
                $instruction1 = Question::register_question($data);
                $instruction2 = Question::register_survey_question($data);
                foreach($answer_register as $answer){
                    $instruction3 = Question::register_answer($answer);
                    $instruction4 = Question::register_question_answer($data['question'], $answer);
                }
            }else{
                swal("Error", "Debes agregar mas opciones de respuestas", "error");
                header('location: ?controller=question&method=create&id='.$_GET['id']);
            }
        }else{
            $instruction1 = Question::register_question($data);
            $instruction2 = Question::register_survey_question($data);
            $instruction3 = true;
            $instruction4 = true;
        }
        if($instruction1 && $instruction2 && $instruction3 && $instruction4){
            return true;
        }else{
            return false;
        }
    }
}


