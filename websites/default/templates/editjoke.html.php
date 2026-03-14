<form action="" method="post">
  <input type="hidden" name="joke_id" value="<?=$joke['id'];?>">
  <label for="joke_text">Type your joke here:</label>
  <textarea id="joke_text" name="joke_text" rows="3" cols="40"><?=htmlspecialchars($joke['joke_text'], ENT_QUOTES, 'UTF-8')?></textarea>
  <input type="submit" value="Save">
</form>