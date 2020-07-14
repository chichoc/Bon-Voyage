<style>
	.slick-arrow{
		display: none !important;
	}
</style>
<script>
	$('.navbar-nav > li').hover(function(){
		console.log('1');
		var path = 'http://kookminweb.mireene.com/web0106/etc/image/';
		var file = $(this).find('a').data('type');
		$(this).find('img').attr('src' , path+file+'_hover.jpg');
	},function(){
		console.log('2');
		var path = 'http://kookminweb.mireene.com/web0106/etc/image/';
		var file = $(this).find('a').data('type');
		$(this).find('img').attr('src' , path+file+'.jpg');
	})
</script><section id="portfolio-work">
	<div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="block">
			  <div class="portfolio-contant">
				<div class="inner-box" style="padding-bottom:11px;width: 800px;margin: 0 auto;">
					<form method="post" class="form-horizontal" action="" name="add_question" id="add_question" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-3 control-label">카테고리</label>

							<div class="col-sm-9">
								<select class="form-control" name="checkbox">
										<option value="1">후기</option>
										<option value="2">숙소</option>
                                                                                <option value="3">꿀팁</option>
																	</select>
								<span class="error" id="qa_title_error"></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">제목</label>
							<div class="col-sm-9">
								<input type="text" value="" name="title" id="title" class="form-control">
								<span class="error" id="qa_title_error"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">내용</label>
							<div class="col-sm-9">
								<textarea name="content" class="wrtie_textarea" placeholder="내용" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">평점</label>
							<input id="input-1-ltr-star-xs" name="hit" class="kv-ltr-theme-svg-star rating-loading" value="" dir="ltr" data-size="xs">
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">타이틀 이미지</label>
							<input type="file" name="title_image">
						</div>
						<div class="form-group">
							<div class="col-sm-12 text-right">
								<button class="btn btn-default" type="submit" name="lodging_write" value="lodging_write" style="float: right; background: #e4192c; color: #fff; width: 150px; height: 50px; line-height: 37px;">작성</button>
							</div>
						</div>
						<input type="hidden" name="edit_idx"  value="">
					</form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</section>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://kookminweb.mireene.com/web0106/etc/api/rating/css/star-rating.min.css">
<script src="http://kookminweb.mireene.com/web0106/etc/api/rating/js/star-rating.min.js" type="text/javascript"></script>
<script>
$(document).on('ready', function(){
    $('.kv-ltr-theme-svg-star').rating({
        hoverOnClear: false,
        theme: 'krajee-svg'
    });
});
</script>
