<?php if($this->session->flashdata('success')){?>
			<div class="alert alert-success alert-dismissable my_alert_css">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			     <?php echo $this->session->flashdata('success'); ?> 
            </div>
		<?php } ?>
		<?php if($this->session->flashdata('error')){?>
			<div class="alert alert-danger alert-dismissable my_alert_css">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			     <?php echo $this->session->flashdata('error'); ?> 
            </div>
		<?php } ?>
		<?php if(!$zip_loaded){ ?>
			<div class="alert alert-danger">
				<?= __('admin.zip_extension_warning_l1') ?><br>
				<span style="border-bottom:dotted 2px  "><?= __('admin.zip_extension_warning_l2') ?></span>
			</div>
		<?php } ?>
		
        <div class="backup-grid">
            <div class="backup-grid-item">
                <div class="card h-100">
                    <div class="card-header">
                        <h6 class="card-title m-0 pull-left"><?= __('admin.upload_backup_file_zip') ?></h6>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="">
                            <div class="form-group">
                                <input type="file" name="backup_file">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><?= __('admin.upload') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="backup-grid-item">
                <div class="card  h-100">
                    <div class="card-header">
                        <h6 class="card-title m-0 pull-left"><?= __('admin.reset_all_data') ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-warning open-databascommieclear"><?= __('admin.reset_commission_data') ?></button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger open-databaseclear"><?= __('admin.reset_all_script_data') ?></button>
                            </div>
                        </div>
                        <div class="row-12 mt-4">
                            <p id="result"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="row">
			<div class="col-12">
				<div class="card m-b-30">
					<div class="card-header">
						<h6 class="card-title m-0 pull-left"><?= __('admin.database_backup') ?></h6>
						<div class="pull-right">
							<a class="btn btn-success" href="<?php echo base_url('admincontrol/backup/getbackup') ?>"><?= __('admin.get_backup') ?></a>
						</div>
					</div>
					<div class="card-body">
						<div class="table-rep-plugin">
							<?php if ($backups ==null) {?>
                                <div class="text-center">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                                     <h3 class="m-t-40 text-center text-muted"><?= __('admin.no_backups') ?></h3>
                                </div>
                            <?php } else { ?>
						       <div class="table-responsive b-0" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table  table-striped">
									<thead>
										<tr>
											
											<th><?= __('admin.file_name') ?></th>
											<th width="200px"><?= __('admin.date_time') ?></th>
											<th width="250px"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($backups as $backup){ ?>
											<tr>
												<td>
													<?= $backup['file'] ?> <br>
													<span class="text-muted"><b><?= __('admin.size') ?></b> <?= $backup['size'] ?></span>
												</td>
												<td><?= $backup['date'] ?></td>
												<td>
													<a href="<?php echo base_url('admincontrol/backup/download?file_name='. $backup['file']) ?>" class="btn btn-success"  target="_blank" ><?= __('admin.download') ?></a>
													<a href="<?php echo base_url('admincontrol/backup/restore?file_name='. $backup['file']) ?>" class="btn btn-primary" onclick="return confirm('<?= __('admin.restore_file_confirm') ?>')"><?= __('admin.restore') ?></a>
													<a href="<?php echo base_url('admincontrol/backup/delete?file_name='. $backup['file']) ?>" class="btn btn-danger" onclick="return confirm('<?= __('admin.delete_file_confirm') ?>')"><?= __('admin.delete') ?></a>
												</td>
											</tr>
										<?php } ?>
									   </tbody>
									</table>
							    </div>
                            <?php } ?>  
						</div>
					</div>
				</div> 
			</div> 
		</div>

 
 <div class="modal" id="model-databaseclear">
    <div class="modal-dialog">
        <div class= "modal-content">
            
            <div class="content-view">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_all_script_data') ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <?= __('admin.reset_all_script_data_warning'); ?>                    
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-primary cleandatabase"><?= __('admin.yes_reset_data'); ?></button>
                </div>
            </div>
            <div class="password-view d-none">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_all_script_data'); ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?= __('admin.enter_admin_password'); ?></label>
                        <input type="password" name="admin_password" id="admin_password" class="form-control">
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-primary cleandatabase"><?= __('admin.yes_reset_data'); ?></button>
                </div>
            </div>

            <div class="finalconfirm-view d-none">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_data_confirmation'); ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <p><?= __('admin.reset_data_warning'); ?></p>
                    <p class="text-danger"><?= __('admin.reset_data_agreed'); ?></p>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-primary final-cleandatabase"><?= __('admin.erase_all_data'); ?></button>
                </div>
            </div>
            
        </div>
    </div>
