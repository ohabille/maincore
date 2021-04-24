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
		{? for pageMenu ?}
			<a href="{? =host ?}{? dataName url ?}">{? dataName name ?}</a>
        {? endFor ?}
		</p>

		<div id="content">

    	[[ block CONTENT ]]
			<p>default</p>
    	[[ endblock ]]

		</div>

	</body>
</html>
