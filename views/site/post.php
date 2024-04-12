<h1> <?= $message ?? ''; ?> </h1>
<?php if (app()->auth::user()->id_role === 1):?>
    <button onclick="window.location.href='/signup'" style="display: inline-block;
	box-sizing: border-box;
	padding: 0px 20px;
	margin: 15px 15px 15px 15px;
	outline: none;
	border: none;
	border-radius: 6px;
	height: 40px;
	line-height: 40px;
	font-size: 17px;
	font-weight: 600;">Добавить кожанного мешка</button>
<?php else: ?>
    <button onclick="window.location.href='/creatCats' " style="display: inline-block;
	box-sizing: border-box;
	padding: 0px 20px;
	margin: 15px 15px 15px 15px;
	outline: none;
	border: none;
	border-radius: 6px;
	height: 40px;
	line-height: 40px;
	font-size: 17px;
	font-weight: 600;">Добавить кота</button>
    <button onclick="window.location.href='/creatDivision'" style="display: inline-block;
	box-sizing: border-box;
	padding: 0px 20px;
	margin: 15px 15px 15px 15px;
	outline: none;
	border: none;
	border-radius: 6px;
	height: 40px;
	line-height: 40px;
	font-size: 17px;
	font-weight: 600;">Добавить подразделение</button>
    <!-- Форма с выбором по составу -->
    <form action="/hello" method="GET">
        <label for="composition">Выберите состав:</label>
        <select name="id_composition" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
            <?php
            foreach ($compositions as $item) {

                echo "<option value=\"{$item->id_composition}\">{$item->name}</option>" ;
            }
            ?>
        </select>
        <input type="submit" value="Применить">
    </form>
    <form action="/hello" method="GET">
        <label for="division">Выберите подразделение:</label>
        <select name="id_divisions" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
            <?php
            foreach ($divisions as $item) {

                echo "<option value=\"{$item->id_division}\">{$item->name}</option>" ;
            }
            ?>
        </select>
        <input type="submit" value="Применить">
    </form>
<form method="get" action="/hello">
    <input type="submit" value="Сбросить фильтр">
</form>
<?php endif; ?>
<ol>
    <?php
    foreach ($objects as $object) {
       if (app()->auth::user()->id_role === 1){
           echo '<li style="width: 250px; padding: 20px; margin-bottom: 20px; background: #f2f2f2; border-radius: 30px">' . $object->name . ', ' . $object->login . '</li>';
       } else {
           echo "<li style='width: 250px; padding: 20px; margin-bottom: 20px; background: #f2f2f2; border-radius: 30px'>Имя: {$object->name} Фамилия: {$object->Last_name}  
                     <br>Отчество: {$object->Patronymic} Пол: {$object->gender}
                     <br>День рождения: {$object->Date_birth} 
                     <br>Адрес: {$object->Residence_address} 
                     <br>Cостав: {$object->composition->name}
                    <br> Должность: {$object->position->name}
                     <br>Подразделения: {$object->division->name}
                     </li>";


       }

    }
    ?>

</ol>
<?php
if (!is_null($age)) {
    echo "Средний возраст: {$age}";
}
?>



