<?php
/**
 * MultidatabasesBlockRolePermissions edit view
 * 汎用データベース 権限設定 view
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., Ltd.) <ohno.tomoyuki@ricksoft.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div class="block-setting-body">
	<?php echo $this->BlockTabs->main(BlockTabsHelper::MAIN_TAB_BLOCK_INDEX); ?>

	<div class="tab-content">
		<?php echo $this->BlockTabs->block(BlockTabsHelper::BLOCK_TAB_PERMISSION); ?>

		<?php echo $this->element('Blocks.edit_form', [
			'model' => 'MultidatabaseBlockRolePermission',
			//'action' => 'edit' . '/' . $this->data['Frame']['id'] . '/' . $this->data['Block']['id'],
			'callback' => 'Multidatabases.MultidatabaseBlockRolePermissions/edit_form',
			'cancelUrl' => NetCommonsUrl::backToIndexUrl('default_setting_action'),
		]); ?>
	</div>
</div>
