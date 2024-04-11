<h2 style="margin-left: auto; margin-right: auto; width: 13em; padding-top: 50px;">Добавление кожанного мешка</h2>

<pre><?= $message ?? ''; ?></pre>

<form style="margin-left: auto; margin-right: auto;  width: 18em" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label>Имя <input type="text" name="name" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <label>Логин <input type="text" name="login" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <label>Пароль <input type="password" name="password" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
    <button style="display: inline-block;
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


