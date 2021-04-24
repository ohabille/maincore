<!DOCTYPE html>
<html>
	<!-- Info du site -->
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Démos" />
		<meta name="robots" content="Index, follow" />
		<title>{? =pageTitle ?}</title>
	</head>

	<body>

	[[ block HEADER ]]

		<h1>{? =title ?}</h1>

	[[ endblock ]]

		<p>
			<a href="{? =host ?}accueil">Accueil</a>
			<a href="{? =host ?}articles">Articles</a>
			<a href="{? =host ?}categories">Cat&eacute;gories</a>
			<a href="{? =host ?}contact">Contact</a>
		</p>

		<div id="content">

    	[[ block CONTENT ]]
			<p>default</p>
    	[[ endblock ]]

		</div>

	</body>
</html>
