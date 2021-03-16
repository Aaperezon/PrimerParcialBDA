<h1>Lista de Encuestas</h1>

<a href="?controller=survey&method=create">
    <button class="btn btn-green">Crear</button>
</a>
<table class="table">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>name</th>
        <th>Opciones</th>
    </thead>
    <tbody>
    <?php foreach(parent::all() as $survey):  ?>
        <tr>
            <td><?= $survey->id ?></td>
            <td><?= $survey->name ?></td>
            <td><?= $survey->description ?></td>
            <td width="200" class="table__options">
                <a href="?controller=survey&method=edit&id=<?= $survey->id ?>">
                    <button class="btn btn-outline-green">Editar</button>
                </a>
                <a href="?controller=survey&method=storeQuestion&id=<?= $survey->id ?>">
                <button class="btn btn-outline-green">Preguntas</button>
                </a>
                <a href="?controller=survey&method=delete&id=<?= $survey->id ?>">
                <button class="btn btn-outline-red">Borrar</button>
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

