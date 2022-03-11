<?php foreach ($lists as $key => $value) { ?>
	<tr>
		<td><?= $value['vd_id'] ?></td>
		<td><?= $value['username'] ?></td>
		<td><?= dateFormat($value['vd_created_on'],'d F Y') ?></td>
		<td><?= $value['vd_payment_method'] ?></td>
		<td><?= $value['vd_txn_id'] ?></td>
		<td><?= c_format($value['vd_amount']) ?></td>
		<td><?= withdrwal_status($value['vd_status']) ?></td>
		<td class="text-right">
			<a href="<?= base_url('admincontrol/vendor_deposit_details/'. $value['vd_id']) ?>" class="btn btn-primary btn-sm"><?= __('admin.details') ?></a>
			<a href="javascript:void(0);" class="btn btn-danger btn-sm btn-delete-deposit" data-id="<?= $value['vd_id'] ?>">
				<?= __('admin.delete') ?>
			</a>
		</td>
	</tr>
<?php  } ?>