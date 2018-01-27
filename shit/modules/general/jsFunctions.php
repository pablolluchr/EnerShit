<script type="text/javascript">
	function element(id) {
		return document.getElementById(id);
	}

	function classes(id) {
		return document.getElementsByClassName(id);
	}

	function loadV() {
		// in the form [id, variablename, arguments + ]
		var args = Array.from(arguments);

		//loadP requires form [id, php file, arguments + ]
		//splice to insert the php file in position 2
		args.splice(1, 0, 'loadVariable');
		loadP.apply(null, args);
		// => loadP(id, loadVariable, variablename, arguments + )
	}
</script>