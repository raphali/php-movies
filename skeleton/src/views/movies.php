<?php ob_start() ?>

<h1>Ma collection</h1>

<input type="text" name="title" id="movie-title">
<select name="type" id="">
    <option value="film">film</option>
    <option value="serie">serie</option>
</select>
<input type="text" name="genre" id="">
<button>submit</button>

<?php render('default', true, [
    'title' => 'My Collection',
    'css' => 'index',
    'content' => ob_get_clean(),]);
