<section class="container">
    <h1>Agregar Preguntas</h1>
    <form action="?controller=survey&method=storeQuestion&id=<?= $survey->id ?>" method="POST" enctype="multipart/form-data">
        <section class="form-group">
            <label for="question">Pregunta</label>
            <input type="text" name="question" id="question" required class="form-control">
        </section>
        <section class="form-group">
            <label for="description">Tipo</label>
            <input type="Type" name="Type" id="Type" required class="form-control">
        </section>
        <section class="form-group">
            <input type="submit" value="Registar" class="btn btn-green">
            <a href="?controller=survey" class="btn btn-outline-red ml-2">Volver</a>
        </section>
</section>