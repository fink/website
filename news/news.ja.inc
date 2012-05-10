<a name="2012-04-14%20fink-0.32.6%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2012-04-14: </span><span class="news-headline">fink-0.32.6 リリース</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.6</code> が、2012年4月14日にリリースされました。
    このリリースでは、<code>BuildAsNobody: false</code> というパッケージ記述フィールドが追加されました。
    この場合、<code>fink --build-as-nobody</code> でパッケージがビルドできないことを示します。
    現在のところ、これ自体は何も影響がありませんが、<code>fink-0.33.0</code> 以降では
    デフォルトでは権限のないユーザーでビルドするようになり、このフィールドがある場合は root でビルドします。
   </p>
  <a name="2012-04-09%20fink-0.32.5.5%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2012-04-09: </span><span class="news-headline">fink-0.32.5.5 リリース</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.5</code> が、2012年4月9日にリリースされました。
    <b>10.5/PowerPC</b> で bootstrap する際の問題に対処するバグ修正です。
   </p>
  <a name="2012-04-08%20fink-0.32.5.4%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2012-04-08: </span><span class="news-headline">fink-0.32.5.4 リリース</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.4</code> が、2012年4月8日にリリースされました。
    これにより、Xcode Command Line Tools に対して bootstrap ができるようになります。
    パッケージによっては、ビルドに完全な Xcode を必要とする場合もあることに注意してください。
   </p>
  
