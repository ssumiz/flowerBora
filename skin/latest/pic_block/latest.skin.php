<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- <div class="pic_lt"> -->
    

    
<div class="swiper <?php echo $bo_table; ?>">
 
  <div class="swiper-wrapper ">

    <!-- Slides -->
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }

    $img_content = '<img src="'.$img.'" class = "img-fluid"   alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
    <div class="swiper-slide">
        <a href="<?php echo $wr_href; ?>" class="lt_img">
        <?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
        </a>
    </div>
   
    <?php } ?>
  </div>

  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <!-- <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div> -->

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>
<script>
    const swiper = new Swiper('.swiper.<?php echo $bo_table;?>', {
  // Optional parameters
  effect: "fade",
  loop: true,

  autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },

  // If we need pagination
  // pagination: {
  //   el: '.swiper.<?php echo $bo_table;?> .swiper-pagination',
  // },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper.<?php echo $bo_table;?> .swiper-button-next',
    prevEl: '.swiper.<?php echo $bo_table;?> .swiper-button-prev',
  }

});
</script>
  

