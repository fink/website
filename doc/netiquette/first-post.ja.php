<?
$title = "ネチケット - 最初";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:55';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ネチケット Contents"><link rel="next" href="reply.php?phpLang=ja" title="投稿への返信"><link rel="prev" href="before-post.php?phpLang=ja" title="投稿の前に">';


include_once "header.ja.inc";
?>
<h1>ネチケット - 2. 最初の投稿</h1>
    
    
    <h2><a name="system">2.1 何がインストールされているか?</a></h2>
      
      <p>パッケージのインストールに問題がある場合，システムの以下の情報は提供しましょう:</p>
      <ul>
        <li>OS バージョン．</li>
        <li>使用している Fink のバージョン．
		ターミナルウィンドウで
		<pre>fink --version</pre>
		として，出力を投稿すると良いでしょう．</li>
        <li>バイナリからのインストール (<code>apt-get</code>) か，ソースからのインストールか (<code>fink install</code>) 明記します．
		<p>後者であれば， Developer Tools バージョンも必要です．.</p>
		</li>
        <li><p>X11 を必要とするパッケージであれば， Apple X11 か XFree86 のどちらかを明記します．
		後者はバージョンも明記します．
		</p><p>不明の場合はそう書きます．</p></li>
      </ul>
    
    <h2><a name="problem-description">2.2 何がおかしいのか?</a></h2>
      
      <ul>
        <li><b>問題のあるパッケージの名称とバージョンを明記する．</b>  
		<p>これは，投稿の Subject 行に書く．</p>
		<p>例えば，<code>foo-3.141-6</code> に問題があるとき， <code>foo</code> と略さない．</p>
		<p>特に，あるパッケージ (例 <code>baz-2.18-1</code>) が他のパッケージ
		(<code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...) に依存していて，
		問題の発生源が <code>foo</code> である場合，
		<code>foo-3.141-6</code> として報告を行い， <code>baz-2.18-1</code> としない．</p>
		</li>
        <li><b>問題を記述する．</b>  <p>
		すなわち，エラーメッセージを記述する．</p>
		<ol>
            <li>バイナリインストール時の問題は，問題のあるパッケージを開き始めた時点から:<pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre>最後までを抜き出します．<p></p></li>
            <li>ソースからの場合，いくつかの注意点があります:<ol>
                <li>最初の configure 時に失敗している場合，通常すぐにわかります．
				最後のエラーメッセージの直前数行を投稿してください:<pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre>
					<p>configure ログファイルに関連情報があると思った場合，
					<code>/sw/src/foo-3.141-6/foo-3.141/config.log</code> の該当部分も投稿します．
					<b>ファイルは，サイズが巨大になるときがあるので送らないでください．</b>
					</p></li>
                <li>パッケージのビルドを開始した直後にエラーが発生する場合，
				コンパイラが実行しようとした最後の行を投稿してください:<pre>...
gcc &lt;flags, files etc.&gt;
&lt;error messages&gt;
...</pre></li>
                <li><code>execution of mv failed</code> が頻繁に発生する場合，
				このエラーが発生しだす前のビルド出力を探すようにいわれるでしょう．
				よって，投稿する前に各自で探す努力をしてください．
				</li>
              </ol></li>
          </ol>    </li>
      </ul>
    
    <h2><a name="remedies">2.3 何を試したか?</a></h2>
      
      <p>何を試したかを記述すると良いでしょう．例えば，</p>
      <ul>
        <li>FAQ や他の文書に記されている手順</li>
        <li>問題発生源とおもわれるパッケージの削除</li>
        <li>再ビルド/再インストール</li>
        <li>パッケージ記述の再更新</li>
        <li>その他</li>
      </ul>
      <p>これにより，既に試したことを提案されることがなくなります．</p>
    
    <h2><a name="future-plans">2.4 次に何をするか?</a></h2>
      
      <p>何点かポイントがあります:</p>
      <ul>
        <li>反応がなかった場合に何をするかを書く</li>
        <li>行動が妥当かどうかを問う</li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=ja">3. 投稿への返信</a></p>
<? include_once "../../footer.inc"; ?>


