<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Domore Power Consumption Report</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
        $('#container1').highcharts({
            chart: {
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
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
}


</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container" style="width:800px;">
<div id="header" style="height:69px;background-color:#CCC;" align="left"><img src="<?php echo base_url();?>img/report_img/header.png" /><div id="location" style="position:relative;top:-60px;left:0px;" align="right"><h3>Area:Rathmalana</h3></div></div>

<div id="report-topic" style="height:30px;background:url(<?php echo base_url();?>img/report_img/header-bg.png) repeat-x;"><h5><h5>Total Consumption of the Last Month(01/10/2013 - 31/10/2013) </h5> </h5></div>

<div id="content">
<div class="row" style="margin-top:15px;">
<div class="content-left-topic" style="width:150px;height:300px;margin-top:40px;">Total Consumption of the Locations </div>
<div class="content-left-topic" style="width:450px;height:300px;">


<script src="<?php echo base_url();?>js/highcharts.js"></script>


<div id="container1" style="min-width: 400px; height: 400px; margin: 0 auto"></div>




</div>
<div class="content-left-topic" style="width:200px;height:300px;"><div class="total">Total consumption of the Area : <span id="exceed" style="color:#F00;"> 150KW(exceed the limit)</span></div>

<div class="location-by-location" style="margin-top:20px;">
<div id="location01">Location 01 : <span>30KW</span></div>
<div id="location01">Location 02 : <span>30KW</span></div>
<div id="location01">Location 03 : <span>30KW</span></div>
<div id="location01">Location 04 : <span>30KW</span></div>
<div id="location01">Location 05 : <span>30KW</span></div>

</div>
<div class="suggestions" style="color:#6C3;"><h5>Suggestions:</h5></div>
<div id="descriotion" style="margin-top:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget dapibus turpis. Nullam mauris tellus, rhoncus eu convallis vitae, adipiscing id sapien. Sed laoreet neque id ipsum hendrerit, ut porta metus lacinia.  </div>
        </div>

</div>

<hr class="space20" />
<hr/>
<!-- row started -->
<div class="row" style="margin-top:15px;">
<div class="content-left-topic" style="width:150px;height:300px;margin-top:40px;">Total Consumption of the Location 01 </div>
<div class="content-left-topic" style="width:450px;height:300px;"><img src="<?php echo base_url();?>img/report_img/report2.png" /></div>
<div class="content-left-topic" style="width:200px;height:300px;"><div class="total">Total consumption of the Location : <span id="normal" style="color:#3C3;"> 30KW(Normal Consumption)</span></div>

<div class="location-by-location" style="margin-top:20px;">
<div id="location01">Week 01 : <span>10KW</span></div>
<div id="location01">Week 02 : <span>10KW</span></div>
<div id="location01">Week 03 : <span>7KW</span></div>
<div id="location01">Week 04 : <span>3KW</span></div>


</div>
<div class="suggestions" style="color:#6C3;"><h5>Suggestions:</h5></div>
<div id="descriotion" style="margin-top:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget dapibus turpis. Nullam mauris tellus, rhoncus eu convallis vitae, adipiscing id sapien. Sed laoreet neque id ipsum hendrerit, ut porta metus lacinia.  </div>
        </div>

</div>
<!-- row end --->

<hr class="space20" />
<hr/>
<div class="row" style="margin-top:15px;">
<div class="content-left-topic" style="width:150px;height:300px;margin-top:40px;">Total Consumption of the Location 02 </div>
<div class="content-left-topic" style="width:450px;height:300px;"><img src="<?php echo base_url();?>img/report_img/report2.png" /></div>
<div class="content-left-topic" style="width:200px;height:300px;"><div class="total">Total consumption of the Location : <span id="normal" style="color:#3C3;"> 30KW(Normal Consumption)</span></div>

<div class="location-by-location" style="margin-top:20px;">
<div id="location01">Week 01 : <span>10KW</span></div>
<div id="location01">Week 02 : <span>10KW</span></div>
<div id="location01">Week 03 : <span>7KW</span></div>
<div id="location01">Week 04 : <span>3KW</span></div>


</div>
<div class="suggestions" style="color:#6C3;"><h5>Suggestions:</h5></div>
<div id="descriotion" style="margin-top:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget dapibus turpis. Nullam mauris tellus, rhoncus eu convallis vitae, adipiscing id sapien. Sed laoreet neque id ipsum hendrerit, ut porta metus lacinia.  </div>
        </div>

</div>
<hr class="space20" />
<hr/>



</div>

<div id="footer" style="height:67px;background-color:#ddd;clear:both;border-bottom:5px solid #69ae0e;color:#69ae0e;padding:3px;">
<div id="copyright" style="float:left;font-weight:bold;width:500px;margin-top:53px;">Domore Technologies (Pvt) Limited</div>

<div id="detail" style="float:right;margin-top:5px;"><span> Report Generated by</span><br /><img src="<?php echo base_url();?>img/report_img/logo.png" /> </div>

</div>

</div>
</body>
</html>
