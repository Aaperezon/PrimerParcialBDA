<section class="container">
    <h1>Crear Encuesta</h1>
    <form action="?controller=survey&method=store" method="POST" enctype="multipart/form-data">
        <section class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required class="form-control">
        </section>
        <section class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" name="description" id="description" required class="form-control">
        </section>
        <section class="form-group">
            <input type="submit" value="Registar" class="btn btn-green">
            <a href="?controller=survey" class="btn btn-outline-red ml-2">Volver</a>
        </section>
    </form>
</section>