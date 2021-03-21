<section class="container">
    <h1>Agregar Preguntas</h1>
    <form action="?controller=question&method=assignToQuestion&id=<?=  $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
        <section class="form-group">
            <label for="question">Pregunta</label>
            <input type="text" name="question" id="question" required class="form-control">
        </section>
        <section class="form-group">
            <select id="tipopregunta" onchange="SelectedOption()" name="type">
                <option id="open" value="open" >Pregunta abierta</option>
                <option id="selection"  value="selection">Pregunta de selección multiple</option>
                <option id="multiple"value="multiple" >Pregunta de opción múltiple</option>
            </select>
        </section>
        <div id="questiontype">
        </div>
        <section class="form-group">
            <input type="submit" value="Registrar" class="btn btn-green">
            <a href="?controller=question&method=storeQuestion&id=<?= $_GET['id']?>"  class="btn btn-outline-red ml-2">Volver</a>
            
        </section>
    </form>

</section>