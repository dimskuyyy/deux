<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mt-5">
            <h3 class="mb-1">Posting settings</h3>
            <p>You can manage the posts that you have posted</p>
            <!-- <form action="" method="post">
                <div class="ui action input w-100 mb-3 mt-2">
                    <input type="text" placeholder="Search..." name="search" autocomplete="off">
                    <select class="ui compact selection dropdown" name="filter">
                        <option selected="" value="img_title">Title</option>
                        <option value="img_type">Type</option>
                        <option value="img_category">Category</option>
                        <option value="img_caption">Description</option>
                    </select>
                    <button class="ui button" name="submit">Search</button>
                </div>
            </form> -->
            <hr>

            <div class="ui divided items" style="min-height: 720px">
                <?php
                if (empty($data['getpost'])) {
                    echo '<div style="width:100%;display:flex;flex-direction:column;align-items:center;"><h2 style="text-align:center">Anda Belum Memosting Apapun</h2><br> ';
                    echo '<button class="account-follow-button"><a href="' . BASEURL . '/upload/" style="color:white">Upload</a></button></div>';
                } else {
                ?>
                    <?php foreach ($data['getpost'] as $row) : ?>
                        <div class="item">
                            <div class="image">
                                <div style="width: 175px!important; height: 145px!important; background-size: cover; background-image: url('<?= BASEURL ?>/assets/upload/<?= $row['img_type'] ?>/small/<?= $row['img_file'] ?>'); background-position:center;"></div>
                            </div>
                            <div class="content semantic-item-content">
                                <a class="header"><?= $row['img_title'] ?></a>
                                <div class="meta mb-2  mt-1">
                                    <span class="cinema"><?= $row['img_category'] ?></span>
                                </div>
                                <div class="description mt-1" style="min-height:55px; max-height: 55px; overflow:hidden">
                                    <p><?= $row['img_caption'] ?></p>
                                </div>
                                <div class="extra">
                                    <div class="ui right floated ">
                                        <button href="" class="ui red button" data-toggle="modal" data-target="#delete" data-id="<?= $row['img_id'] ?>" data-name="<?= $row['img_title'] ?>">Delete</button>
                                        <!-- <i class="right chevron icon"></i> -->
                                    </div>
                                    <div class="ui right floated">
                                        <button href="" class="ui teal button EditPost" data-toggle="modal" data-target="#edit" data-edit="<?= $row['img_id'] ?>">Edit</button>
                                        <!-- <i class="right chevron icon"></i> -->
                                    </div>
                                    <div class="ui label mt-2">
                                        <?php
                                        if ($row['jumlah_like'] == 0 || $row['jumlah_like'] == 1) {
                                            echo $row['jumlah_like'] . " Like";
                                        } else {
                                            echo $row['jumlah_like'] . " Likes";
                                        }

                                        ?></div>
                                    <div class="ui label mt-2"><?= $row['img_type'] ?></div>
                                    <div class="ui label mt-2">
                                        <?php
                                        $fn = 'assets/upload/all/' . $row['img_file'];
                                        $fs = filesize($fn);
                                        $fs = round($fs / 1024 / 1024, 2);
                                        echo $fs . ' Mb';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete">Delete </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a type="button" class="ui teal button" data-dismiss="modal">Cancel</a>
                <a type="button" class="ui red button hapus">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade bd-example-modal-xl" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:2000">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <div style="width: 25%;">
                        <img src="<?= BASEURL ?>/assets/upload/photo/small/5e30ee0725c99-1580264967-girl.jpg" alt="" srcset="" width="100%" id="file">
                    </div>
                    <div style="width: 73%">
                        <form action="<?= BASEURL ?>/member/ubahData" method="POST">
                            <input type="hidden" id="id" name="img_id">
                            <input type="hidden" id="type" name="img_type">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="img_title" pattern="[A-Za-z0-9\s_]{4,255}" title="only allow characters from A-Z, a-z, 0-9, underscore and whitespace" maxlength="255" required>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="img_category" maxlength="15" pattern="[A-Za-z0-9-_]{3,15}" title="only allow characters from A-Z, a-z, 0-9, dash and underscore. cannot be less than 3 characters and more than 15 characters" required>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="img_location" pattern="[A-Za-z0-9\s\.\-_,]+" title="only allow characters from A-Z, a-z, 0-9, dash, whitespace, period, coma, and underscore. " maxlength="120">
                            </div>

                            <div class="form-group">
                                <label for="caption" class="col-form-label">Description</label>
                                <textarea class="form-control" id="caption" name="img_caption" maxlength="255" rows="4"></textarea>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="ui button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="ui teal button" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>