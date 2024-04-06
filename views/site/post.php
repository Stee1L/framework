<h1> <?= $message ?? ''; ?> </h1>
<ol>
    <?php
    foreach ($objects as $object) {
        echo '<li>' . $object->name . ', ' . $object->login . '</li>';
    }
    ?>

</ol>

<button>Добавить кожанный мешок</button>

