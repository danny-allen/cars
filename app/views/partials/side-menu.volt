<?php $uri = $this->router->getRewriteUri(); ?>

<div class="side-menu" ui-side-menu>

	<a class="avatar" href="/login">
		<div class="avatar__image">
			<span class="avatar__circle"></span>
			<i class="fa fa-user" aria-hidden="true"></i>
		</div>
		<div class="avatar__text">
			<div class="avatar__name">Guest</div>
			<div class="avatar__status">Not logged in</div>
		</div>
	</a>

	<nav class="nav">
		<span class="nav__label">Navigation</span>
		<ul class="nav__ul">
			<li>
				<a class="nav__link<?php echo ($uri === '/')? ' nav__link--selected' : ''; ?>" href="/"><i class="fa fa-home" aria-hidden="true"></i> Homepage</a>
			</li>
			<li>
				<a class="nav__link<?php echo ($uri === '/products')? ' nav__link--selected' : ''; ?>" href="/products"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Products</a>
				<ul class="nav__ul nav__nested">

					<?php $makes = Makes::find(); ?>
					<?php foreach ($makes as $make): ?>
						<li>
							<a class="nav__link" href="/products/make/<?php echo $make->slug; ?>"><?php echo $make->name; ?></a>
						</li>
					<?php endforeach; ?>
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
		<span class="nav__label">Search Products</span>

			{{ form("products/search", "method": "get") }}
				<div class="search-field">
					<i class="fa fa-search" aria-hidden="true"></i>
			
					<input type="text" id="q" name="q" placeholder="Search..." value="<?php echo $this->request->getQuery('q') ?>" />
				</div>
			{{ end_form() }}
	</div>

</div>