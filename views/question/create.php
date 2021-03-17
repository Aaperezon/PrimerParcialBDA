<section class="container">
    <h1>Agregar Preguntas</h1>
    <form action="?controller=question&method=store" method="POST" enctype="multipart/form-data">
        <section class="form-group">
            <label for="question">Pregunta</label>
            <input type="text" name="question" id="question" required class="form-control">
        </section>
        <section class="form-group">
             <label for="description">Tipo</label>
             <input type="type" name="type" id="type" required class="form-control"> 
            
            <!--
                <select id="tipopregunta" onchange="SelectedOption()">
                <option value="" disabled selected>Elige tipo de pregunta</option>
                <option id="type" name="type" value="open" >Pregunta abierta</option>
                <option id="type" name="type" value="selection">Pregunta de selección multiple</option>
                <option id="type" name="type" value="multiple" >Pregunta de opción múltiple</option>
            </select>
            -->
            
        </section>
        <div id="questiontype">
        </div>
        <section class="form-group">
            <input type="submit" value="Registrar" class="btn btn-green">
            <a href="?controller=survey" class="btn btn-outline-red ml-2">Volver</a>
            
        </section>
    </form>

</section>