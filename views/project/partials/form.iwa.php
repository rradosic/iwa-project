<label for="uname">Naziv</label>
<input type="text" name="name" placeholder="Naziv">

<label for="pass">Moderator</label>
<select name="moderator" id="">
    <?php foreach($moderators as $key=>$moderator) : ?>
        <option value="<?= $moderator->korisnik_id ?>"><?= $moderator->fullName() ?></option>
    <?php endforeach ?>
</select>

<input type="submit" class="submit-button float-right" value="Pošalji">