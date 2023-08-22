<?php $preview = $data['preview'] ; ?>
<section class="container-self review-page mt-3">
    <div class="review-image-page">
        <div class="image-review">
            <img src="<?=BASEURL;?>/assets/upload/<?=$preview['img_type'];?>/large/<?=$preview['img_file']?>" alt="<?=$preview['img_file']?>">
        </div>
        <div class="image-detail">
            <div class="account-image-owner">
                <div class="account-data-owner">
                    <div class="avatar-owner">
                        <img src="<?=BASEURL;?>/assets/avatar/<?=$preview['user_avatar']?>" alt="" class="">
                    </div>
                    <div class="username_follower_owner">
                        <p><a href="<?=BASEURL;?>/member/user/<?=$preview['id']?>"><?=$preview['username']?></a></p>
                        <!-- <p>100k followers</p> -->
                    </div>
                </div>
                <div class="follow-review-account">
                <?php if (isset($_SESSION['UID'])) {
                    if ($preview['id'] == $_SESSION['UID']) {
                        echo " ";
                    }else {
                        echo ' ';
                    }
                }else{
                    echo ' ';
                }?>
                </div>
            </div>
            <div class="detail-about-image"> 
                <div class="image-head detail">
                    <div class="title-image">
                        <i class="info circle icon"></i>
                        <span><b><?=$preview['img_title'];?></b> </span>
                    </div>
                    <div class="image-taked-location">
                        <i class="map marker alternate icon"></i>
                        <span><?=$preview['img_location'];?></span>
                    </div>
                    <div class="image-taked-location">
                        <i class="object group outline icon"></i>
                        <a href="<?=BASEURL;?>/search/<?=$preview['img_type']."/".$preview['img_category']?>" style="font-size:16px; color:purple"><?=$preview['img_type']." - ".$preview['img_category'];?></a>
                    </div>
                </div>
                <div class="caption-of-image">
                    <p><?=$preview['img_caption'];?></p>
                </div>
                
            </div> 
            <div class="image-feature">
                <div class="download-image">
                    <a href="<?=BASEURL;?>/assets/upload/all/<?=$preview['img_file']?>" download="<?=$preview['img_file']?>"><i class="download icon"></i> Download</a>
                </div>
                <div class="like-copy-link" style="opacity:0;visibility:hidden">
                    <!-- <div class="share-link-image">
                        <i class="copy icon"></i>
                    </div>    
                    <div class="image-love">
                        <svg class="love_button" width="22.53" height="19" viewBox="0 0 20 17"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.48836 2.8634L10 3.69868L10.5116 2.8634C11.3603 1.478 12.8511 0.6 14.5455 0.6C17.1927 0.6 19.4 2.85959 19.4 5.66667C19.4 6.90956 18.8488 8.20497 17.9473 9.48211C17.0497 10.7538 15.8405 11.9564 14.6114 13.0012C13.3851 14.0436 12.1558 14.9145 11.2316 15.5255C10.7701 15.8306 10.386 16.07 10.1183 16.2326C10.0763 16.258 10.0372 16.2816 10.0012 16.3033C9.96489 16.2814 9.92557 16.2575 9.88334 16.2316C9.61552 16.0679 9.23138 15.8268 8.76976 15.5198C7.84538 14.905 6.61586 14.0295 5.38921 12.984C4.15981 11.9361 2.95031 10.7317 2.05241 9.46181C1.15033 8.18599 0.6 6.8968 0.6 5.66667C0.6 2.85959 2.80729 0.6 5.45455 0.6C7.1489 0.6 8.63974 1.478 9.48836 2.8634Z"
                            fill="" stroke="#000000" stroke-width="1.7" />
                    </svg>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>