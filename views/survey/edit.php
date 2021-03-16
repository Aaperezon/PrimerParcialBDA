<section class="container">
    <h1>Editar Encuesta</h1>
    <form action="?controller=survey&method=update&id=<?= $survey->id ?>" method="POST">
        <section class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required class="form-control" value="<?= $survey->name ?>">
        </section>
        <section class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" name="description" id="description" required class="form-control" value="<?= $survey->description ?>">
        </section>
        <section class="form-group">
            <input type="submit" value="Actualizar" class="btn btn-green">
            <a href="?controller=survey" class="btn btn-outline-red ml-2">Volver</a>
        </section>
    </form>
</section>