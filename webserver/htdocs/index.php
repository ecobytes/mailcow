<?php
require_once("inc/header.inc.php");
?>
<div class="jumbotron">
	<div class="container">
		<h2>Welcome @ <?php echo $MYHOSTNAME; ?></h2>
		<p>Setup a mail client to use SMTP and IMAP</p>
		<div class="row">
			<div class="col-md-6">
				<small><b>IMAP(S)</b></small>
				<ul class="ul-horizontal">
					<li><code><?php echo $MYHOSTNAME; ?>:143/tcp</code></li>
					<li><code><?php echo $MYHOSTNAME; ?>:993/tcp</code></li>
				</ul>
				<small><b>SMTP</b></small>
				<ul>
					<li><code><?php echo $MYHOSTNAME; ?>:587/tcp</code></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
		<h4>Health check (© MXToolBox)</h4>
		<p>"The Domain Health Check will execute hundreds of domain/email/network performance tests to make sure all of your systems are online and performing optimally. The report will then return results for your domain and highlight critical problem areas for your domain that need to be resolved."</p>
		<a class="btn btn-material-grey" href="http://mxtoolbox.com/SuperTool.aspx?action=smtp:<?php echo $MYHOSTNAME ?>" target="_blank">Run &raquo;</a>
		<br />
</div> <!-- /container -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/ripples.min.js"></script>
<script src="js/material.min.js"></script>
<script>
$(document).ready(function() {
        $.material.init();
});
</script>
</body>
</html>
