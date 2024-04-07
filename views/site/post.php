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




