<?php
//Herencia
class Question extends Database{

    public function allQuestion($id){
        try{
            $result = parent::connect()->prepare("CALL ReadQuestion(?)");
            $result->bindParam(1, $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function register_question($data){
        try{
            $result = parent::connect()->prepare("CALL CreateQuestion(?, ?, ?)");
            $result->bindParam(1, $_GET['id'], PDO::PARAM_STR);
            $result->bindParam(2, $data['question'], PDO::PARAM_STR);
            $result->bindParam(3, $data['type'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register_question() " . $e->getMessage());
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
    public function delete_question($data){ 
        try{
            $result = parent::connect()->prepare("CALL DeleteQuestion(?)");
            $result->bindParam(1, $data['id_Question'], PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->delete_question() " . $e->getMessage());
        }
    }
   
    public function register_multiple_options($data1,$data2){ 
        try{
            $result = parent::connect()->prepare("CALL CreateMultiple_Option(?, ?)");
            $result->bindParam(1, $data1, PDO::PARAM_STR);
            $result->bindParam(2, $data2, PDO::PARAM_STR);
            return $result->execute();
        }catch (Exception $e){
           die("Error Question->register_multiple_options() " . $e->getMessage());
        }
    }

    public function assign($data){ 
        $instruction1 = false;
        $instruction2 = false;
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
                foreach($answer_register as $answer){
                    $instruction2 = Question::register_multiple_options($data['question'], $answer);
                }
            }else{
                $pagina = '/proyp1bda/?controller=question&method=create&id='.$_GET['id'];
                echo '<script type="text/javascript">
                        window.confirm("Debes rellenar minimo dos opciones de respuesta")
                        window.location.href="'.$pagina.'", "Thanks for Visiting!"
                    </script>';
            }
        }else{
            $instruction1 = Question::register_question($data);
            $instruction2 = true;
        }
        if($instruction1 && $instruction2){
            return true;
        }else{
            return false;
        }
    }
}


