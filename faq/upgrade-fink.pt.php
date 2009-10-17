<?
$title = "Perguntas frequentes - Atualizando o Fink";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/10/17 23:42:51';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="usage-fink.php?phpLang=pt" title="Instalação, uso e manutenção do Fink"><link rel="prev" href="mirrors.php?phpLang=pt" title="Espelhos do Fink">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 4. Atualizando o Fink (resolução de problemas específicos a uma
    versão)</h1>
    
    
    <a name="leopard-bindist1">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: O Fink não enxerga pacotes novos mesmo depois de eu rodar uma
        autoatualização via rsync ou CVS.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Este é um problema que está acontecendo com pessoas na versão OS
        10.5 usando o instalador binário. Verifique sua versão:</p><pre>fink --version</pre><p>Se você tiver o <code>fink-0.27.13-41</code>, que é a versão que vem
        com o instalador, ou <code>fink-0.27.16-41</code>, então há algumas
        opções.</p><ul>
	  <li>
	    <b>rsync (preferencial):</b> Execute os comandos abaixo
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (alternativo):</b> Execute
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>Ambos o atualizarão para a versão mais nova do
        <code>fink</code>.</p></div>
    </a>
    <a name="leopard-bindist2">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: Quando eu tento instalar um pacote eu recebo a mensagem de erro
        'Can't resolve dependency "fink (&gt;= 0.28.0)"' (Não é possível resolver
        a dependência "fink (&gt;= 0.28.0)"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Aplique a correção sugerida na <a href="#leopard-bindist1">pergunta anterior</a>.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=pt">5. Instalação, uso e manutenção do Fink</a></p>
<? include_once "../footer.inc"; ?>


