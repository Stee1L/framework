<h2 style="margin-left: auto; margin-right: auto; width: 8em; padding-top: 50px;">Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>

    <form method="post" style="margin-left: auto; margin-right: auto;  width: 18em">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>Логин
            <br><input type="text" name="login" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
            <br><label>Пароль
            <br><input type="password" name="password" style="border: none; -webkit-appearance: none;
  -ms-appearance: none; -moz-appearance: none; appearance: none; background: #f2f2f2;
  padding: 12px; border-radius: 3px; width: 250px; font-size: 14px;"></label>
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
	font-weight: 600;">Войти</button>
    </form>
<?php endif;

