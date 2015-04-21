// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=c6d9d7996bd547a88d63e40a75604806&redirect_uri=http://walkerkd.webfactional.com/j586-project4&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
	
						
$(function() {
	
	var apiurl = "api.dailymile.com/entries/nearby/-71.52208000000002,42.22844"
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
				html += 'div class="insta-pictures">' + '<img src ="' + data.images.low_resolution.url + '">' + '</div>';
			});
			
			console.log(html);
			$("#insta-results").append(html);
			
		}
		
		
                
               
 });
		
		
		
		
	

		
