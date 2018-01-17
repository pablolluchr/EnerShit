<?
define('splitCode', 's'); //used as an escape code for splitting parameters

function decodeAjaxParam($param) {
	// used to decode the list pf parameters produced by ajaxParam() in javascript

	if ($param == "") {
		die("error: no parameter for decodeAjaxParam()");
	}

	$delimeter = substr($param, 0, 1);
	$param = substr($param, 1);

	$out = array();
	$curParam = "";
	for ($i=0; $i < strlen($param); $i++) {
		$curChar = substr($param, $i, 1);
		$curParam = $curParam . $curChar;

		// for every delimeter found
		if ($curChar == $delimeter) {

			$nextChar = substr($param, $i + 1, 1);
			if ($nextChar == splitCode) {
				// if split escape code
				$out[] = substr($curParam, 0, -1);
				$curParam = "";

			} else if ($nextChar == $delimeter) {

			} else {
				die("something went wrong in decodeAjaxParam(): single delimeter without escape character following");
			}

			$i++;
		}
	}
	return $out;
}

?>

<script type="text/javascript">
	// global
	var splitCode = "<?e(splitCode)?>";

	function ajaxLoaderEscape(string, delimeter) {
		// the delimeter will act like an escape character for itself
		// for eg. if the delimeter is # then #s (#splitCode) will signal a split and ## will signal the character #
		if (delimeter == "") {
			throw new Error("error: no delimeter given as an escape character");
		}

		if (delimeter.length > 1) {
			console.log("warning: delimeter is longer than one character");
		}

		if (delimeter == splitCode) {
			throw new Error("error: cannot use '" + splitCode + "' as a delimeter for splitting ajax arguments");
		}
		var out = "";
		var lastDel = 0;
		for (var i = 0; i < string.length; i++) {
			if (string.charAt(i) == delimeter) {
				out += string.substring(lastDel, i);
				out += delimeter;
				lastDel = i;
			}
		}
		out += string.substring(lastDel, string.length);
		return out;
	}

	function ajaxParam() {
		// converts a list of parameters to work with the ajax loader with parameters
		// after every parameter (delimeter + splitCode) is added
		// every parameter is encoded to escape the delimeter in case it is used in the parameter
		// [0] = delimeter
		// [1+] = parameters

		if (arguments.length < 2) {
			throw new Error("error: ajaxParam() parameters are too few, must have one delimeter and at least one parameter");
		}

		var out = "";
		var delimeter = arguments[0];
		for (var i = 1; i < arguments.length; i++) {
			out += ajaxLoaderEscape(arguments[i], delimeter);
			out += delimeter + splitCode;
		}
		return delimeter + out;
	}

	function ajaxParamArr(delimeter, array) {
		// like ajaxParam but takes an array of parameters

		if (array.length < 1) {
			throw new Error("error: ajaxParamArr() parameters are too few, must have at least one parameter");
		}

		var out = "";
		for (var i = 0; i < array.length; i++) {
			out += ajaxLoaderEscape(array[i], delimeter);
			out += delimeter + splitCode;
		}
		return encodeURIComponent(delimeter + out);
	}

	function loadP() {
		var id = arguments[0];
		var module = arguments[1];
		// parameters = [2+]

		if (arguments.length < 2) {
			throw new Error("ajax loadP() fail: must have at least a target id and module to load");
		}

		var bg = "#00000000";
		var circle = ["blue", "red", "yellow", "green"];

		var exceptions = ['energy','itemList'];
		if (exceptions.includes(module)) {
			// do nothing
		} else {
		
		// show loading circle
		document.getElementById(id).innerHTML =
		'<div style="background: ' + bg + '; height: 100%; overflow: hidden;" class="center">' +
		'<br>' +
		'<div class="preloader-wrapper big active">' +
		'<div class="spinner-layer spinner-' + circle[0] + '">' +
		'<div class="circle-clipper left">' +
		'<div class="circle"></div>' +
		'</div><div class="gap-patch">' +
		'<div class="circle"></div>' +
		'</div><div class="circle-clipper right">' +
		'<div class="circle"></div>' +
		'</div>' +
		'</div>' +
		'<div class="spinner-layer spinner-' + circle[1] + '">' +
		'<div class="circle-clipper left">' +
		'<div class="circle"></div>' +
		'</div><div class="gap-patch">' +
		'<div class="circle"></div>' +
		'</div><div class="circle-clipper right">' +
		'<div class="circle"></div>' +
		'</div>' +
		'</div>' +
		'<div class="spinner-layer spinner-' + circle[2] + '">' +
		'<div class="circle-clipper left">' +
		'<div class="circle"></div>' +
		'</div><div class="gap-patch">' +
		'<div class="circle"></div>' +
		'</div><div class="circle-clipper right">' +
		'<div class="circle"></div>' +
		'</div>' +
		'</div>' +
		'<div class="spinner-layer spinner-' + circle[3] + '">' +
		'<div class="circle-clipper left">' +
		'<div class="circle"></div>' +
		'</div><div class="gap-patch">' +
		'<div class="circle"></div>' +
		'</div><div class="circle-clipper right">' +
		'<div class="circle"></div>' +
		'</div>' +
		'</div>' +
		'</div><br><br>' +
		'</div>';
	}

		// cnovert parameter list to array to use in ajaxParamArr()
		var parameters = [];
		for (var i = 2; i < arguments.length; i++) {
			parameters.push(arguments[i]);
		}

		var username = encodeURIComponent(getUsername());
		var password = encodeURIComponent(getPassword());

		// load module with parameters if there are any
		var url;
		if (arguments.length > 2) {
			url = "ajaxLoader.php?m=" + module + "&p=" + ajaxParamArr("~", parameters) + "&user=" + username + "&pass=" + password;
		} else {
			url = "ajaxLoader.php?m=" + module + "&user=" + username + "&pass=" + password;
		}
		console.log("loading: " + url);
		$("#" + id).load(url);
	}

</script>
