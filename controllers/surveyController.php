<?php

class surveyController extends Survey{
    /**
     * Función que se ejecuta siempre que se crea un objeto.
     * Se puede usar para la seguridad de un controlador.
     */
    public function __construct()
    {
        
    }


    //Mostrar toda la informacion
    public function index(){                
        require_once 'views/layouts/header.php';
        require_once 'views/survey/index.php';
        require_once 'views/layouts/footer.php';
    }

    // Mostar la vista del formulario
    public function create(){
        require_once 'views/layouts/header.php';
        require_once 'views/survey/create.php';
        require_once 'views/layouts/footer.php';
    }

    //'Validaciones e interaccion model
    public function store(){
        echo parent::register($_POST) ? header('location: ?controller=survey') : 'Error en el registro';
    }

    public function storeQuestion(){
        $question = parent::find($_GET['id']);
        require_once 'views/layouts/header.php';
        require_once 'views/question/index.php';
        require_once 'views/layouts/footer.php'; 
    }

    //consultar y luego mostrar la informacion en el formulario
    public function edit(){
        $survey = parent::find($_GET['id']);
        require_once 'views/layouts/header.php';
        require_once 'views/survey/edit.php';
        require_once 'views/layouts/footer.php';
    }

    //Validaciones e interaccion model
    public function update(){
        $_POST['id'] = $_GET['id'];
        if(parent::update_register($_POST)){
            header('location:?controller=survey');
        }else{
            die('Error al actualizar');
        }
    }


    //
    public function delete(){
        $_POST['id'] = $_GET['id'];
        if(parent::delete_register($_POST)){
            header('location:?controller=survey');
        }else{
            die('Error al actualizar');
        }
    }

}