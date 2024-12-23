<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\My Tools\abiesoft-fullstack\templates\admin\components\topbar.latte */
final class Template_5d308a5447 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\My Tools\\abiesoft-fullstack\\templates\\admin\\components\\topbar.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class=\'topbar\'>
    <div class=\'blur container\'></div>
    <div class=\'search container\'>
        <div class=\'kiri\'>
            <button data-toggle=\'sidebar\'>
                <svg data-toggle=\'sidebar\' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path data-toggle=\'sidebar\' fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6" onClick=\'el("#cari").focus()\'>
                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd"></path>
            </svg>
            <input placeholder=\'Cari..\' id=\'cari\'>
        </div>
        <div class=\'kanan\'>
            <button data-toggle=\'mode\' id=\'iconmode\'><svg data-toggle=\'mode\' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path data-toggle=\'mode\' fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd"></path></svg></button>
            <button data-toggle=\'notifikasi\'>
                <svg data-toggle=\'notifikasi\' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path data-toggle=\'notifikasi\' fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class=\'photo\' data-toggle=\'profile\'>
                <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 23 */;
		echo 'assets/admin/images/default.png\' data-toggle=\'profile\'>
            </div>

            <div class=\'popup-profile\' id=\'profile\'>
                <div class=\'area\'>
                    <div class=\'cover\'>
                        <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 29 */;
		echo 'assets/admin/images/default.png\'>
                    </div>
                    <div class=\'info\'>
                        <h4>Admin</h4>
                        <small>abbibogor@gmail.com</small>
                    </div>
                    <div class=\'footer-button\'>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Seting</span>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class=\'popup-standar\' id=\'notifikasi\'>
                <div class=\'area\'>
                    <div class=\'header\'>
                        <h4>Notifikasi</h4>
                        <div class=\'badge\'>5</div>
                    </div>
                    <div class=\'body\'>
                        <ul>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 63 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 72 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 81 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 90 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 99 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class=\'footer\'>
                        <button class=\'mini-button\'>
                            <span>Semua Notifikasi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class=\'popup-standar\' id=\'pesan\'>
                <div class=\'area\'>
                    <div class=\'header\'>
                        <h4>Pesan</h4>
                        <div class=\'badge\'>5</div>
                    </div>
                    <div class=\'body\'>
                        <ul>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 129 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 138 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 147 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 156 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                            <li>
                                <div class=\'cover\'>
                                    <img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 165 */;
		echo 'assets/admin/images/default.png\'>
                                </div>
                                <div class=\'info\'>
                                    <div>Pesan baru dari teman anda</div>
                                    <small>Baru saja</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class=\'footer\'>
                        <button class=\'mini-button\'>
                            <span>Semua Pesan</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>';
	}
}