</div>

 <div class="modal" id="model-databascommieclear">
    <div class="modal-dialog">
        <div class= "modal-content">
            
            <div class="content-view">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_commission_data'); ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <?= __('admin.reset_commission_data_warning'); ?>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning databascommieclear"><?= __('admin.yes_reset_comm_data'); ?></button>
                </div>
            </div>
            <div class="password-view d-none">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_all_commission_data'); ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?= __('admin.enter_admin_password'); ?></label>
                        <input type="password" name="admin_password" class="form-control">
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning databascommieclear"><?= __('admin.yes_reset_comm_data'); ?></button>
                </div>
            </div>

            <div class="finalconfirm-view d-none">
            	<div class="modal-header">
	                <h4 class="modal-title m-0"><?= __('admin.reset_data_confirmation'); ?></h4>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>
                <div class="modal-body">
                    <p><?= __('admin.reset_data_warning'); ?></p>
                    <p class="text-danger"><?= __('admin.reset_data_agreed'); ?></p>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning final-databascommieclear"><?= __('admin.erase_all_comm_data'); ?></button>
                </div>
            </div>
            
        </div>
    </div>
</div>

 <div class="modal" id="model-clear_deposit">
    <div class="modal-dialog">
        <div class= "modal-content">
            
            <div class="content-view">
                <div class="modal-header">
                    <h4 class="modal-title m-0"><?= __('admin.reset_deposit_data'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?= __('admin.reset_deposit_data_confirmation'); ?>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning clear_deposit"><?= __('admin.yes_delete_deposit_data'); ?></button>
                </div>
            </div>
            <div class="password-view d-none">
                <div class="modal-header">
                    <h4 class="modal-title m-0"><?= __('admin.delete_deposit_data'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><?= __('admin.enter_admin_password'); ?></label>
                        <input type="password" name="admin_password" class="form-control">
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning clear_deposit"><?= __('admin.yes_delete_deposit_data'); ?></button>
                </div>
            </div>

            <div class="finalconfirm-view d-none">
                <div class="modal-header">
                    <h4 class="modal-title m-0"><?= __('admin.delete_data_confirmation'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><?= __('admin.vendor_deposit_delete_warning'); ?></p>
                    <p class="text-danger"><?= __('admin.vendor_deposit_delete_agreed'); ?></p>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?= __('admin.cancel_action'); ?></button>
                    <button type="button" class="btn btn-warning final-clear_deposit"><?= __('admin.erase_vendor_deposit_data'); ?></button>
                </div>
            </div>
            
        </div>
    </div>
</div>



<script type="text/javascript">
	$(".open-databaseclear").on("click",function(){
        $("#model-databaseclear").modal("show");
        $container = $("#model-databaseclear");
        $container.find(".content-view").removeClass('d-none');
        $container.find(".password-view,.finalconfirm-view").addClass('d-none');
    });
    
    $(".final-cleandatabase").on("click",function(){
        $this = $(this);
        if(password_confirm){
            $.ajax({
                url:'<?= base_url("admincontrol/clear_tables") ?>',
                type:'POST',
                dataType:'json',
                data:{admin_password: $("#admin_password").val()},
                beforeSend:function(){$this.btn("loading");},
                complete:function(){$this.btn("reset");},
                success:function(json){
                    if(json['success']){window.location.reload();}
                    
                    $container.find(".has-error").removeClass("has-error");
                    $container.find("span.text-danger").remove();
                    
                    if(json['errors']){
                        $.each(json['errors'], function(i,j){
                            $ele = $container.find('[name="'+ i +'"]');
                            if($ele){
                                $ele.parents(".form-group").addClass("has-error");
                                $ele.after("<span class='text-danger'>"+ j +"</span>");
                            }
                        })
                    }
                },
            })
        }
    });

    var password_confirm  = false;
    $(".cleandatabase").on("click",function(){
        $this = $(this);
        $container = $("#model-databaseclear");

        if($container.find(".password-view").hasClass("d-none")){
            $container.find(".password-view").removeClass('d-none');
            $container.find(".content-view").addClass('d-none');
            return true;
        }

        $.ajax({
            url:'<?= base_url("admincontrol/clear_tables") ?>',
            type:'POST',
            dataType:'json',
            data:{admin_password: $("#admin_password").val(),password_confirm:true},
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
                if(json['success']){
                    password_confirm  = true;
                    $container.find(".finalconfirm-view").removeClass('d-none');
                    $container.find(".content-view,.password-view").addClass('d-none');
                }
                
                $container.find(".has-error").removeClass("has-error");
                $container.find("span.text-danger").remove();
                
                if(json['errors']){
                    $.each(json['errors'], function(i,j){
                        $ele = $container.find('[name="'+ i +'"]');
                        if($ele){
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>"+ j +"</span>");
                        }
                    })
                }
            },
        })

    });
</script>

<script type="text/javascript">
	$(".open-databascommieclear").on("click",function(){
        $("#model-databascommieclear").modal("show");
        $container = $("#model-databascommieclear");
        $container.find(".content-view").removeClass('d-none');
        $container.find(".password-view,.finalconfirm-view").addClass('d-none');
    });
    
    $(".final-databascommieclear").on("click",function(){
        $this = $(this);
        if(password_confirm){
            $.ajax({
                url:'<?= base_url("admincontrol/clear_commission_tables") ?>',
                type:'POST',
                dataType:'json',
                data:{admin_password: $("#model-databascommieclear input[name='admin_password']").val()},
                beforeSend:function(){$this.btn("loading");},
                complete:function(){$this.btn("reset");},
                success:function(json){
                    if(json['success']){window.location.reload();}
                    
                    $container.find(".has-error").removeClass("has-error");
                    $container.find("span.text-danger").remove();
                    
                    if(json['errors']){
                        $.each(json['errors'], function(i,j){
                            $ele = $container.find('[name="'+ i +'"]');
                            if($ele){
                                $ele.parents(".form-group").addClass("has-error");
                                $ele.after("<span class='text-danger'>"+ j +"</span>");
                            }
                        })
                    }
                },
            })
        }
    });

    var password_confirm  = false;

    $(".databascommieclear").on("click",function(){
        $this = $(this);
        $container = $("#model-databascommieclear");

        if($container.find(".password-view").hasClass("d-none")){
            $container.find(".password-view").removeClass('d-none');
            $container.find(".content-view").addClass('d-none');
            return true;
        }

        $.ajax({
            url:'<?= base_url("admincontrol/clear_commission_tables") ?>',
            type:'POST',
            dataType:'json',
            data:{admin_password: $("#model-databascommieclear input[name='admin_password']").val(),password_confirm:true},
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
                //if(json['success']){window.location.reload();}
                if(json['success']){
                    password_confirm  = true;
                    $container.find(".finalconfirm-view").removeClass('d-none');
                    $container.find(".content-view,.password-view").addClass('d-none');
                }
                
                $container.find(".has-error").removeClass("has-error");
                $container.find("span.text-danger").remove();
                
                if(json['errors']){
                    $.each(json['errors'], function(i,j){
                        $ele = $container.find('[name="'+ i +'"]');
                        if($ele){
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>"+ j +"</span>");
                        }
                    })
                }
            },
        })

    });
</script>

<script type="text/javascript">
    $(".open-clear_deposit").on("click",function(){
        $("#model-clear_deposit").modal("show");
        $container = $("#model-clear_deposit");
        $container.find(".content-view").removeClass('d-none');
        $container.find(".password-view,.finalconfirm-view").addClass('d-none');
    });
    
    $(".final-clear_deposit").on("click",function(){
        $this = $(this);
        if(password_confirm){
            $.ajax({
                url:'<?= base_url("admincontrol/clear_deposit_tables") ?>',
                type:'POST',
                dataType:'json',
                data:{admin_password: $("#model-clear_deposit input[name='admin_password']").val()},
                beforeSend:function(){$this.btn("loading");},
                complete:function(){$this.btn("reset");},
                success:function(json){
                    if(json['success']){window.location.reload();}
                    
                    $container.find(".has-error").removeClass("has-error");
                    $container.find("span.text-danger").remove();
                    
                    if(json['errors']){
                        $.each(json['errors'], function(i,j){
                            $ele = $container.find('[name="'+ i +'"]');
                            if($ele){
                                $ele.parents(".form-group").addClass("has-error");
                                $ele.after("<span class='text-danger'>"+ j +"</span>");
                            }
                        })
                    }
                },
            })
        }
    });

    var password_confirm  = false;

    $(".clear_deposit").on("click",function(){
        $this = $(this);
        $container = $("#model-clear_deposit");

        if($container.find(".password-view").hasClass("d-none")){
            $container.find(".password-view").removeClass('d-none');
            $container.find(".content-view").addClass('d-none');
            return true;
        }

        $.ajax({
            url:'<?= base_url("admincontrol/clear_deposit_tables") ?>',
            type:'POST',
            dataType:'json',
            data:{admin_password: $("#model-clear_deposit input[name='admin_password']").val(),password_confirm:true},
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
                //if(json['success']){window.location.reload();}
                if(json['success']){
                    password_confirm  = true;
                    $container.find(".finalconfirm-view").removeClass('d-none');
                    $container.find(".content-view,.password-view").addClass('d-none');
                }
                
                $container.find(".has-error").removeClass("has-error");
                $container.find("span.text-danger").remove();
                
                if(json['errors']){
                    $.each(json['errors'], function(i,j){
                        $ele = $container.find('[name="'+ i +'"]');
                        if($ele){
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>"+ j +"</span>");
                        }
                    })
                }
            },
        })

    });
</script>

<script>
    $(document).on("click", ".import_demo_data", function(){
        
        if (confirm('<?= __('admin.import_demo_data_warning'); ?>')) 
        {
            $.ajax({
                url:'<?= base_url("admincontrol/import_demo_data") ?>',
                success: function() {
                    document.getElementById("result").innerHTML = '<?= __('admin.import_demo_data_successful'); ?>';
                }
            });
        }
        else
        {
            document.getElementById("result").innerHTML = '<?= __('admin.action_canceled'); ?>';
        } 
    });
</script>
