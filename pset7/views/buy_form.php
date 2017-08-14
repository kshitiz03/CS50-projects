<form name="sell" action="buy.php" method=post>   
    <fieldset>
        <div class="form-group">
            <input autofocus autocomplete="off" class="form-control" type="text" name="symbol" placeholder="Symbol" onkeyup="quote2(this.value)"/>
        </div>
		<div class="form-group">
			<p> <span id="rt"></span></p>
		</div>
        <div class="form-group">
            <input autofocus autocomplete="off" class="form-control" type="int" name="shares" placeholder="Quantity" onkeyup="tot(this.value)"/>
        </div>
        <div class="control-group">
            <input class="form-control btn btn-success" type="Submit" value="BUY"/>
        </div>
    </fieldset>
</form>

<script>
	function quote2(str) {
		var xhttp;
		if(str.length == 0) {
			document.getElementById("rt").innerHTML = "";
			return;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById("rt").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "quote1.php?q="+str, true);
		xhttp.send(); 
	}
</script>