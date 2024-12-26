<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\vendor\abiesoft\Http/../../../templates/admin/page/test/sample/chat.latte */
final class Template_8daec69bee extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\vendor\\abiesoft\\Http/../../../templates/admin/page/test/sample/chat.latte';

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
                <div class=\'card-chat\'>
                    <div class=\'card-area\' id=\'showResult\'>
                        <div>Area Obrolan</div>
                        <div id=\'showResult\'><div id=\'arealoading\'></div></div>
                    </div>
                    <div class=\'card-form\'>
                        <form method=\'action\' id=\'formChat\' name=\'formChat\' onSubmit=\'return getChatGPT();\'>
                            <div class=\'form-input\'>
                                <input type=\'text\' id=\'text\' name=\'text\' placeholder=\'Ketik sesuatu lalu enter\'>
                            </div>
                            <div class=\'form-button\'>
                                <button id=\'submitBtn\'>Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
		$this->renderBlock('js', get_defined_vars()) /* line 28 */;
	}


	/** {block js} on line 28 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
let resultKonten = "";
function getChatGPT() {
    let txt = el("#text");
    resultKonten += `<div class=\'block-chat\'><div class=\'me\'>`+txt.value+`</div><div id=\'arealoading\'></div></div>`;
    el(\'#showResult\').innerHTML = resultKonten;
    setTimeout(()=>{
        let arealoading = el("#arealoading");
        arealoading.innerHTML = "Mohon tunggu ..";
        const form = el(\'form[id="formChat"]\');
        const formData = new FormData(formChat);
        fetch(Baseurl + \'api/test\', {
            method: \'POST\',
            body: formData,
            headers: HEADERFORM
        }).then(response => response.text()).then(res => {
            resultKonten += "<div class=\'you\'>"+res+"</div>";
            el(\'#showResult\').innerHTML = resultKonten;
            txt.value = "";
            return false;
        }).catch(error => {        
            console.log(error);
            return false;
        });
        return false;
    });
    return false;
}

</script>
';
	}
}
