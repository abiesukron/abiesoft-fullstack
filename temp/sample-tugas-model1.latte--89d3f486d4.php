<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\templates\admin\page\test\sample\tugas\model1.latte */
final class Template_89d3f486d4 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\templates\\admin\\page\\test\\sample\\tugas\\model1.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<ul class=\'unset-cursor\' id=\'model1\'>
    <li>
        <div class=\'info icon\'>
            <div class=\'cover\'>
                <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 5 */;
		echo 'assets/admin/images/default.png\'>
            </div>
            <div>
                <span>Tugas pertama</span>
                <p>Informasi tentang tugas pertama anda akan tampil disini, tapi hanya kisi-kisi tugasnya saja tidak dijelaskan secara mendetail. untuk lebih lanjutnya silahkan klik detil</p>
                <small>Baru saja</small>
            </div>
        </div>
        <div class=\'opsi\'>
            <button>
                <span>Detail</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </li>
</ul>';
	}
}
