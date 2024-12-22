<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\vendor\abiesoft\Http/../../../templates/admin/page/test/sample/tugas.latte */
final class Template_3be81e7fd6 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\vendor\\abiesoft\\Http/../../../templates/admin/page/test/sample/tugas.latte';

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
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../../main.latte';
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
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class=\'container\'>
    <div class=\'row\'>
        <div class=\'col-12\'>
            <div class=\'card\'>
                <div class=\'card-wall\'>
                    <div class=\'display-5\'>Tugas</div>
                </div>
            </div>
        </div>
        <div class=\'col-3\'>
            <div class=\'card\'>
                <div class=\'card-header\'>
                    <div class=\'title\'>
                        Menu
                    </div>
                </div>
                <div class=\'card-list\'>
                    <ul>
                        <li class=\'active\' onClick=\'loadList(this.dataset.tablabel)\' data-tablabel=\'empty\' data-tab=\'cardlist\'>
                            <div class=\'info\'>
                                <span>Empty</span>
                            </div>
                            <div class=\'opsi\'></div>
                        </li>
                        <li onClick=\'loadList(this.dataset.tablabel)\' data-tablabel=\'surat\' data-tab=\'cardlist\'>
                            <div class=\'info\'>
                                <span>Surat</span>
                            </div>
                            <div class=\'opsi\'>
                                <div class=\'badge danger\'>0</div>
                            </div>
                        </li>
                        <li onClick=\'loadList(this.dataset.tablabel)\' data-tablabel=\'user\' data-tab=\'cardlist\'>
                            <div class=\'info\'>
                                <span>User</span>
                            </div>
                            <div class=\'opsi\'>
                                <div class=\'badge danger\'>10</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=\'col-9\'>
            <div class=\'card\'>
                <div class=\'card-header-search\'>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd"></path>
                    </svg>
                    <input type=\'text\' placeholder=\'Ketik sesuatu untuk mencari (tekan ctrl + /)\' data-keyboard=\'191\'>
                </div>
                <div class=\'card-list\' id=\'listshow\'></div>
            </div>
        </div>
    </div>
</div>
';
		$this->renderBlock('js', get_defined_vars()) /* line 61 */;
	}


	/** {block js} on line 61 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
function loadList(x) {

    let datatab = document.querySelectorAll(\'li[data-tab]\');
    if(datatab){
        for(let i=0; i<datatab.length; i++){
            datatab[i].setAttribute(\'class\',\'\');
            if(datatab[i].dataset.list == x){
                datatab[i].setAttribute(\'class\',\'active\');
            }
        }
    }

    let showBox = el(\'#listshow\');
    showBox.innerHTML = `
        <div class=\'p-20\'><div class=\'loader\'></div></div>
    `;
    setTimeout(()=>{
        switch(x){
            case \'surat\':
                toCardList({
                    mode: \'surat\',
                    url: \'api/test/surat\',
                    target: \'listshow\',
                    nama: \'surat\'
                })
            break;
            case \'user\':
                toCardList({
                    mode: \'image\',
                    url: \'api/test/user\',
                    target: \'listshow\',
                    nama: \'user\'
                })
            break;
            default:
                toCardList({
                    mode: \'empty\',
                    url: \'api/test/empty\',
                    target: \'listshow\',
                    nama: \'user\'
                })
            break;
        }
    },100);
}

toCardList({
    mode: \'empty\',
    url: \'api/test/empty\',
    target: \'listshow\',
    nama: \'user\'
});

</script>
';
	}
}
