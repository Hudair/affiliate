</style>
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-header">
				<div class="pull-right">
					<a href="<?= base_url('admincontrol/group_form/')  ?>" class="btn btn-primary add-new" id="<?= $lang['id'] ?>"><?= __("admin.add_new") ?></a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php if($this->session->flashdata('success')){?>								
						<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $this->session->flashdata('success'); ?> </div>
						<?php } ?>	
						<?php if($this->session->flashdata('error')){?>								
						<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $this->session->flashdata('error'); ?></div>
						<?php } ?>
						<table class="table">
							<thead>
								<tr>
									<th><?= __("admin.sn") ?></th>
									<th><?= __("admin.image") ?></th>
									<th><?= __("admin.group_name") ?></th>
									<th><?= __("admin.group_users_count") ?></th>
									<th><?= __("admin.group_ads_count") ?></th>
									<th><?= __("admin.description") ?></th>
									<th width="180px"><?= __("admin.is_default") ?></th>
									<th width="180px"><?= __("admin.action") ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($groups as $key=> $group){ ?>
									<tr>
										<td><?= (++$key) ?></td>
										<td>
											<?php $avatar = $group->avatar != '' ? 'site/'.$group->avatar : 'no_image_available.png' ; ?>
											<img src="<?php echo base_url();?>assets/images/<?php echo $avatar; ?>" id="blah" class="thumbnail" border="0" width="50px">
										</td>
										<td><?= $group->group_name ?></td>
										<td><?= $group->users_count ?></td>										
										<td><?= $group->tools_count ?></td>										
										<td><?=  wordwrap(substr($group->group_description, 0, 100),80,"<br>\n") ?><?= strlen($group->group_description) > 100 ? '....' : ''; ?></td>
										<td>
											
											<i class="btn_default_lang btn_lang_toggle <?= ($group->is_default == 1) ? "fa fa-toggle-on" : "fa fa-toggle-off"?>" style="<?= ($group->is_default== 1) ? "color: green;" : "color: red;"?>cursor: pointer;font-size: 35px;width:50px" data-lang_id="<?= $group->id ?>" data-column="is_default"></i>
										</td>
										<td>
										<a href="<?= base_url('admincontrol/group_form/'.$group->id)  ?>" class="btn btn-warning bg-warning text-dark" data-toggle="tooltip" data-original-title="<?= __('admin.update') ?>"><?= __('admin.update') ?></a>
										<button data-toggle="tooltip" data-original-title="<?= __("admin.delete") ?>" class="btn btn-danger detele-button" data-id="<?=$group->id?>"><?= __("admin.delete") ?></button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>

<script type="text/javascript">

	$(document).on('click', ".btn_lang_toggle", function(){
		let skip_change = false;
		let id = $(this).data('lang_id');
		let column = $(this).data('column');
		let status = $(this).hasClass('fa-toggle-off') ? 1 : 0;

		$('.btn_lang_toggle').addClass('fa-toggle-off').removeClass('fa-toggle-on');
		$('.btn_lang_toggle').css("color", "red");


		if(status) {
			$(this).addClass('fa-toggle-on').removeClass('fa-toggle-off');
			$(this).css("color", "green");
			if (column == 'is_default') { 
				
			}
		}

		$.ajax({
			url: "<?= base_url('admincontrol/group_status_toggle')?>",
			type: "POST",
			dataType: "json",
			data: {
				id:id,
				status:status,
				column:column
			},
			success: function (response) {	
			}
		});
	});	

	$(".detele-button").on('click',function(){
		$('.tooltip').remove();
		$this = $(this);


		if(!confirm('<?= __('admin.are_you_sure') ?>')) {
			return false
		}
		
		
		$.ajax({
			url:'<?= base_url("admincontrol/delete_user_group") ?>',
			type:'POST',
			dataType:'json',
			data:{id:$this.attr("data-id")},
			beforeSend:function(){
				$this.prop("disabled",true);
			},
			complete:function(){
				$this.prop("disabled",false);
			},
			success:function(json){
				
				if(json.status==1)
				{
					window.location.reload();	
				}else{
					Swal.fire('Warning', json.message, 'warning');
				}
				
			},
		})
	});

	setTimeout(function(){ $('.alert-dismissable').remove(); }, 5000);

</script>