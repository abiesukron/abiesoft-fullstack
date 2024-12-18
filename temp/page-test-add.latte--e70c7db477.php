<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\vendor\abiesoft\Http/../../../templates/admin/page/test/add.latte */
final class Template_e70c7db477 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\vendor\\abiesoft\\Http/../../../templates/admin/page/test/add.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		echo '<div class=\'card container\'>
    <div class=\'card-body\'>
        <form method=\'post\' id=\'formInput\' name=\'formInput\'>
            <div class=\'form-grup\'>
                <label for=\'email\'>Email</label>
                <input class=\'form-control\' id=\'email\' name=\'email\' placeholder=\'Contoh: email@email.com\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'password\'>Password</label>
                <input data-tipe=\'password\' class=\'form-control\' id=\'password\' name=\'password\' placeholder=\'Masukan Password\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'jeniskelamin\'>Jenis Kelamin</label>
                <select data-tipe=\'select\' class=\'form-control\' id=\'jeniskelamin\' name=\'jeniskelamin\'>
                    <option value=\'\'>Pilih Jenis Kelamin</option>
                    <option value=\'laki-laki\'>Laki-laki</option>
                    <option value=\'perempuan\'>Perempuan</option>
                </select>
            </div>
            <div class=\'form-single-button\'>
                <button>Sign up</button>
            </div>
        </form>
    </div>
</div>
';
	}
}
