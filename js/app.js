$(document).ready(function(){
	$.ajax({
		url: "http://localhost/Bethany/index.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var id = [];
			var likes = [];

			for(var i in data) {
				player.push("id " + data[i].news_id);
				score.push(data[i].likes);
			}

			var chartdata = {
				labels: news_id,
				datasets : [
					{
						label: 'Player Score',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: likes
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});