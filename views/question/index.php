<h1>Lista de Preguntas</h1>

<a href="?controller=question&method=create&id=<?=$_GET['id'] ?>">
    <button class="btn btn-green">Crear</button>
</a>
<table class="table">
    <thead>
        <th>id Survey</th>
        <th>id Question</th>
        <th>Question</th>
        <th>Type</th>
    </thead>
    <tbody>
    <?php $id = $_GET['id']; 
    foreach(parent::allQuestion($id) as $question):  ?>        
        <?php // print_r($id) ?>
        <tr>
            <td><?= $question->id_Survey?></td>
            <td><?= $question->id_Question ?></td>
            <td><?= $question->question ?></td>
            <td><?= $question->type ?></td>
            <td width="200" class="table__options">
                <!--<a href="?controller=question&method=edit&id=<?= $question->id_Survey ?>">
                    <button class="btn btn-outline-green">Editar</button>
                </a>-->
                <a href="?controller=question&method=delete&id=<?= $question->id_Survey ?>">
                <button class="btn btn-outline-red">Borrar</button>
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

