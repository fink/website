<?
$title = "Sobre";
$cvs_author = '$Author: monipol $';
$cvs_date = '$Date: 2009/03/22 02:59:18 $';

include "header.inc";
?>


<h1>Sobre o Fink</h1>

<h2>O que é o Fink?</h2>

<p>
O Fink é um projeto que deseja trazer todo o mundo de software Unix de <a
href="http://www.opensource.org/">código aberto</a> para o <a
href="http://www.opensource.apple.com/">Darwin</a> e o <a
href="http://www.apple.com/macosx/">Mac OS X</a>.
Desta forma, temos dois objetivos principais.
Em primeiro lugar, modificar softwares de código aberto já existentes tais que
eles sejam compilados e executados no Mac OS X.
(Este processo é denominado <em>porting</em>.)
Em segundo lugar, disponibilizar os softwares para usuários casuais sob a forma
de uma distribuição coesa e confortável que seja similar ao que os usuários
Linux estejam acostumados.
(Este processo é denominado empacotamento.)
O projeto oferece pacotes binários pré-compilados bem como um sistema
completamente automatizado de compilação a partir do código fonte.
</p>

<p>
Para atingir estes objetivos, o Fink se baseia nas excelentes ferramentas de
gerenciamento de pacotes produzidas pelo projeto <a
href="http://www.debian.org/">Debian</a> - <code>dpkg</code>,
<code>dselect</code> e <code>apt-get</code>, sobre as quais o Fink adiciona seu
próprio gerenciador de pacotes, denominado (surpresa!) <code>fink</code>
Você pode entender o <code>fink</code> como um mecanismo de compilação - ele
recebe descrições de pacotes e, com base nelas, produz pacotes binários .deb.
Nesse processo, ele baixa da Internet o código fonte original, adapta-o se
necessário e então passa pelo processo completo de configuração e geração do
pacote.
Por último, ele agrupa o resultado em um pacote que está pronto para ser
instalado pelo <code>dpkg</code>.
</p>

<p>
Como o Fink roda sobre o Mac OS X, ele tem uma política estrita para evitar
interferência com o sistema base.
Desta forma, o Fink gerencia uma árvore de diretórios separada e provê uma
infraestrutura que torna fácil o seu uso.
</p>

<h2>Por que usar o Fink?</h2>

<p>
Cinco razões para usar o Fink para instalar software Unix em seu Mac:
</p>

<p>
<b>Poder.</b>
O Mac OS X inclui apenas um conjunto básico de ferramentas de linha de comando.
O Fink traz a você versões aprimoradas dessas ferramentas, bem como várias
aplicações gráficas desenvolvidas para Linux e outros tipos de Unix.
</p>

<p>
<b>Conveniência.</b>
Com o Fink, o processo de compilação é completamente automatizado; você nunca
mais precisará se preocupar com Makefiles ou scripts de configuração e seus
parâmetros.
O sistema de dependências garante, de forma automática, que todas as
bibliotecas necessárias estejam presentes.
De forma geral, nossos pacotes são configurados tal que toda a funcionalidade
dos softwares esteja disponível.
</p>

<p>
<b>Segurança.</b>
A política estrita de não-interferência do Fink garante que as partes
vulneráveis do seu Mac OS X não sejam afetadas.
Você pode atualizar o Mac OS X sem medo de afetar o Fink e vice-versa.
Além disso, o sistema de pacotes permite que você remova com segurança os
softwares de que não mais necessita.
</p>

<p>
<b>Coesão.</b>
O Fink não é apenas um conjunto aleatório de pacotes mas sim uma distribuição
coesa.
Os arquivos instalados são colocados em lugares previsíveis.
A documentação está sempre atualizada.
Existe uma interface unicada para controlar os processos servidores.
E há muito mais trabalhando por você por debaixo dos panos.
</p>

<p>
<b>Flexibilidade.</b>
Você só precisa baixar e instalar os programas de que necessita.
O Fink lhe dá a liberdade de instalar o XFree86 ou outras soluções X11 da forma
que melhor lhe convier.
E se você não gostar de X11, sem problema.
</p>


<p>
<a href="index.php">Voltar à página inicial</a> -
<a href="download/index.php">Download</a>
</p>


<?
include "footer.inc";
?>
