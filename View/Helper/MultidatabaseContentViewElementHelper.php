<?php
/**
 * MultidatabaseContentViewElementHelper Helper
 * 汎用データベースコンテンツ表示エレメントヘルパー
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Tomoyuki OHNO (Ricksoft Co., Ltd.) <ohno.tomoyuki@ricksoft.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppHelper', 'View/Helper');

/**
 * MultidatabaseContentViewElementHelper Helper
 *
 * @author Tomoyuki OHNO (Ricksoft, Co., LTD.) <ohno.tomoyuki@ricksoft.jp>
 * @package NetCommons\Multidatabase\View\Helper
 *
 */
class MultidatabaseContentViewElementHelper extends AppHelper {

/**
 * 使用するHelpers
 *
 * @var array
 */
	public $helpers = [
		'NetCommons.Button',
		'NetCommons.NetCommonsHtml',
		'NetCommons.NetCommonsForm',
		'Form',
	];

/**
 * フォーム部品に合った表示出力する
 *
 * @param array $content コンテンツ配列
 * @param array $metadata メタデータ配列
 * @return string HTML
 */
	public function renderViewElement($content, $metadata) {
		$elementType = $metadata['type'];
		$colNo = $metadata['col_no'];

		if (
			in_array($elementType, ['date', 'created', 'updated'])
		) {
			return $this->__renderViewElementDate($content, $colNo, $elementType);
		}

		switch ($elementType) {
			case 'link':
				return $this->__renderViewElementLink($content, $colNo);
			case 'wysiwyg':
				return $this->__renderViewElementWysiwyg($content, $colNo);
			case 'file':
				return $this->__renderViewElementFile($content, $colNo,
					$metadata['is_visible_file_dl_counter']);
			case 'image':
				return $this->__renderViewElementImage($content, $colNo);
			case 'autonumber':
				return $this->__renderViewElementAutoNumber($content);
			case 'mail':
				return $this->__renderViewElementEmail($content, $colNo);
			case 'hidden':
				return $this->__renderViewElementHidden($content, $colNo);
			default:
				// text, textarea, checkbox, selectはこちらの処理
				return $this->__renderViewElementGeneral($content, $colNo);
		}
	}

/**
 * 汎用的な値出力方法
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementGeneral($content, $colNo) {
		$value = (string)trim(h($content['MultidatabaseContent']['value' . $colNo]));

		if ($value === '') {
			return '';
		}

		if (strstr($value, '||') <> false) {
			return str_replace('||', '<br>', $value);
		}

		$value = nl2br($value);
		return $value;
	}

/**
 * WYSIWYGの値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementWysiwyg($content, $colNo) {
		return $content['MultidatabaseContent']['value' . $colNo];
	}

/**
 * 日付の値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @param string $type 種別(created, updated, その他)
 * @return string HTML
 */
	private function __renderViewElementDate($content, $colNo, $type = null) {
		switch ($type) {
			case 'created':
				// 作成日時を出力
				return date("Y-m-d H:i:s", strtotime($content['MultidatabaseContent']['created']));
			case 'updated':
				// 更新日時を出力
				return date("Y-m-d H:i:s", strtotime($content['MultidatabaseContent']['modified']));
			default:
				$value = $this->__renderViewElementGeneral($content, $colNo);
				return date("Y-m-d H:i:s", strtotime($value));
		}
	}

/**
 * ファイルアップロードの値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @param int $showCounter カウンターを表示するか 1:表示する
 * @return string HTML
 */
	private function __renderViewElementFile($content, $colNo, $showCounter = 0) {
		// アップロードされたファイルのリンクを表示＆パスワード入力ダイアログ

		if (! $fileInfo = $this->__getFileInfo($content, $colNo)) {
			return '';
		}

		$fileUrl = $this->__fileDlUrl($content, $colNo);
		$result = '<span class="glyphicon glyphicon-file text-primary"></span>&nbsp;';
		$result .= '<a href="' . $fileUrl . '">';
		$result .= __d('multidatabases', 'Download');
		$result .= '</a>';

		if ((int)$showCounter === 1) {
			$result .= '&nbsp;<span class="badge">';
			$result .= $fileInfo['UploadFile']['download_count'];
			$result .= '</span>';
		}

		return $result;
	}

/**
 * 画像用のファイルアップロードの値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementImage($content, $colNo) {
		// アップロードされた画像を表示

		if (! $this->__getFileInfo($content, $colNo)) {
			return '';
		}

		$fileUrl = $this->__fileDlUrl($content, $colNo);
		$result = '<img src="' . $fileUrl . '" alt="">';
		return $result;
	}

/**
 * 隠し属性の値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementHidden($content, $colNo) {
		return $this->__renderViewElementGeneral($content, $colNo);
	}

/**
 *リンクの値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementLink($content, $colNo) {
		$value = $this->__renderViewElementGeneral($content, $colNo);
		$result = '<a href="' . $value . '">' . $value . '</a>';
		return $result;
	}

/**
 * メールアドレスの値を出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __renderViewElementEmail($content, $colNo) {
		$value = $this->__renderViewElementGeneral($content, $colNo);
		$result = '<a href="mailto:' . $value . '">' . $value . '</a>';
		return $result;
	}

/**
 * 自動採番の値を出力する
 *
 * @param array $content コンテンツ配列
 * @return string HTML
 */
	private function __renderViewElementAutoNumber($content) {
		// 自動採番のフィールドを作成してここに表示させる
	}

/**
 * ファイルダウンロードURL出力用の配列を返す
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return array
 */
	private function __fileDlArray($content, $colNo) {
		return [
			'controller' => 'multidatabase_contents',
			'action' => 'download',
			$content['MultidatabaseContent']['multidatabase_key'],
			$content['MultidatabaseContent']['id'],
			'?' => ['col_no' => $colNo]
		];
	}

/**
 * ファイルダウンロードURLを出力する
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return string HTML
 */
	private function __fileDlUrl($content, $colNo) {
		return $this->NetCommonsHtml->url(
			$this->__fileDlArray($content, $colNo)
		);
	}

/**
 * ダウンロードファイルが存在するかチェックする
 *
 * @param array $content コンテンツ配列
 * @param int $colNo カラムNo
 * @return bool
 */
	private function __getFileInfo($content, $colNo) {
		if (
			empty($content['MultidatabaseContent']['id']) ||
			empty($colNo)
		) {
			return false;
		}

		$UploadFile = ClassRegistry::init('Files.UploadFile');
		$pluginKey = 'multidatabases';
		$file = $UploadFile->getFile(
			$pluginKey,
			$content['MultidatabaseContent']['id'],
			'value' . $colNo . '_attach'
		);

		if (! empty($file)) {
			return $file;
		}

		return false;
	}
}