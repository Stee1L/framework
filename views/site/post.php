<h1>Список котиков</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->name . '</li>';
    }
    ?>
</ol>

