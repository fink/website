<?php
/* $Id: constants.ja.inc,v 1.14 2014/10/23 22:09:49 thesin Exp $ */
// +--------------------------------------------------------------------------+
// | Constants                                                                |
// +--------------------------------------------------------------------------+
// | Copyright (c)                                                            |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http://www.gnu.org/copyleft/gpl.html                 |
// +--------------------------------------------------------------------------+
// | Defines the constants used throughout the Fink website                   |
// | for different human languages                                            |
// |                   (http://www.finkproject.org)                           |
// |                                                                          |
// | usage:    1. read the comments                                           |
// |           2. encoding must be UTF-8 or it will not show properly         |
// +--------------------------------------------------------------------------+

/* The Sections.  Used in Menu Navigation Bar */
define ("FINK_LC_ALL", 'ja_JP');
define ("FINK_SF_ENCODING", 'UTF-8');
define ("FINK_DATE_FORMAT", '%Y年%m月%e日');

/* The Sections.  Used in Menu Navigation Bar */
define ("FINK_SECTION_HOME", 'ホーム');
define ("FINK_SECTION_DOWNLOAD", 'ダウンロード');
define ("FINK_SECTION_PACKAGE", 'パッケージ');
define ("FINK_SECTION_HELP", 'ヘルプ');
define ("FINK_SECTION_FAQ", 'F.A.Q.');
define ("FINK_SECTION_DOCUMENTATION", '文書');
define ("FINK_SECTION_MAILING_LISTS", 'メーリングリスト');

/* The Home Subsections.  Used in Menu Navigation Bar */
define ("FINK_SECTION_HOME_INDEX", 'ホーム');
define ("FINK_SECTION_HOME_NEWS", 'ニュース');
define ("FINK_SECTION_HOME_ABOUT", 'Fink について');
define ("FINK_SECTION_HOME_CONTRIBUTORS", '人々');
define ("FINK_SECTION_HOME_LINKS", 'リンク');

/* The word 'Sections'.  Used in Menu Navigation Bar */
define ("FINK_SECTIONS", 'セクション');

/* Contents as Table of Contents.  Used in FAQ/Documentation Sections */
define ("FINK_CONTENTS", '目次');
define ("FINK_NEXT", '次');
define ("FINK_Q", '質問');
define ("FINK_A", '回答');

/* Printer */
define ("FINK_PRINTER", 'プリンタ');
define ("FINK_PRINT_VERSION", '印刷用ページ');

/* Footer */
define ("META_KEYWORDS", 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, オープンソース, ダウンロード, フリーソフトウェア, ポート, 開発, パッケージ管理');
define ("META_DESCRIPTION", 'Fink プロジェクトは オープンソースソフトウェアを Darwin と Mac OS X で使えるようにするものです。 Mac OS X 上でコンパイルと実行できるように Unix ソフトウェアを修正 (ポート) しています。こうしてできたものは全て一つのディストリビューションに統合され、ダウンロードすることができます');
//define ("HEADER_HOSTED_BY", '{img} によってホストされています');
define ("FOOTER_AVAILABLE_LANGUAGES", '他の言語');
define ("FOOTER_GENERATED_DYNAMICALLY", '自動作成');
define ("FOOTER_DATABASE_LAST_UPDATED", 'データベースの最終更新日:  %a, %b %d %Y, %R %Z');
define ("FOOTER_LAST_CHANGED", '{author} によって{date} {time}に更新されました');
?>
