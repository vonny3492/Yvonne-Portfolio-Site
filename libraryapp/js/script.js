$(document).ready(function() {

// this is where all of your jQuery and Javascript code go.
	$("#disappear1").delay(5000).fadeOut("slow");
	
	$("#disappear2").delay(5000).fadeOut("slow");

	$("#location").click(function() {
		$("#area").fadeToggle(500);
		});
		
	$("#rec").click(function() {
		$("#recommend").fadeToggle(500);
		});
		
	$("#rate").click(function() {
		$("#rating").fadeToggle(500);
		});

	$("#checkedout").click(function() {
		$("#checked").fadeToggle(500);
		});

	$("#holds").click(function() {
		$("#hold").fadeToggle(500);
		});
		
	$("#lists").click(function() {
		$("#list").fadeToggle(500);
		});
			
	$("#currentread").click(function() {
		$("#current").fadeToggle(500);
		});
		
		
		
		
				
	$("#add1").click(function() {
		$("#dropdown1").fadeToggle(500);
		});	
	
	$("#add2").click(function() {
		$("#dropdown2").fadeToggle(500);
		});	
	
	$("#add3").click(function() {
		$("#dropdown3").fadeToggle(500);
		});	
	
	$("#add4").click(function() {
		$("#dropdown4").fadeToggle(500);
		});	
	
	$("#add5").click(function() {
		$("#dropdown5").fadeToggle(500);
		});	
	
	$("#add6").click(function() {
		$("#dropdown6").fadeToggle(500);
		});	
		
	$("#add7").click(function() {
		$("#dropdown7").fadeToggle(500);
		});	
	
	$("#add8").click(function() {
		$("#dropdown8").fadeToggle(500);
		});	
	
	/*! Chained 0.9.10 - MIT license - Copyright 2010-2014 Mika Tuupola */
!function(a,b){"use strict";a.fn.chained=function(c){return this.each(function(){function d(){var d=!0,g=a("option:selected",e).val();a(e).html(f.html());var h="";a(c).each(function(){var c=a("option:selected",this).val();c&&(h.length>0&&(h+=b.Zepto?"\\\\":"\\"),h+=c)});var i;i=a.isArray(c)?a(c[0]).first():a(c).first();var j=a("option:selected",i).val();a("option",e).each(function(){a(this).hasClass(h)&&a(this).val()===g?(a(this).prop("selected",!0),d=!1):a(this).hasClass(h)||a(this).hasClass(j)||""===a(this).val()||a(this).remove()}),1===a("option",e).size()&&""===a(e).val()?a(e).prop("disabled",!0):a(e).prop("disabled",!1),d&&a(e).trigger("change")}var e=this,f=a(e).clone();a(c).each(function(){a(this).bind("change",function(){d()}),a("option:selected",this).length||a("option",this).first().attr("selected","selected"),d()})})},a.fn.chainedTo=a.fn.chained,a.fn.chained.defaults={}}(window.jQuery||window.Zepto,window,document);
	
	$("#series").chained("#mark");
	
	$("#mark").change(function() {
		$("#replaced").fadeToggle(0);
		});
	
	$("#mark").change(function() {
		$("#replacer").fadeIn(0);
		});
});