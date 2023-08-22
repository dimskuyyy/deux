<section class="upload-section">
    <?php foreach ($data['mem'] as $cek) : ?>
        <div class="form-section">
            <form action="<?= BASEURL; ?>/edit_profile/index/<?= $cek['id']; ?>" method="post" enctype="multipart/form-data" class="form-upload-setting">
                <div class="avatar-setting">
                    <?php if ($cek['user_avatar'] != "") {
                        echo '<img src="' . BASEURL . '/assets/avatar/' . $cek["user_avatar"] . '" style="border-radius:50%"alt="">';
                    } else {
                        echo '<img src="' . BASEURL . '/assets/avatar/undraw_male_avatar_323b.svg" style="border-radius:50%"alt="">';
                    } ?>
                </div>
                <label for="avatar-browse" class="avatar-input">
                    Browse
                    <input type="file" name="avatar" id="avatar-browse" value="C:\\fakepath\\<?= $cek['user_avatar'] ?>">
                </label>
                <div class="setting-account">
                    <label for="username-account">Username</label>
                    <input type="text" name="username" class="account-setting-input" id="username-account" placeholder="Username" value="<?= $cek['username']; ?>" pattern="[A-Za-z0-9_\.\-]{5,25}" title="Only allow characters from A-Z, a-z, 0-9, underscore, period and dash. can't be less than 5 characters and maximal 25 charachters" maxlength="25">

                    <label for="instagram">Instagram Name</label>
                    <input type="text" name="instagram" class="account-setting-input" id="instagram" placeholder="Instagram Name" value="<?= $cek['user_instagram']; ?>" maxlength="75">

                    <label for="location">Location</label>
                    <input type="text" name="location" class="account-setting-input" id="location" placeholder="Location" value="<?= $cek['user_address']; ?>">

                    <label for="website">Website Link</label>
                    <input type="text" name="websiteLink" class="account-setting-input" id="website" placeholder="Website Link" value="<?= $cek['user_websiteLink']; ?>" pattern="https?://.+" title="Include http://">

                    <label for="website">Website Name</label>
                    <input type="text" name="websiteName" class="account-setting-input" id="website" placeholder="Website Name" value="<?= $cek['user_websiteName']; ?>">

                    <label for="description">Description</label>
                    <textarea maxlength="254" name="description" id="description" class="description-account" placeholder="Description" value="<?= $cek['user_description']; ?>"><?= $cek['user_description']; ?></textarea>

                    <button class="button-setting" type="submit" name="change">Change</button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</section>