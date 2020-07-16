<label for="name">Naziv</label>
<input type="text" class="input" name="name" value="<?= $project->naziv ?>" placeholder="Naziv">

<?php if(IWA\Auth::user()->hasRole('administrator') || IWA\Auth::user()->hasRole('voditelj')) : ?>
<label for="description">Opis</label>
<textarea name="description" id="" value="<?= $project->opis ?>" class="input" cols="30" rows="5"></textarea>
<?php endif ?>

<?php if(IWA\Auth::user()->hasRole('korisnik')) : ?>
<label for="moderator">Moderator</label>
<select name="moderator" class="input" id="">
    <?php foreach($moderators as $key=>$moderator) : ?>
        <option value="<?= $moderator->korisnik_id ?>"><?= $moderator->fullName() ?></option>
    <?php endforeach ?>
</select>
<?php endif ?>

<?php if(IWA\Auth::user()->hasRole('administrator') || IWA\Auth::user()->hasRole('voditelj')) : ?>
<h3> Unos stavki</h3>

<table>
    <thead>
        <th>Kategorija</th>
        <th>Slika</th>
        <th>Video</th>
    </thead>
    <tbody id="entries-container">
        <tr>
            <td>
                <?php IWA\Form::select('category[]', $categories) ?>
            </td>
            <td><input type="text" name="category_pic[]" id=""></td>
            <td><input type="text" name="category_vid[]" id=""></td>
        </tr>
    </tbody>
</table>

<div class="flex-center">
        <a onclick="addCategory()" class="button-primary margin-top">Dodaj novu</a>
    </div>
<?php endif ?>

<input type="submit" class="submit-button " value="Pošalji">
<input type="button" onclick="window.history.back()" class="cancel-button " value="Odustani">

<script>
    var categoryTemplate = `
        <tr>
            <td>
                <?php IWA\Form::select('category[]', $categories) ?>
            </td>
            <td><input type="text" name="category_pic[]" id=""></td>
            <td><input type="text" name="category_vid[]" id=""></td>
        </tr>
    `;

    function addCategory(){
        var container = document.getElementById('entries-container');

        container.insertAdjacentHTML('afterend', categoryTemplate);
    }
</script>