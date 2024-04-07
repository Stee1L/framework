<h2>Добавление подразделение</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Код подразделения <input type="text" name="id_division"></label>
    <br><label>Название подразделения <input type="text" name="name"></label>
    <br><label>Состав</label>
    <select name="id_view">
        <?php
        foreach ($views as $item) {

            echo "<option value=\"{$item->id_view}\">{$item->view_name}</option>" ;
        }
        ?>
    </select>
    <br><button>Добавить</button>
