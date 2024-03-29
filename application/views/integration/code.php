<?php
	function addParams($url, $key, $value) {
		$url = preg_replace('/(.*)(?|&)'. $key .'=[^&]+?(&)(.*)/i', '$1$2$4', $url .'&');
		$url = substr($url, 0, -1);
		
		if (strpos($url, '?') === false) {
			return ($url .'?'. $key .'='. $value);
		} else {
			return ($url .'&'. $key .'='. $value);
		}
	}

	if($tool['slug'])
		$a_link = base_url($tool['slug']);
	else 
		$a_link = $tool['redirectLocation'][0];
?>

<div class="modal-header">
	<h4 class="modal-title"><?= $tool['name'] ?></h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body"  style="max-height:75vh; overflow-y:scroll;">

	<ul class="nav nav-pills">
	  <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#code-code">HTML Code</a></li>
	  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#code-link">Share Link</a></li>
	</ul>
	<div class="tab-content">
	  <div class="tab-pane container active" id="code-code">
		<?php if($tool['type'] == 'banner'){ ?>
			<?php foreach ($tool['ads'] as $key => $value){ 
					$code = htmlspecialchars('<a href="'.$tool['redirectLocation'][0].'"><img src="'. $value['value'] .'" ></a>'); ?>
				<div class="table-code table-responsive">
					<table class="table">
						<tr>
							<th>Target URL :</th>
							<td><?= $tool['target_link'] ?></td>
						</tr>
						<tr>
							<th>Code:</th>
							<td><textarea type="text" onclick="this.focus();this.select()" class="code-input form-control" readonly ><?= $code ?></textarea></td>
						</tr>
						<tr>
							<th>Size:</th>
							<td><?= $value['size'] ?></td>
						</tr>
						<tr>
							<th>Preview:</th>
							<td><img src="<?= $value['value'] ?>" style="width: 200px;" ></td>
						</tr>
					</table>
				</div>
			<?php } ?>
		<?php } else if($tool['type'] == 'text_ads'){
				$value = $tool['ads'][0];
				 
				if($value){
					$style = array(
						'padding : 5px',
						'white-space : pre-line',
						'border : solid '. $value['text_border_color'] .' 1px',
						'display : inline-block',
						'line-height : 1',
						'color : '. $value['text_color'],
						'background-color :'. $value['text_bg_color'],
						'font-size :'. $value['text_size']."px",
					);
					
					$code = '<span style="'. implode(";", $style) .'"><a style="display: block;color: inherit;font-size: inherit;" href="'.$tool['redirectLocation'][0].'">'. $value['value'] .'</a></span>'; ?>
					<div class="table-code table-responsive">
						<table class="table">
							<tr>
								<th>Target URL :</th>
								<td><?= $tool['target_link'] ?></td>
							</tr>
							<tr>
								<th>Code:</th>
								<td><textarea type="text" onclick="this.focus();this.select()" class="code-input form-control" readonly ><?= htmlspecialchars($code) ?></textarea></td>
							</tr>
							<tr>
								<th>Preview:</th>
								<td class="preview-code"><?= $code ?></td>
							</tr>
						</table>
					</div>

		<?php  }
			} else if($tool['type'] == 'link_ads'){
				$value = $tool['ads'][0];
				if($value){
					$code = '<a style="display: block;font-size: 12px;" href="'.$tool['redirectLocation'][0].'">'. $value['value'] .'</a>';
			?>

			<div class="table-code table-responsive">
				<table class="table">
					<tr>
						<th>Target URL :</th>
						<td><?= $tool['target_link'] ?></td>
					</tr>
					<tr>
						<th>Code:</th>
						<td><textarea type="text" onclick="this.focus();this.select()" class="code-input form-control" readonly ><?= htmlspecialchars($code) ?></textarea></td>
					</tr>
					<tr>
						<th>Preview:</th>
						<td class="preview-code"><?= $code ?></td>
					</tr>
				</table>
			</div>

			<?php } 

		} else if($tool['type'] == 'video_ads'){
				$value = $tool['ads'][0];
				if($value){
					$code = isset($value['iframe']) ? $value['iframe'] : '';
					$code .= '<div style="display:table;clear:both;"></div><br><a style="-moz-box-shadow:inset 0 1px 0 0 #fff;-webkit-box-shadow:inset 0 1px 0 0 #fff;box-shadow:inset 0 1px 0 0 #fff;background:-webkit-gradient(linear,left top,left bottom,color-stop(.05,#f9f9f9),color-stop(1,#e9e9e9));background:-moz-linear-gradient(top,#f9f9f9 5%,#e9e9e9 100%);background:-webkit-linear-gradient(top,#f9f9f9 5%,#e9e9e9 100%);background:-o-linear-gradient(top,#f9f9f9 5%,#e9e9e9 100%);background:-ms-linear-gradient(top,#f9f9f9 5%,#e9e9e9 100%);background:linear-gradient(to bottom,#f9f9f9 5%,#e9e9e9 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#f9f9f9\', endColorstr=\'#e9e9e9\', GradientType=0);background-color:#f9f9f9;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;border:1px solid #dcdcdc;display:inline-block;cursor:pointer;color:#666;font-family:Arial;font-size:15px;font-weight:700;padding:6px 24px;text-decoration:none;text-shadow:0 1px 0 #fff" href="'.$tool['redirectLocation'][0].'">'. $value['size'] .'</a>';
			?>

			<div class="table-code table-responsive">
				<table class="table">
					<tr>
						<th>Target URL :</th>
						<td><?= $tool['target_link'] ?></td>
					</tr>
					<tr>
						<th>Code:</th>
						<td><textarea type="text" onclick="this.focus();this.select()" class="code-input form-control" readonly ><?= htmlspecialchars($code) ?></textarea></td>
					</tr>
					<tr>
						<th>Preview:</th>
						<td class="preview-code"><?= $code ?></td>
					</tr>
				</table>
			</div>

			<?php } 
		} ?>
	  </div>
	  <div class="tab-pane container fade" id="code-link">
		<div class="row py-3">
			<div class="col-11 p-0 pr-1">
				<input type="text" readonly="" value="<?= $a_link ?>" class="form-control copy-code" onclick="this.focus();this.select()">
			</div>
			<div class="col-1 p-0">
				<span class="btn btn-md btn-primary" data-social-share data-share-url="<?= $a_link ?>" data-share-title="" data-share-desc=""><i class="fa fa-share-alt" aria-hidden="true"></i></span>
			</div>
		</div>
	  </div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<script type="text/javascript">
	$(".preview-code *").on('click',function(event){
		event.preventDefault();
		event.stopPropagation();

		return false;
	})
</script>
