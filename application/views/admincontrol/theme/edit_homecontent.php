<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-header">
				<h4 class="card-title pull-left"><?= __('admin.update_home_content') ?></h4>
				<div class="pull-right">
					<a class="btn btn-primary" href="<?= base_url('themes/multiple_theme/')  ?>"><?= __('admin.cancel') ?></a>
				</div>
			</div>
			<div class="card-body">
				<form id="admin-form">
					<input type="hidden" name="homecontent_id" value="<?= $homecontent->homecontent_id ?>">
					<input type="hidden" name="hidden_image" id="hidden_image" value="<?= $homecontent->image ?>">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label"><?= __('admin.title') ?></label>
								<input placeholder="<?= __('admin.title') ?>" name="title" value="<?php echo $homecontent->title; ?>" class="form-control" type="text">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label"><?= __('admin.description') ?></label>
							<textarea id="summernote" class="form-control" placeholder="<?= __('admin.description') ?>" name="description"> <?php echo $homecontent->description; ?></textarea>
							</div>
						</div>
						<div>
							<div class="form-group">
								<label class="control-label"><?= __('admin.status') ?></label>
								<div>
									<input type="radio" <?php echo ($homecontent->status == 1) ? "checked" : "" ?>  name="status" value="1"><?= __('admin.active') ?>
									<input type="radio" <?php echo ($homecontent->status == 0) ? "checked" : "" ?>  name="status" value="0"><?= __('admin.inactive') ?>
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label class="control-label"><?= __('admin.home_content_image') ?></label>
						<div>
							<div class="fileUpload btn btn-sm btn-primary">
								<span><?= __('admin.choose_file') ?></span>
								<input id="uploadBtn" name="avatar" class="upload" type="file" onchange="loadFile(event)">
							</div>
							<?php
							
							
							if($homecontent->image !=''){
									$avatar= '/assets/images/theme_images/'.$homecontent->image;
							}else{
									$avatar= 'assets/images/no-image-available.gif';
							}
							?>
							<img id="output"  src="<?php echo base_url().$avatar;?>" class="thumbnail" border="0" width="220px" />
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-submit"> <?= __('admin.update') ?> </button>
						<span class="loading-submit"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
$('#summernote').summernote({
    minHeight: 300,
    toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});
});
</script>

<script type="text/javascript">
	var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

$(".btn-submit").on('click',function(evt){
$("#linkError").empty();
$this = $("#admin-form");
$(".btn-submit").btn("loading");
$('.loading-submit').show();
evt.preventDefault();
var formData = new FormData($("#admin-form")[0]);
formData = formDataFilter(formData);
$.ajax({
url:'<?= base_url('themes/update_homecontent') ?>',
type:'POST',
dataType:'json',
cache:false,
contentType: false,
processData: false,
data:formData,
xhr: function (){
var jqXHR = null;
if ( window.ActiveXObject ){
jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );
}else {
jqXHR = new window.XMLHttpRequest();
}
jqXHR.upload.addEventListener( "progress", function ( evt ){
if ( evt.lengthComputable ){
var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
$('.loading-submit').text(percentComplete + "% "+'<?= __('admin.loading') ?>');
}
}, false );
jqXHR.addEventListener( "progress", function ( evt ){
if ( evt.lengthComputable ){
var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
$('.loading-submit').text('<?= __('admin.save') ?>');
}
}, false );
return jqXHR;
},
complete:function(result){
$(".btn-submit").btn("reset");
},
success:function(result){
$('.loading-submit').hide();
$this.find(".has-error").removeClass("has-error");
$this.find("span.text-danger").remove();
if(result['location']){
window.location = result['location'];
}
console.log(result['errors']);
if(result['errors']){
$.each(result['errors'], function(i,j){
	$ele = $this.find('[name="'+ i +'"]');
	$ele.parents(".form-group").addClass("has-error");
	if(i == 'avatar')
		$ele.parent().parent().append("<span class='text-danger'>"+ j +"</span>");
	else
		$ele.after("<span class='text-danger'>"+ j +"</span>");
});
}
},
})
return false;
});
</script>