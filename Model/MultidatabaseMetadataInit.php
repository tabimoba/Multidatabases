<?php
/**
 * MultidatabaseMetadataInit Model
 * 汎用データベースメタデータ初期値定義に関するモデル処理
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., Ltd.) <ohno.tomoyuki@ricksoft.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('MultidatabasesAppModel', 'Multidatabases.Model');

/**
 * MultidatabaseMetadataInit Model
 *
 * @author Tomoyuki OHNO (Ricksoft, Co., Ltd.) <ohno.tomoyuki@ricksoft.jp>
 * @package NetCommons\Multidatabases\Model
 */
class MultidatabaseMetadataInit extends MultidatabasesAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = false;

/**
 * Init Metadatas
 * @var array
 */
	public $initMetadatas = [
		[
			'id' => '',
			'key' => '',
			'name' => 'タイトル',
			'position' => 0,
			'rank' => 0,
			'col_no' => 1,
			'type' => 'text',
			'selections' => '',
			'is_require' => 1,
			'is_title' => 1,
			'is_searchable' => 1,
			'is_sortable' => 1,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 1,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => 'ふりがな',
			'position' => 0,
			'rank' => 1,
			'col_no' => 2,
			'type' => 'text',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => 'カテゴリ',
			'position' => 0,
			'rank' => 2,
			'col_no' => 3,
			'type' => 'select',
			'selections' => [
				'国語',
				'算数',
				'理科',
				'社会',
				'総合',
				'音楽',
				'図工',
				'体育'
			],
			'is_require' => 1,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 1,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '概要',
			'position' => 0,
			'rank' => 3,
			'col_no' => 80,
			'type' => 'wysiwyg',
			'selections' => '',
			'is_require' => 1,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 1,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '連絡先',
			'position' => 1,
			'rank' => 0,
			'col_no' => 81,
			'type' => 'textarea',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 1,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '担当者',
			'position' => 1,
			'rank' => 1,
			'col_no' => 4,
			'type' => 'text',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => 'ホームページ',
			'position' => 1,
			'rank' => 2,
			'col_no' => 5,
			'type' => 'text',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '対象',
			'position' => 1,
			'rank' => 3,
			'col_no' => 6,
			'type' => 'select',
			'selections' => [
				'小学校',
				'中学校',
				'高校'
			],
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '資料',
			'position' => 1,
			'rank' => 4,
			'col_no' => 7,
			'type' => 'file',
			'selections' => 0,
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 0,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 1,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => 'コメント',
			'position' => 2,
			'rank' => 0,
			'col_no' => 82,
			'type' => 'textarea',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '検索キーワード',
			'position' => 2,
			'rank' => 1,
			'col_no' => 8,
			'type' => 'text',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 1,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 0,
		],
		[
			'id' => '',
			'key' => '',
			'name' => '画像',
			'position' => 3,
			'rank' => 0,
			'col_no' => 9,
			'type' => 'image',
			'selections' => '',
			'is_require' => 0,
			'is_title' => 0,
			'is_searchable' => 0,
			'is_sortable' => 0,
			'is_file_dl_require_auth' => 0,
			'is_visible_file_dl_counter' => 0,
			'is_visible_field_name' => 1,
			'is_visible_list' => 0,
			'is_visible_detail' => 1,
		],
	];
}
