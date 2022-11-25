<?php  

$slidersQuery = $dbConnect->prepare("SELECT * FROM sliders");
$slidersQuery->execute();
$slidersNum = $slidersQuery->rowCount();
$sliders = $slidersQuery->fetchAll(PDO::FETCH_ASSOC);

?>



<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">



			<?php foreach ($sliders as $key => $slider): ?>
				<div class="item-slick1" style="background-image: url(images/sliders/<?= $slider["image"] ?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<?php if (isset($slider["first"])): ?>
								<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
									<span class="ltext-101 cl2 respon2">
										<?= $slider["first"] ?>
									</span>
								</div>
							<?php endif ?>

							<?php if (isset($slider["second"])): ?>
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
									<h2 class="ltext-101 cl2 p-t-17 respon1">
										<?= $slider["second"] ?>
									</h2>
								</div>
							<?php endif ?>

							<?php if (isset($slider["third"])): ?>
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="1100">
									<h2 class="ltext-201 cl2 p-t-17 p-b-23 respon1">
										<?= $slider["third"] ?>
									</h2>
								</div>
							<?php endif ?>

							<?php if (isset($slider["button"])): ?>
								<div class="layer-slick1 animated visible-false" data-appear="fadeInLeft" data-delay="1400">
									<a href="products.php?cat=2&type=new" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										<?= $slider["button"] ?>
									</a>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>		
			<?php endforeach ?>










			<!-- <div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Kadın Koleksiyon
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								YENİ SEZON
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="products.php?cat=1$type=new" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Parçalar
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Erkek Yeni Sezon
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Ceket & Kaban
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="products.php?cat=5&type=new" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Parçalar
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Erkek Koleksiyon
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Yeni Sezon
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							<a href="products.php?cat=2&type=new" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Parçalar
							</a>
						</div>
					</div>
				</div>
			</div> -->


		</div>
	</div>
</section>