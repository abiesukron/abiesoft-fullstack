<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\vendor\abiesoft\Http/../../../templates/admin/page/test/add.latte */
final class Template_e70c7db477 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\vendor\\abiesoft\\Http/../../../templates/admin/page/test/add.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('js', get_defined_vars()) /* line 47 */;
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
                <input data-tipe=\'email\' class=\'form-control\' id=\'email\' name=\'email\' placeholder=\'Contoh: email@email.com\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'web\'>Website</label>
                <input data-tipe=\'web\' class=\'form-control\' id=\'web\' name=\'web\' placeholder=\'Contoh: website.com\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'password\'>Password</label>
                <input data-tipe=\'password\' class=\'form-control\' id=\'password\' name=\'password\' placeholder=\'Masukan Password\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'tanggal\'>Tanggal</label>
                <input data-tipe=\'tanggal\' class=\'form-control\' id=\'tanggal\' name=\'tanggal\' placeholder=\'Tanggal\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'jumlah\'>Jumlah</label>
                <input data-tipe=\'angka\' class=\'form-control\' id=\'jumlah\' name=\'jumlah\' placeholder=\'Jumlah\'>
            </div>
            <div class=\'form-grup\'>
                <label for=\'jeniskelamin\'>Jenis Kelamin</label>
                <select data-tipe=\'select\' class=\'form-control\' id=\'jeniskelamin\' name=\'jeniskelamin\'>
                    <option value=\'\'>Pilih Jenis Kelamin</option>
                    <option value=\'laki-laki\'>Laki-laki</option>
                    <option value=\'perempuan\'>Perempuan</option>
                </select>
            </div>
            <div class=\'form-grup\'>
                <label for=\'alamat\'>Alamat</label>
                <textarea data-tipe=\'editor-only\' class=\'form-control\' id=\'alamat\' name=\'alamat\' placeholder=\'Alamat\'></textarea>
            </div>
            <div class=\'form-single-button\'>
                <button><span id=\'btnSubmit\'>Sign up</span></button>
            </div>
        </form>
    </div>
</div>
';
	}


	/** {block js} on line 47 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
toSubmit({
    formID: \'formInput\',
    validasi: [
        \'email|setEmail\',
        \'web|setUrl\',
        \'password|setText\',
        \'tanggal|setText\',
        \'jumlah|setAngkaOnly\',
        \'jeniskelamin|setPilihan\',
        \'alamat|setText\'
    ],
    submit: {
        url: \'surat\',
        tabel: \'surat\',
        submitButtonID: \'\',
        submitButtonLabel: \'Simpan..\',
        submitButtonLoadingLabel: \'Menyimpan..\',
        messageSuccess: \'Surat telah dibuat\',
        resetForm: [\'nama\'],
        focus: \'nama\',
        consoleResult: true
    }
});
</script>
';
	}
}
