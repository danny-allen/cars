<?php $uri = $this->router->getRewriteUri(); ?>

<div class="side-menu" ui-side-menu>

	<div class="avatar">
		<div class="avatar__image">
			<span>
				<i class="fa fa-user" aria-hidden="true"></i>
			</span>
		</div>
		<div class="avatar__text">
			<div class="avatar__name">Guest</div>
			<div class="avatar__status">Not logged in</div>
		</div>
	</div>

	<nav class="nav">
		<span class="nav__label">Navigation</span>
		<ul class="nav__ul">
			<li>
				<a class="nav__link<?php echo ($uri === '/')? ' nav__link--selected' : ''; ?>" href="/"><i class="fa fa-home" aria-hidden="true"></i> Homepage</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/products')? ' nav__link--selected' : ''; ?>" href="/products"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Products</a>
				<ul class="nav__ul nav__nested">
					<li>
						<a class="nav__link" href="#">Example Sub Item</a>
					</li>
					<li>
						<a class="nav__link" href="#">Example Sub Item</a>
					</li>
					<li>
						<a class="nav__link" href="#">Example Sub Item</a>
					</li>
				</ul>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/about-us')? ' nav__link--selected' : ''; ?>" href="/about-us"><i class="fa fa-question" aria-hidden="true"></i> About Us</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/blog')? ' nav__link--selected' : ''; ?>" href="/blog"><i class="fa fa-pencil" aria-hidden="true"></i> Blog</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/Knowledgebase')? ' nav__link--selected' : ''; ?>" href="/knowledgebase"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Knowledgebase</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/forum')? ' nav__link--selected' : ''; ?>" href="/forum"><i class="fa fa-comments-o" aria-hidden="true"></i> Support Forums</a>
			</li>
		</ul>
	</nav>

	<div class="nav">
		<span class="nav__label">Accounts</span>
		<ul class="nav__ul">
			<li>
				<a class="nav__link<?php echo ($uri === '/register')? ' nav__link--selected' : ''; ?>" href="/register"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/login')? ' nav__link--selected' : ''; ?>" href="/login"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
			</li>
		</ul>
	</div>

	<div class="nav">
		<span class="nav__label">Search</span>

		<div class="search-field">
			<i class="fa fa-search" aria-hidden="true"></i>
			<input type="text" value="Example..." />
		</div>
	</div>

</div>