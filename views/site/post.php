<h1> <?= $message ?? ''; ?> </h1>
<ol>
    <?php
    foreach ($objects as $object) {
       if (app()->auth::user()->id_role === 1){
           echo '<li>' . $object->name . ', ' . $object->login . '</li>';
       } else {
           echo "<li>Имя: {$object->name} Фамилия: {$object->Last_name}  
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
<?php if (app()->auth::user()->id_role === 1):?>
    <button onclick="window.location.href='/signup'">Добавить кожанного мешка</button>
<?php else: ?>
    <button onclick="window.location.href='/creatCats'">Добавить кота</button>
<?php endif; ?>



