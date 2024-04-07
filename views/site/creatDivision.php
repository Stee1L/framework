<h2 style="margin-left: auto; margin-right: auto; width: 13em; padding-top: 50px;">Добавление подразделение</h2>
<h3><?= $message ?? ''; ?></h3>
<form style="margin-left: auto; margin-right: auto;  width: 18em"  method="post">
    <label>Код подразделения
        <br><input type="text" name="id_division" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;" ></label>
    <br><label>Название подразделения
        <br><input type="text" name="name" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <br><label>Состав</label>
    <br><select name="id_view" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;">
        <?php
        foreach ($views as $item) {

            echo "<option value=\"{$item->id_view}\">{$item->view_name}</option>" ;
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
