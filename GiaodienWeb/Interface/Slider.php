<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
                <?php 
                $sql_query =mysqli_query($con, "SELECT * FROM tbl_slider");
                ?>
				<ul class="" id="bxslider-home4">
                    <?php
                    while($row_result = mysqli_fetch_assoc($sql_query)){ 
                    ?>
					<li>
						<img src="../GiaodienAdmin/doc/<?php echo $row_result["img"] ?>" alt="Slider">
						<div class="caption-group">
							<h2 class="caption title">
								<?php echo $row_result["caption_title"] ?> <span class="primary">1<strong></strong></span>
							</h2>
							<h4 class="caption subtitle"><?php echo $row_result["caption_subtitle"] ?> </h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
                    <?php
                    }
                    ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->