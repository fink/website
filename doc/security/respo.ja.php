<?
$title = "セキュリティポリシー - 責任";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/07/08 15:50:32';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="セキュリティポリシー Contents"><link rel="next" href="severity.php?phpLang=ja" title="返答時間と即時行動"><link rel="prev" href="index.php?phpLang=ja" title="セキュリティポリシー Contents">';

include_once "header.inc";
?>

<h1>セキュリティポリシー - 1 責任</h1>
        
        
        <h2><a name="who">1.1 誰が責任を負うのか?</a></h2>
            
			<p>
				Fink のパッケージには、一つにつきメンテナが一人つきます。
				特定のパッケージのメンテナは、コマンドラインプロンプトで <code>fink info packagename</code> でわかります。
				これにより、このような一覧が返ってきます。
				Maintainer: Fink Core Group &lt;fink-core@lists.sourceforge.net&gt;
				メンテナはパッケージに対して全ての責任を負います。
				各メンテナは従う必要があります。
			</p>
        
        <h2><a name="contact">1.2 誰にコンタクトしたら良いか?</a></h2>
            
            <p>
					あるパッケージソフトウェアに関するセキュリティ案件が有る場合、メンテナと <b>Fink Core Team.</b> に知らせてください。
					メンテナのメールアドレスはパッケージ記述にあります。
					<b>Fink Core Team.</b> のメールアドレスはfink-core@lists.sourceforge.net  です。
				</p>
        
        <h2><a name="prenotifications">1.3 事前通告</a></h2>
            
            <p>
				Fink パッケージ化されているソフトウェの深刻なセキュリティ案件は、事前に知らせる必要があるでしょう。
				メンテナがすぐに対応できるとは限らないため、このような場合 <b>Fink Security Team</b> にも報告してください。
				チームメンバーのメールは、それぞれこの文書の最後に書かれています。
				fink-core@lists.sourceforge.net は公開されているメーリングリストです。
				守秘の必要のある事前報告はこのリストには<b>送らないでください</b>。
				</p>
        
        <h2><a name="response">1.4 返答</a></h2>
            
				<p>
					報告されたセキュリティ案件は <b>Fink Core Team</b> によって返答されます。 
					各メンテナはそれぞれ報告を認識する必要があります。
					メンテナが不在で24時間以内に報告を認識しない場合、 <b>Fink Core Team</b> にメンテナが返答できないかもしれないという情報が伝わります。
				</p>
				<p>
					パッケージメンテナに知らせようと思ったが、メールシステムにより送信エラーが返ってきた場合、 <b>Fink Core Team</b> に直ちにメンテナが捕まらないと連絡してください。
					パッケージは、メンテナに関わり無く直ちに更新されます。
				</p>
        
    <p align="right">
Next: <a href="severity.php?phpLang=ja">2 返答時間と即時行動</a></p>

<? include_once "footer.inc"; ?>
