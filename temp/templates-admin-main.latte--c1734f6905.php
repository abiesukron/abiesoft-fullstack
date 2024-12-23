<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\templates\admin\main.latte */
final class Template_c1734f6905 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\templates\\admin\\main.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en" data-thema=\'dark\'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-Baseurl" content="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 6 */;
		echo '">
    <meta name="x-Apikey" content="';
		echo LR\Filters::escapeHtmlAttr($apikey) /* line 7 */;
		echo '">
    <meta name="x-Prefix" content="';
		echo LR\Filters::escapeHtmlAttr($prefix) /* line 8 */;
		echo '">
    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 9 */;
		echo '</title>
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
		echo 'assets/admin/css/style.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/admin/css/form.css">
';
		$this->renderBlock('css', get_defined_vars()) /* line 12 */;
		echo '</head>
<body>
';
		$this->createTemplate('./components/topbar.latte', $this->params, 'include')->renderToContentType('html') /* line 15 */;
		$this->createTemplate('./components/sidebar.latte', $this->params, 'include')->renderToContentType('html') /* line 16 */;
		echo '
    <div class=\'page\'>
';
		$this->renderBlock('content', get_defined_vars()) /* line 19 */;
		echo '    </div>
    <div id=\'toasthere\'></div>
    

    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 24 */;
		echo 'assets/admin/js/style.js"></script>
    <script>
        const _0x9e5634=_0x1900;function _0x1900(_0x9e08da,_0x84107e){const _0xbc7a38=_0xbc7a();return _0x1900=function(_0x19007c,_0xac3b08){_0x19007c=_0x19007c-0x163;let _0x2ff9b8=_0xbc7a38[_0x19007c];return _0x2ff9b8;},_0x1900(_0x9e08da,_0x84107e);}function _0xbc7a(){const _0x43f46e=[\'then\',\'createElement\',\'data\',\'110FHWJdC\',\'__csrf\',\'length\',\'GET\',\'5411850yfacSe\',\'api/csrf\',\'120053XgcNzA\',\'querySelectorAll\',\'log\',\'hidden\',\'2711980DhzGTM\',\'append\',\'9838197PogkZD\',\'setAttribute\',\'1297457dzVTin\',\'4569444opVboF\',\'24CqNUfe\',\'value\',\'name\',\'application/json\',\'input\',\'74793LPDbZK\'];_0xbc7a=function(){return _0x43f46e;};return _0xbc7a();}(function(_0xb1dda3,_0xe4fa1c){const _0x5bdcfa=_0x1900,_0x48a646=_0xb1dda3();while(!![]){try{const _0x325106=parseInt(_0x5bdcfa(0x171))/0x1+parseInt(_0x5bdcfa(0x16b))/0x2*(-parseInt(_0x5bdcfa(0x167))/0x3)+-parseInt(_0x5bdcfa(0x17a))/0x4+parseInt(_0x5bdcfa(0x175))/0x5+parseInt(_0x5bdcfa(0x16f))/0x6+-parseInt(_0x5bdcfa(0x179))/0x7*(-parseInt(_0x5bdcfa(0x17b))/0x8)+parseInt(_0x5bdcfa(0x177))/0x9;if(_0x325106===_0xe4fa1c)break;else _0x48a646[\'push\'](_0x48a646[\'shift\']());}catch(_0x19fc20){_0x48a646[\'push\'](_0x48a646[\'shift\']());}}}(_0xbc7a,0xaae8c));const HEADER={\'x-API-key\':apikey,\'Content-Type\':_0x9e5634(0x165)},HEADERFORM={\'x-API-key\':apikey};let gF=document[_0x9e5634(0x172)](\'form\');function oAdavp(){const _0x4d66e7=_0x9e5634;fetch(Baseurl+_0x4d66e7(0x170),{\'method\':_0x4d66e7(0x16e),\'headers\':HEADER})[_0x4d66e7(0x168)](_0x3cffe0=>_0x3cffe0[\'json\']())[\'then\'](_0x373353=>{const _0x378230=_0x4d66e7; ;let _0x48ea24=_0x373353[_0x378230(0x16a)];for(let _0x8f94db=0x0;_0x8f94db<gF[_0x378230(0x16d)];_0x8f94db++){let _0x5f43ea=document[_0x378230(0x169)](_0x378230(0x166));_0x5f43ea[_0x378230(0x178)](\'type\',_0x378230(0x174)),_0x5f43ea[_0x378230(0x178)](\'id\',\'__csrf\'),_0x5f43ea[_0x378230(0x178)](_0x378230(0x164),_0x378230(0x16c)),_0x5f43ea[_0x378230(0x178)](_0x378230(0x163),_0x48ea24),gF[_0x8f94db][_0x378230(0x176)](_0x5f43ea);}return![];})[\'catch\'](_0x2e22cc=>{const _0x2517d4=_0x4d66e7;return console[_0x2517d4(0x173)](_0x2e22cc),![];});}oAdavp();
    </script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 28 */;
		echo 'assets/admin/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 29 */;
		echo 'assets/admin/js/toast.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 30 */;
		echo 'assets/admin/js/form.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 31 */;
		echo 'assets/admin/js/list.js"></script>

';
		$this->renderBlock('js', get_defined_vars()) /* line 33 */;
		echo '</body>
</html>';
	}


	/** {block title} on line 9 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block css} on line 12 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block content} on line 19 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block js} on line 33 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
