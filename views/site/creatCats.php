<h2 style="margin-left: auto; margin-right: auto; width: 13em; padding-top: 50px;">Добавление котосотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form style="margin-left: auto; margin-right: auto;  width: 18em"  method="post">
    <label>Имя  <br><input type="text" name="name"  style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Фамилия  <br><input type="text" name="Last_name"style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Отчество  <br><input type="text" name="Patronymic" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Пол  <br><input type="text" name="gender" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>День рождения  <br><input type="date" name="Date_birth" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Адрес  <br><input type="text" name="Residence_address" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Состав</label> <br>
    <select name="id_composition" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
        <?php
        foreach ($compositions as $item) {

            echo "<option value=\"{$item->id_composition}\">{$item->name}</option>" ;
        }
        ?>
    </select>
    <br><label>Должность</label> <br>
    <select name="id_position" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
        <?php
        foreach ($positions as $item) {

            echo "<option value=\"{$item->id_position}\">{$item->name}</option>" ;
        }
        ?>
    </select>
    <br><label>Подразделение</label> <br>
    <select name="id_division" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
        <?php
        foreach ($divisions as $item) {

            echo "<option value=\"{$item->id_division}\">{$item->name}</option>" ;
        }
        ?>
    </select>


    <br><button style="display: inline-block;
	box-sizing: border-box;
	padding: 0px 20px;
	margin: 15px 15px 15px 15px;
	outline: none;
	border: none;
	border-radius: 6px;
	height: 40px;
	line-height: 40px;
	font-size: 17px;
	font-weight: 600;">Добавить</button>
</form>


