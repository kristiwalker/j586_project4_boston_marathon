$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/bostonmarathon/media/recent?access_token=276561954.2579136.3e5b708346c7418e8d496f88f82a42c0&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			
			$.each(json.data,function(i,data){
				html += '<div class="insta-pictures">' + '<img src ="' + data.images.low_resolution.url + '">' + '</div>';
			});
			
			console.log(html);
			$("#insta-results").append(html);
			
		}
		
		
                
               
 });
		