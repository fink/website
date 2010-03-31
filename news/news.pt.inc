<a name="2010-04-01%20Sentido%20novo"><span class="news-date">2010-04-01: </span><span class="news-headline">Sentido novo</span></a><?php gray_line(); ?>
			<p>O projeto de Fink considerou o futuro, e é liso e portable.</p>
			<p>1 de maio de 2010 eficaz, nós estamos indo cessar o trabalho em nossos esforços do Mac, e comutamos ao desenvolvimento para o iPad, assim como ao iPhone e ao toque de iPod.</p>
			<p>As distribuições de Fink para usuários do Mac em 10,4, 10,5, e 10,6 ainda estarão disponíveis, mas o projeto já não fornecerão actualizações.</p>
			<p>Obrigado para seu apoio sobre os anos, e nós esperamos que você pegarará um iPad quando está disponível em sua área de modo que você possa continuar a apreciar Fink em uma grande tela.</p>
		<a name="2009-10-30%20Servidor%20novamente%20em%20opera%C3%A7%C3%A3o."><span class="news-date">2009-10-30: </span><span class="news-headline">Servidor novamente em operação.</span></a><?php gray_line(); ?>
	  <p>Nossos serviços ao usuário foram restaurados. Em 28 de outubro o site
	  e alguns dos espelhos (rsync, arquivos fontes, distribuição de binários)
	  foram resturandos e em 30 de outubro todos os principais espelhos rsync
	  estavam operacionais. Uma vez mais, pedimos desculpas pela
	  inconveniência. Agradecemos sua paciência e colaboração.</p>

      <p>Our user services have been restored. On Oct 28th the Web site and
      some of the mirrors (rsync, source files, binary distribution) were
      restored, and on Oct 30th all of our main rsync mirrors were operational.
      Once again, we apologise for the inconvenience. Thanks for your patience
      and support.</p>
    <a name="2009-10-24%20Problemas%20com%20o%20servidor."><span class="news-date">2009-10-24: </span><span class="news-headline">Problemas com o servidor.</span></a><?php gray_line(); ?>
	  <p>Estamos com problemas no servidor e por conseguinte o site e a
	  distribuição oficial de binários estão fora do ar, e os servidores rsync
	  não estão atualizando. Enquanto resolvemos os problemas, você pode:</p>
	  <ul>
		<li>(Web site) Usar o <a href="http://fink.thetis.ig42.org">http://fink.thetis.ig42.org</a>
		caso necessite das informações do site;</li>

		<li>(selfupdate) Se você usa rsync como seu método de selfupdate então
		edite o arquivo <code>/sw/etc/fink.conf</code> e substitua a linha que
		começa com <code>Mirror-rsync</code> por <code>Mirror-rsync:
		rsync://fink.gecko.ig42.org/finkinfo/</code></li>

		<li>(arquivos fontes) Edite o arquivo <code>/sw/etc/fink.conf</code> e
		substitua a linha que começa com <code>Mirror-master</code> por
		<code>Mirror-master: http://fink-dist.gecko.ig42.org</code></li>

		<li>(bindist) Edite o arquivo <code>/sw/etc/fink.conf</code> e
		substitua a linha que começa com <code>Mirror-apt:</code> por
		<code>Mirror-apt: http://fink-bindist.gecko.ig42.org</code></li>

		<li>(bindist) Edite o arquivo <code>/sw/etc/apt/sources.list</code> e
		substitua <code>http://bindist.finkmirrors.net/bindist</code> por
		<code>http://fink-bindist.gecko.ig42.org</code></li>

		<li>Execute o comando <code>fink scanpackages</code></li>
	  </ul>
      <p>Pedimos desculpas pela inconveniência.</p>
	
