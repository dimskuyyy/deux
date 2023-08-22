<?php foreach ($data['member'] as $user) : ?>
    <?php
    $oriname = $user['username'];
    $fakename = str_replace(' ', '-', $oriname);
    $fakename = strtolower($fakename);
    ?>
    <div class="account-content-wrapper">
        <header class="account-head row justify-content-center">
            <div class="account-data-views col-12 col-lg-8 col-md-9 col-sm-11">
                <div class="account-data-avatar">
                    <?php if ($user['user_avatar'] != "") {
                        echo '<img src="' . BASEURL . '/assets/avatar/' . $user["user_avatar"] . '" style="border-radius:50%"alt="">';
                    } else {
                        echo '<img src="' . BASEURL . '/assets/avatar/undraw_male_avatar_323b.svg" style="border-radius:50%"alt="">';
                    } ?>
                </div>
                <div class="account-data-detail">
                    <div class="account-data-head">
                        <h1><?= $user['username'] ?></h1>
                        <!-- <p>100k followers</p> -->
                    </div>
                    <div class="account-data-short-bio">
                        <?php if (empty($user['user_description'])) {
                            echo "<p></p>";
                        } else {
                            echo "<p>" . $user['user_description'] . "</p>";
                        }

                        ?>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, magni.</p> -->
                    </div>
                    <div class="account-data-link">
                        <?php if (empty($user['user_address'])) {
                            echo '<div>
                                </div>';
                        } else {
                            echo '<div>
                                <i class="map marker alternate icon"></i>' . $user['user_address'] . '
                            </div>';
                        } ?>
                        <?php if (empty($user['user_instagram'])) {
                            echo '<div>
                                </div>';
                        } else {
                            echo '<div>
                                    <a href="https://www.instagram.com/' . $user['user_instagram'] . '/" target="_blank">
                                <i class="instagram icon"></i>' . $user['user_instagram'] . '</a>
                            </div>';
                        } ?>
                        <?php if (empty($user['user_websiteName']) && empty($user['user_websiteLink'])) {
                            echo '<div>
                                </div>';
                        } else if (empty($user['user_websiteName']) && is_string($user['user_websiteLink'])) {
                            echo '<div>
                                    <a href="' . $user['user_websiteLink'] . '" target="_blank">
                                <i class="linkify icon"></i>My Website</a>
                            </div>';
                        } else if (empty($user['user_websiteLink']) && is_string($user['user_websiteName'])) {
                            echo '<div>
                                <i class="linkify icon"></i>No Website Link
                            </div>';
                        } else {
                            echo '<div>
                                    <a href="' . $user['user_websiteLink'] . '" target="_blank">
                                <i class="linkify icon"></i>' . $user['user_websiteName'] . '</a>
                            </div>';
                        } ?>
                    </div>
                    <div class="account-data-follow">

                        <?php
                        if (isset($_SESSION['UID'])) {
                            if ($data['check'] == 'profil') {
                                echo '<button class="account-follow-button">
                                <a href="' . BASEURL . '/edit_profile/index/' . $user["id"] . '-' . $fakename . '" class="" style="color:white">
                                    Profile Settings
                                </a>
                            </button>';
                                echo '<button class="account-follow-button ml-3">
                                <a href="' . BASEURL . '/member/user/' . $user["id"] . '-' . $fakename . '/post_settings" class="" style="color:white">
                                    Posting Settings
                                </a>
                            </button>';
                            } else if ($data['check'] == 'follow') {
                                echo '  ';
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </header>
        <section class="container-self account">
            <div class="account-tab-menu">
                <a href="<?= BASEURL ?>/member/user/<?= $user['id'] ?>-<?= $fakename ?>" <?php if ($data['likedstat'] == 'off') {
                                                                                                echo 'class="active-link"';
                                                                                            } else {
                                                                                                echo 'class=""';
                                                                                            } ?>>Post</a>
                <a href="<?= BASEURL ?>/member/user/<?= $user['id'] ?>-<?= $fakename ?>/liked" <?php if ($data['likedstat'] == 'on') {
                                                                                                    echo 'class="active-link ml-2"';
                                                                                                } else {
                                                                                                    echo 'class="ml-2"';
                                                                                                } ?>>Liked</a>
                <!-- <a href="" class="">Followers</a>
                <a href="">Following</a> -->
            <?php endforeach; ?>
            </div>