<section class="container-self account">
<h3 class="mt-3 mb-1">View from Photos</h3>
        <h4 class="mt-0">Result from search category</h4>
        <div class="w-100 d-flex align-items-center align-content-center " >
            <p class="mt-2 d-inline-block p-0 m-0"style="margin-top:0px!important;">More category from this type : </p>
            <div class="overflow-auto d-inline-block ml-3" >
                <?php foreach($data['more'] as $more) :?>
                    <a href="<?=BASEURL;?>/search/photo/<?=$more['img_category']?>" class="badge badge-secondary ml-2 p-2 pr-3 pl-3" style="font-size:12.5px"><?=$more['img_category']?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <ul class="account-icon-list">
        <?php if(!empty($data['list'])) : ?>
            <?php foreach($data['list'] as $category) :?>
                <li class="account list-icon">
                    <div class="position-relative">
                        <div class="icon-list-content">
                            <div class="list-icon-image-content">
                                <img src="<?=BASEURL;?>/assets/upload/icon/large/<?=$category['img_file']?>" alt="">
                            </div>
                            <p class="icon-content-caption"><?=$category['img_title']?></p>
                            <a href="<?=BASEURL;?>/preview/index/<?=$category['img_id'];?>" data-id="<?=$category['img_id']; ?>"data-category="<?=$category['img_category'];?>" data-type="<?=$category['img_type'];?>" class="icon-link"></a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</section>