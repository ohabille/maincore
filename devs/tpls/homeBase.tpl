<!DOCTYPE html>
<html>
	<!-- Info du site -->
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Démos" />
		<meta name="robots" content="Index, follow" />
		<link rel="stylesheet" type="text/css" href="{? = HOMEHOST ?}{# stylesheet themes/css/core #}.css" />
		<link rel="stylesheet" type="text/css" href="{? = HOMEHOST ?}{# stylesheet themes/css/style #}.css" />
		<link rel="stylesheet" type="text/css" href="{? = HOMEHOST ?}{# stylesheet themes/css/header #}.css" />
		<link rel="stylesheet" type="text/css" href="{? = HOMEHOST ?}themes/css/{? = stylesheet ?}.css" />
		<title>Les codes de l'inutile{? if ?pagetitle ?} - {? = pagetitle ?}{? endif ?}</title>
	</head>

	<body>

	[[ block HEADER ]]

		[# brick bricks/menu #]

	[[ endblock ]]


		<div id="content">

    	[[ block CONTENT ]]
    	[[ endblock ]]

		</div>

	</body>
</html>
