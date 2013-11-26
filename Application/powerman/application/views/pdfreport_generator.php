<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Domore Power Consumption Report</title>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>js/highcharts.js"></script>
<script type="text/javascript">
$(function () {        

        <?php 
        	echo $js_bulk;
		?>
        
});

		</script>



<style type="text/css"> 
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline; }
	
#container {font-family: 'Open Sans', Arial, Helvetica, sans-serif; font-size:12px; margin:auto;}
table td {border-collapse:collapse;}
a, a:link {color:#2A5DB0;text-decoration: underline;}
p {margin:0; padding:0}

.content-left-topic{float:left;}
.space{height:10px;width:800px;background-color:#fff;}
.space20{height:10px;clear:both;border:none;}

h5{
	 font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  font-weight: 700;
	 font-size: 11px;
	  line-height: 24px;
}
h3{
	font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  font-weight: 700;
	 font-size: 26px;
	  line-height: 40px;
	  color:#89c540;
}
hr{
	color:#CCC;
	opacity:0.9;
	margin:10% 0 5%;
}


</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container" style="width:800px;">
<div id="header" style="height:69px;background-color:#CCC;" align="left"><img src="<?php echo base_url();?>img/report_img/header.png" /><div id="location" style="position:relative;top:-60px;left:0px;" align="right"><!--<h3>Area:Rathmalana</h3>--></div></div>

<div id="report-topic" style="height:30px;background:url(<?php echo base_url();?>img/report_img/header-bg.png) repeat-x;"><h5><h5>Total Consumption of the ( <?php echo $year . " - " . $month;?> )</h5> </h5></div>

<!--     --Finished Header--     -->


<div id="content"><!-- Report Body - Start -->

<?php 
        	echo $html_bulk;
?>

</div><!-- Report Body - Stop -->
<br><br><br><br><br>
<div id="footer" style="height:67px;background-color:#ddd;clear:both;border-bottom:5px solid #69ae0e;color:#69ae0e;padding:3px;">
<div id="copyright" style="float:left;font-weight:bold;width:500px;margin-top:53px;">Domore Technologies (Pvt) Limited</div>

<div id="detail" style="float:right;margin-top:5px;"><span> Report Generated by</span><br /><img src="<?php echo base_url();?>img/report_img/logo.png" /> </div>

</div>

</div>
</body>
</html>