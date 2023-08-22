<header class="explore-tab-link">
	<div class="tab-link">
		<a href="<?= BASEURL; ?>/explore/index" class="">Photos</a>
		<a href="<?= BASEURL; ?>/explore/vector" class="active-link">Vectors</a>
	</div>
</header>
<hr class="horizontal-line-1">
<section class="explore-section-part row justify-content-center">
	<div class="col-11 col-lg-10 col-md-11 col-sm-11">
		<header class="explore-section-header">
			<div class="head-name">
				<p>Vectors Categories</p>
				<p>Find all photos just by category </p>
			</div>
		</header>
		<article>
			<ul class="category-list row p-0 m-0">
				<?php foreach ($data['list'] as $category) : ?>
					<?php if (!is_null($category)) : ?>
						<li class="col-12 col-lg-4 col-md-4 col-sm-6 ">
							<div class="category-outer-wrapper">
								<div class="category-inner-wrapper">
									<div class="category-preview-holder">
										<div class="category-preview-wrapper">
											<!-- <?php foreach ($category as $img) : ?> -->
											<?php for ($i = 0; $i < 4; $i++) : ?>
												<?php $img = $category[$i] ?>
												<?php if ($i === 0) : ?>
													<div class="category-preview-image" style="background-image: url('<?= BASEURL; ?>/assets/upload/vector/small/<?= $img['img_file']; ?>');"></div>
													<div class="category-preview-image-2">
													<?php else : ?>
														<div class="sec-category-preview-image" style="background-image: url('<?= BASEURL; ?>/assets/upload/vector/small/<?= $img['img_file']; ?>');"></div>
													<?php endif; ?>



													<!-- <div class="sec-category-preview-image"
													style="background-image: url(<?= BASEURL; ?>/assets/upload/photo/small/<?= $img['img_file']; ?>);"></div>
												<div class="sec-category-preview-image"
													style="background-image: url(<?= BASEURL; ?>/assets/upload/photo/small/<?= $img['img_file']; ?>);"></div> -->
												<?php endfor; ?>
													</div>
													<!-- <?php endforeach; ?> -->
										</div>
									</div>
									<div class="category-caption">
										<h3><?= $category[0]['img_category']; ?></h3>
										<p><?= count($category); ?> Photos</p>
									</div>
									<a href="<?= BASEURL; ?>/search/vector/<?= $category[0]['img_category']; ?>" class="link-wrapper"></a>
								</div>
							</div>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>

			</ul>
		</article>
	</div>
</section>