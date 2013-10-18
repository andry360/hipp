<div id="fb-root"></div>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
                FB.init({ appId: '190130531171231',
                    status: true, 
                    cookie: true,
                    xfbml: true,
                    oauth: true,
					});
				
				FB.Canvas.setAutoGrow();
               //compatibilità con i.e.
			   (function(d, s, id) {
  					var js, fjs = d.getElementsByTagName(s)[0];
  					if (d.getElementById(id)) return;
 					js = d.createElement(s); js.id = id;
  					js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=190130531171231";
  					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
					
					//autorizzazioni
					FB.login(function(response) {
						console.log(response);
						if (response.authResponse) {
							console.log('Permission granted');
						} else {
							console.log('User cancelled login or did not fully authorize.');
						}
				}, {scope: 'email'});
				
				function FacebookInviteFriends() {
					FB.ui({
						method: 'apprequests',
						message: 'Gioca anche tu!'
						 
					});
				}
		};

        (function() {
        	var e = document.createElement('script'); e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/it_IT/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
</script>