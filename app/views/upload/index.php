<section class="upload-section">
    <form action="<?= BASEURL; ?>/upload/" method="post" enctype="multipart/form-data" class="form-upload">
        <div class="image-upload">
            <!-- <label for="type-upload">Select the type</label> -->
            <select name="tipe-upload" id="type-upload" class="type_upload">
                <option value="photo">Photo</option>
                <option value="vector">Vector</option>
            </select>
            <label for="imagefile" class="label-imagefile">
                Browse
                <input type="file" name="image-file-upload" id="imagefile" value="" required accept="image/jpeg, image/pjpeg, image/png, image/svg+xml">
            </label>
            <div class="input-file-upload">
                <span>Upload preview</span>
            </div>
        </div>
        <div class="input-section-one">

            <label for="title-upload">Tittle of image</label>
            <input class="input-text-data-upload" id="title-upload" type="text" placeholder="Title" name="image-title" required disabled="disabled" autocomplete="off" pattern="[A-Za-z0-9\s_]{3,255}" maxlength="255" title="only allow characters from A-Z, a-z, 0-9, underscore, and whitespace. cannot be less than 3 characters and maximal 255 characters">

            <label for="location-upload">Location</label>
            <input type="text" name="image-location" id="location-upload" placeholder="Location" class="input-text-data-upload" disabled="disabled" autocomplete="off" pattern="[A-Za-z0-9\s\.\-_,]+" title="only allow characters from A-Z, a-z, 0-9, dash, whitespace, period, coma, and underscore. " maxlength="120">
            <label for="tag-select">Create or select existing categories</label>
            <input type="text" name="image-categories" list="select-list" id="tag-select" placeholder="Categories" class="input-text-data-upload" disabled="disabled" required autocomplete="off" maxlength="15" pattern="[A-Za-z0-9-_]{3,15}" title="only allow characters from A-Z, a-z, 0-9, dash and underscore. cannot be less than 3 characters and more than 15 characters">
            
            <datalist id="select-list" style="max-height: 150px; overflow:auto;">
                <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?= $category['img_category']; ?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label for="caption-upload">Caption</label>
            <textarea class="input-text-data-upload" name="image-caption" id="caption-upload" placeholder="Caption" disabled="disabled" autocomplete="off"></textarea>
            <div class="buttonupload">
                <button type="reset" class="resetupload">Reset</button>
                <button type="submit" class="submitupload" name="submit">Upload</button>
            </div>
            <!-- data-toggle="modal" data-target="#uploadStatus" -->

        </div>
        <div class="input-section-two">
            Conditions for uploading images
            <ul class="terms-upload">
                <li>File size must be smaller than 6MB</li>
                <li>For photos, you can only upload <b><u>jpg, jpeg,</u></b>and<b><u> png</u></b> extension files</li>
                <li>While for vector, you can only upload <b><u>jpg, jpeg,</u></b> and <b><u> png</u></b> extension files</li>

                <li>Fill in the data completely so that your posts are better</li>
            </ul>
        </div>
    </form>
</section>


<!-- Modal -->
<div class="modal fade" id="uploadStatus" tabindex="-1" role="dialog" aria-labelledby="statusTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>