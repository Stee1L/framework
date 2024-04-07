<h2>Добавление котосотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Имя <input type="text" name="name"></label>
    <br><label>Фамилия <input type="text" name="Last_name"></label>
    <br><label>Отчество <input type="text" name="Patronymic"></label>
    <br><label>Пол <input type="text" name="gender"></label>
    <br><label>День рождения <input type="date" name="Date_birth"></label>
    <br><label>Адрес <input type="text" name="Residence_address"></label>
    <br><label>Состав</label>
    <select name="id_composition">
        <?php
        foreach ($compositions as $item) {

            echo "<option value=\"{$item->id_composition}\">{$item->name}</option>" ;
        }
        ?>
    </select>
    <br><label>Должность</label>
    <select name="id_position">
        <?php
        foreach ($positions as $item) {

            echo "<option value=\"{$item->id_position}\">{$item->name}</option>" ;
        }
        ?>
    </select>
    <br><label>Подразделение</label>
    <select name="id_division">
        <?php
        foreach ($divisions as $item) {

            echo "<option value=\"{$item->id_division}\">{$item->name}</option>" ;
        }
        ?>
    </select>


    <br><button>Добавить</button>
</form>


