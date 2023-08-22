<div class="my-grid active" data-tab="photos">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>
    <?php
    /* var_dump($data['getpost']);
                die; */
    ?>
    <?php if (empty($data['getpost'])) {
        echo '<div style="width:100%;"><h2 style="text-align:center">Tidak ada postingan yang di sukai</h2> </div>';
    } else {
    ?>
        <?php foreach ($data['getpost'] as $image) : ?>
            <div class="grid-item">
                <div class="grid-content">
                    <a href="<?= BASEURL; ?>/preview/index/<?= $image['img_id']; ?>" data-id="<?= $image['img_id']; ?>" data-category="<?= $image['img_category']; ?>" data-type="<?= $image['img_type']; ?>" data-toggle="modal" data-target="#home_modal" id="preview_link">
                        <div class="image-content">
                            <?php if ($image['img_type'] == 'vector') {
                                $size = 'medium';
                            } else {
                                $size = 'small';
                            } ?>
                            <img src="<?= BASEURL . '/assets/upload/' . $image['img_type'] . '/' . $size . '/' . $image['img_file']; ?>" alt="test">
                        </div>

                        <div class="image-detail-info">
                            <div class="image-overlay"></div>
                            <div class="top-part">
                                <div class="title">
                                    <a href="<?= BASEURL; ?>/preview/index/<?= $image['img_id']; ?>" data-id="<?= $image['img_id']; ?>" data-toggle="modal" data-target="#home_modal" id="preview_link">
                                        <svg width="20" height="20" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="info_path" fill-rule="evenodd" clip-rule="evenodd" d="M9 7.17938C8.86806 7.04841 8.76443 6.89143 8.6956 6.71828C8.62676 6.54512 8.59422 6.35953 8.6 6.17313C8.6 5.77063 8.72857 5.42563 9 5.16688C9.27143 4.90813 9.6 4.76438 10 4.76438C10.4 4.76438 10.7429 4.89375 11 5.16688C11.2571 5.44 11.4 5.77063 11.4 6.17313C11.4 6.57563 11.2714 6.92063 11 7.17938C10.7362 7.45022 10.3768 7.60523 10 7.61063C9.6 7.61063 9.25714 7.4525 9 7.17938ZM11.4286 10.4856C11.4 10.1263 11.2714 9.79563 10.9857 9.49375C10.7 9.22063 10.3857 9.0625 10 9.04813H8.57143C8.18571 9.07688 7.88571 9.235 7.58571 9.49375C7.3 9.78125 7.15714 10.1263 7.14286 10.4856H8.57143V14.7981C8.6 15.1863 8.72857 15.5169 9.01429 15.79C9.3 16.0775 9.61429 16.2356 10 16.2356H11.4286C11.8143 16.2356 12.1143 16.0775 12.4143 15.79C12.7 15.5169 12.8429 15.1863 12.8571 14.7981H11.4286V10.4713V10.4856ZM10 2.30625C5.51429 2.30625 1.85714 5.9575 1.85714 10.4713C1.85714 14.985 5.51429 18.665 10 18.665C14.4857 18.665 18.1429 14.9994 18.1429 10.4713C18.1429 5.94313 14.4857 2.29188 10 2.29188V2.30625V2.30625ZM10 0.408752C15.5143 0.408752 20 4.9225 20 10.4713C20 16.02 15.5143 20.5338 10 20.5338C4.48571 20.5338 0 16.0488 0 10.4713C0 4.89375 4.48571 0.408752 10 0.408752V0.408752Z" fill="#DEDEDE" />
                                        </svg>
                                        <span class="image_title"><?= $image['img_title']; ?></span>
                                    </a>
                                </div>
                                <div class="download">
                                    <a href="<?= BASEURL . '/assets/upload/all/' . $image['img_file']; ?>" data-toggle="tooltip" data-placement="bottom" title="Download this Picture" download="<?= $image['img_file']; ?>">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 17.8947H18.75C19.0815 17.8947 19.3995 18.0056 19.6339 18.203C19.8683 18.4004 20 18.6682 20 18.9474C20 19.2265 19.8683 19.4943 19.6339 19.6917C19.3995 19.8891 19.0815 20 18.75 20H1.25C0.918479 20 0.600537 19.8891 0.366117 19.6917C0.131696 19.4943 0 19.2265 0 18.9474C0 18.6682 0.131696 18.4004 0.366117 18.203C0.600537 18.0056 0.918479 17.8947 1.25 17.8947ZM11.25 11.7632L15.3038 8.35053L17.0713 9.83895L10 15.7937L2.92875 9.83895L4.69625 8.35053L8.75 11.7632V0H11.25V11.7632Z" fill="#DDD" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="bottom-part">
                                <div class="user_account custom">
                                    <?php
                                    $oriname1 = $image['username'];
                                    $fakename1 = str_replace(' ', '-', $oriname1);
                                    $fakename1 = strtolower($fakename1);
                                    ?>
                                    <a href="<?= BASEURL; ?>/member/user/<?= $image['id']; ?>-<?= $fakename1 ?>" class="acnt">
                                        <span class="user_image">
                                            <?php if ($image['user_avatar'] != "") {
                                                echo '<img src="' . BASEURL . '/assets/avatar/' . $image["user_avatar"] . '" style="border-radius:50%;width:100%;height:100%"alt="">';
                                            } else {
                                                echo '<img src="' . BASEURL . '/assets/avatar/undraw_male_avatar_323b.svg" style="border-radius:50%;width:100%;height:100%"alt="">';
                                            } ?>
                                        </span>
                                        <span class="user_name"><?= $image['username']; ?></span>
                                    </a>
                                </div>
                                <!-- <div id="pop" class="acnt_data ui custom popup top left">
                                <div class="pop_cover">
                                    <div class="account_detail">
                                        <div class="account_avatar">
                                            <a href="<?= BASEURL; ?>/member/user/<?= $image['id']; ?>"><?php if ($image['user_avatar'] != "") {
                                                                                                            echo '<img src="' . BASEURL . '/assets/avatar/' . $image["user_avatar"] . '" style="border-radius:50%"alt="">';
                                                                                                        } else {
                                                                                                            echo '<img src="' . BASEURL . '/assets/avatar/undraw_male_avatar_323b.svg" style="border-radius:50%"alt="">';
                                                                                                        } ?>
                                                    
                                                    </a>
                                        </div>
                                        <div class="account_data_information">
                                            <div class="account_username_popup">
                                                <a href="<?= BASEURL; ?>/member/user/<?= $image['id']; ?>"><?= $image['username']; ?></a>
                                            </div>
                                            <div class="account_description">
                                                <p>8.98K Followers</p>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['UID'])) {
                                            if ($image['id'] != $_SESSION['UID']) {
                                                echo '
                                                <button class="follow not_activated">Follow</button>';
                                            } else {
                                                echo '<p></p>';
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>

                            </div> -->
                                <div class="image_button">
                                    <!-- <span class="report_parent" data-toggle="tooltip" data-placement="top"
                                    title="Report This Picture">
                                    <svg class="report_button" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 0C4.47768 0 0 4.47768 0 10C0 15.5223 4.47768 20 10 20C15.5223 20 20 15.5223 20 10C20 4.47768 15.5223 0 10 0ZM10 18.3036C5.41518 18.3036 1.69643 14.5848 1.69643 10C1.69643 5.41518 5.41518 1.69643 10 1.69643C14.5848 1.69643 18.3036 5.41518 18.3036 10C18.3036 14.5848 14.5848 18.3036 10 18.3036Z"
                                            fill="#DDDDDD" />
                                        <path
                                            d="M11 13.9286C11 14.2127 10.8946 14.4853 10.7071 14.6862C10.5196 14.8871 10.2652 15 10 15C9.73478 15 9.48043 14.8871 9.29289 14.6862C9.10536 14.4853 9 14.2127 9 13.9286C9 13.6444 9.10536 13.3719 9.29289 13.171C9.48043 12.97 9.73478 12.8571 10 12.8571C10.2652 12.8571 10.5196 12.97 10.7071 13.171C10.8946 13.3719 11 13.6444 11 13.9286ZM10.5 11.4286H9.5C9.40833 11.4286 9.33333 11.3482 9.33333 11.25V5.17857C9.33333 5.08036 9.40833 5 9.5 5H10.5C10.5917 5 10.6667 5.08036 10.6667 5.17857V11.25C10.6667 11.3482 10.5917 11.4286 10.5 11.4286Z"
                                            fill="#DDDDDD" />
                                    </svg>
                                </span>
                                <span class="colection_parent" data-toggle="tooltip" data-placement="top"
                                    title="Add to your collection">
                                    <svg class="add_to_collection" width="20" height="20" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.0833 2.08334C14.4933 2.08334 18.0833 5.67334 18.0833 10.0833C18.0833 14.4933 14.4933 18.0833 10.0833 18.0833C5.67333 18.0833 2.08333 14.4933 2.08333 10.0833C2.08333 5.67334 5.67333 2.08334 10.0833 2.08334ZM10.0833 0.0833435C4.56033 0.0833435 0.083334 4.56034 0.083334 10.0833C0.083334 15.6063 4.56033 20.0833 10.0833 20.0833C15.6063 20.0833 20.0833 15.6063 20.0833 10.0833C20.0833 4.56034 15.6063 0.0833435 10.0833 0.0833435ZM15.0833 9.08334H11.0833V5.08334H9.08333V9.08334H5.08333V11.0833H9.08333V15.0833H11.0833V11.0833H15.0833V9.08334Z"
                                            fill="#DDDDDD" />
                                    </svg>
                                </span> -->
                                    <span class="share_parent" data-toggle="tooltip" data-placement="top" title=" Share this picture to your friends" style="opacity:0;visibility:hidden">
                                        <svg class="share_button" width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.3061 13.8776C14.5791 13.8776 13.9082 14.1327 13.3827 14.5587L8.09694 10.7348C8.18545 10.249 8.18545 9.75117 8.09694 9.26537L13.3827 5.44139C13.9082 5.86741 14.5791 6.12251 15.3061 6.12251C16.9949 6.12251 18.3673 4.75006 18.3673 3.06129C18.3673 1.37251 16.9949 6.10352e-05 15.3061 6.10352e-05C13.6173 6.10352e-05 12.2449 1.37251 12.2449 3.06129C12.2449 3.3572 12.2857 3.64037 12.3648 3.91078L7.34439 7.54598C6.59949 6.55873 5.41582 5.91843 4.08163 5.91843C1.82653 5.91843 0 7.74496 0 10.0001C0 12.2552 1.82653 14.0817 4.08163 14.0817C5.41582 14.0817 6.59949 13.4414 7.34439 12.4541L12.3648 16.0893C12.2857 16.3598 12.2449 16.6455 12.2449 16.9388C12.2449 18.6276 13.6173 20.0001 15.3061 20.0001C16.9949 20.0001 18.3673 18.6276 18.3673 16.9388C18.3673 15.2501 16.9949 13.8776 15.3061 13.8776ZM15.3061 1.73475C16.0383 1.73475 16.6327 2.32914 16.6327 3.06129C16.6327 3.79343 16.0383 4.38782 15.3061 4.38782C14.574 4.38782 13.9796 3.79343 13.9796 3.06129C13.9796 2.32914 14.574 1.73475 15.3061 1.73475ZM4.08163 12.245C2.84439 12.245 1.83673 11.2373 1.83673 10.0001C1.83673 8.76282 2.84439 7.75516 4.08163 7.75516C5.31888 7.75516 6.32653 8.76282 6.32653 10.0001C6.32653 11.2373 5.31888 12.245 4.08163 12.245ZM15.3061 18.2654C14.574 18.2654 13.9796 17.671 13.9796 16.9388C13.9796 16.2067 14.574 15.6123 15.3061 15.6123C16.0383 15.6123 16.6327 16.2067 16.6327 16.9388C16.6327 17.671 16.0383 18.2654 15.3061 18.2654Z" fill="#DDDDDD" />
                                        </svg>
                                    </span>
                                    <?php
                                    if (isset($_SESSION['login'])) {
                                        if (!empty($data['like']) && in_array($image['img_id'], $data['like'])) {
                                            echo '
                                        <span class="love_parent like_prs" data-toggle="tooltip" data-placement="top"
                                            title="Like This Picture" >
                                                <svg class="love_button liking" data-id="' . $image["img_id"] . '"  width="22.53" height="19" viewBox="0 0 20 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.48836 2.8634L10 3.69868L10.5116 2.8634C11.3603 1.478 12.8511 0.6 14.5455 0.6C17.1927 0.6 19.4 2.85959 19.4 5.66667C19.4 6.90956 18.8488 8.20497 17.9473 9.48211C17.0497 10.7538 15.8405 11.9564 14.6114 13.0012C13.3851 14.0436 12.1558 14.9145 11.2316 15.5255C10.7701 15.8306 10.386 16.07 10.1183 16.2326C10.0763 16.258 10.0372 16.2816 10.0012 16.3033C9.96489 16.2814 9.92557 16.2575 9.88334 16.2316C9.61552 16.0679 9.23138 15.8268 8.76976 15.5198C7.84538 14.905 6.61586 14.0295 5.38921 12.984C4.15981 11.9361 2.95031 10.7317 2.05241 9.46181C1.15033 8.18599 0.6 6.8968 0.6 5.66667C0.6 2.85959 2.80729 0.6 5.45455 0.6C7.1489 0.6 8.63974 1.478 9.48836 2.8634Z"
                                                        fill="#CE1111" stroke="#CE1111" stroke-width="1.7" />
                                                </svg>
                                        </span>';
                                        } else {
                                            echo '
                                    <span class="love_parent like_prs" data-toggle="tooltip" data-placement="top"
                                        title="Like this picture" >
                                            <svg class="love_button" data-id="' . $image["img_id"] . '"  width="22.53" height="19" viewBox="0 0 20 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.48836 2.8634L10 3.69868L10.5116 2.8634C11.3603 1.478 12.8511 0.6 14.5455 0.6C17.1927 0.6 19.4 2.85959 19.4 5.66667C19.4 6.90956 18.8488 8.20497 17.9473 9.48211C17.0497 10.7538 15.8405 11.9564 14.6114 13.0012C13.3851 14.0436 12.1558 14.9145 11.2316 15.5255C10.7701 15.8306 10.386 16.07 10.1183 16.2326C10.0763 16.258 10.0372 16.2816 10.0012 16.3033C9.96489 16.2814 9.92557 16.2575 9.88334 16.2316C9.61552 16.0679 9.23138 15.8268 8.76976 15.5198C7.84538 14.905 6.61586 14.0295 5.38921 12.984C4.15981 11.9361 2.95031 10.7317 2.05241 9.46181C1.15033 8.18599 0.6 6.8968 0.6 5.66667C0.6 2.85959 2.80729 0.6 5.45455 0.6C7.1489 0.6 8.63974 1.478 9.48836 2.8634Z"
                                                    fill="" stroke="#DDDDDD" stroke-width="1.7" />
                                            </svg>
                                    </span>';
                                        }
                                    } else {
                                        echo '
                                    <span class="love_parent like_prs" data-toggle="tooltip" data-placement="top"
                                        title="Like this picture" >
                                            <svg class="love_button" data-toggle="modal" data-target="#instruksi" width="22.53" height="19" viewBox="0 0 20 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.48836 2.8634L10 3.69868L10.5116 2.8634C11.3603 1.478 12.8511 0.6 14.5455 0.6C17.1927 0.6 19.4 2.85959 19.4 5.66667C19.4 6.90956 18.8488 8.20497 17.9473 9.48211C17.0497 10.7538 15.8405 11.9564 14.6114 13.0012C13.3851 14.0436 12.1558 14.9145 11.2316 15.5255C10.7701 15.8306 10.386 16.07 10.1183 16.2326C10.0763 16.258 10.0372 16.2816 10.0012 16.3033C9.96489 16.2814 9.92557 16.2575 9.88334 16.2316C9.61552 16.0679 9.23138 15.8268 8.76976 15.5198C7.84538 14.905 6.61586 14.0295 5.38921 12.984C4.15981 11.9361 2.95031 10.7317 2.05241 9.46181C1.15033 8.18599 0.6 6.8968 0.6 5.66667C0.6 2.85959 2.80729 0.6 5.45455 0.6C7.1489 0.6 8.63974 1.478 9.48836 2.8634Z"
                                                    fill="" stroke="#DDDDDD" stroke-width="1.7" />
                                            </svg>
                                    </span>';
                                    }


                                    ?>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        </section>

        <div class="modal fade " id="instruksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda hanya memiliki akses sebagai guest. Login untuk dapat memberi like kepada postingan yang lain</p>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="ui purple button" href="<?= BASEURL ?>/join">Register</a>
                        <a type="button" class="ui teal button" href="<?= BASEURL ?>/login">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-xl" id="home_modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="container-self review-page" style="top:0;">
                            <div class="review-image-page resp">
                                <div class="image-review resp">
                                    <img src="" id="modal_image" alt="">
                                </div>
                                <div class="image-detail resp">
                                    <div class="account-image-owner">
                                        <div class="account-data-owner">
                                            <div class="avatar-owner">
                                                <img src="<?= BASEURL; ?>/assets/image/icon/hell.png" alt="" id="avatar" class="">
                                            </div>
                                            <div class="username_follower_owner">
                                                <p><a href="" id="username">Lorem Ipsum dolor sit amet</a></p>
                                                <!-- <p>100k followers</p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-about-image">
                                        <div class="image-head detail">
                                            <div class="title-image">
                                                <i class="info circle icon"></i>
                                                <span id="modal_title"><b>Lorem ipsum dolor sit amet</b> </span>
                                            </div>
                                            <div class="image-taked-location">
                                                <i class="map marker alternate icon"></i>
                                                <span id="modal_location"></span>
                                            </div>
                                            <div class="image-taked-location">
                                                <i class="object group outline icon"></i>
                                                <a href="" style="font-size:16px; color:purple" id="modal_link">Photos - jpg</a>
                                            </div>
                                        </div>
                                        <div class="caption-of-image resp">
                                            <p id="modal_caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet nisi, nobis sint quo accusantium vel distinctio iure molestias maxime in eum totam architecto. A, corrupti laboriosam recusandae dolorem omnis eaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi distinctio delectus impedit quam recusandae nulla ipsa, eius, consequuntur ad in dolor vel tempore modi ex corporis laborum accusamus iure culpa? lor</p>
                                        </div>

                                    </div>
                                    <div class="image-feature">
                                        <div class="download-image">
                                            <a href="" id="modal_download" download=""><i class="download icon"></i> Download</a>
                                        </div>
                                        <div class="like-copy-link">
                                            <!-- <div class="share-link-image">
                                                <i class="copy icon"></i>
                                            </div>
                                            <div class="image-love">
                                                <svg class="love_button" width="22.53" height="19" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.48836 2.8634L10 3.69868L10.5116 2.8634C11.3603 1.478 12.8511 0.6 14.5455 0.6C17.1927 0.6 19.4 2.85959 19.4 5.66667C19.4 6.90956 18.8488 8.20497 17.9473 9.48211C17.0497 10.7538 15.8405 11.9564 14.6114 13.0012C13.3851 14.0436 12.1558 14.9145 11.2316 15.5255C10.7701 15.8306 10.386 16.07 10.1183 16.2326C10.0763 16.258 10.0372 16.2816 10.0012 16.3033C9.96489 16.2814 9.92557 16.2575 9.88334 16.2316C9.61552 16.0679 9.23138 15.8268 8.76976 15.5198C7.84538 14.905 6.61586 14.0295 5.38921 12.984C4.15981 11.9361 2.95031 10.7317 2.05241 9.46181C1.15033 8.18599 0.6 6.8968 0.6 5.66667C0.6 2.85959 2.80729 0.6 5.45455 0.6C7.1489 0.6 8.63974 1.478 9.48836 2.8634Z" fill="" stroke="#000000" stroke-width="1.7" />
                                                </svg>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color:black;">
                            <div id="recommend" style="width:100%; margin:0; padding:0; height:100%;">

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <?php } ?>