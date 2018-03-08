<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>
<body>
	

	<h2>Hello,<div id="result1"></div>	
	</h2>
	<button class="btn btn-success" id="logout">Logout</button>
	<h2>Danh Sách Player</h2>
	<div id="result2"></div>
	<script language="javascript">
		
        

		$("#logout").on('click',function(){
			localStorage.clear();
			window.location.href = 'login';
		});

		var token = localStorage.getItem('token');
		if(token == null){
			setTimeout(' window.location.href = "login"; ',0);
		}
		var agrs = {
        url : 'http://localhost:8000/api/auth/me?token='+token, // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là post
        dataType:"text", // dữ liệu trả về dạng text
       
        success : function (data){

        	 var json = $.parseJSON(data);
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
             $('#result1').append(json.name);
            // $('#result1').html(result);
        }
    };
 
    // Truyền object vào để gọi ajax
    $.ajax(agrs);


		
		$.ajax({
			url : 'http://localhost:8000/api/player/listplayer?token='+token,
			type : 'get',
			dataType : 'json',
			success : function (result){

				var html = '';
				html += '<table border="1" cellspacing="0" cellpadding="10">';
				html += '<tr>';
				html += '<td>';
				html += 'campaign_name';
				html += '</td>';

				html += '<td>';
				html += 'location_name';
				html += '</td>';

				html += '<td>';
				html += 'device_name';
				html += '</td>';

				html += '<td>';
				html += 'avatar';
				html += '</td>';

				html += '<td>';
				html += 'full_name';
				html += '</td>';

				html += '<td>';
				html += 'email';
				html += '</td>';

				html += '<td>';
				html += 'phone_number';
				html += '</td>';

				html += '<td>';
				html += 'birthday';
				html += '</td>';

				html += '<td>';
				html += 'mac_address';
				html += '</td>';

				html += '<td>';
				html += 'imei';
				html += '</td>';

				html += '<td>';
				html += 'created_client_at';
				html += '</td>';

				html += '<td>';
				html += 'content';
				html += '</td>';

				html += '<td>';
				html += 'state';
				html += '</td>';
				html += '<tr>';

                        // Kết quả là một object json
                        // Nên ta sẽ loop result
                        $.each (result, function (key, item){
                        	html +=  '<tr>';
                        	html +=  '<td>';
                        	html +=  item['campaign_name'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['location_name'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['device_name'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['avatar'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['full_name'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['email'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['phone_number'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['birthday'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['mac_address'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['imei'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['created_client_at'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['content'];
                        	html +=  '</td>';

                        	html +=  '<td>';
                        	html +=  item['state'];
                        	html +=  '</td>';
                        	html +=  '<tr>';
                        });

                        html +=  '</table>';

                        $('#result2').html(html);
                    }
                });

            </script>
        </body>
        </html>
        <body>
