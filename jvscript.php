<div id="fb-root"></div>
		<script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({ appId: '610732638955892',
                    status: true, 
                    cookie: true,
                    xfbml: true,
                    oauth: true,
					});
				FB.Canvas.setAutoGrow();
               //compatibilità con i.e.
			   (function(d){
     				var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     				if (d.getElementById(id)) {return;}
     				js = d.createElement('script'); js.id = id; js.async = true;
     				js.src = "https://connect.facebook.net/en_US/all.js";
     				ref.parentNode.insertBefore(js, ref);
   					}(document));
					
					//autorizzazioni
					FB.login(function(response) {
							//console.log(response);
							if (response.authResponse) {
								//console.log('Permission granted');
							} else {
								//console.log('User cancelled login or did not fully authorize.');
							}
					}, {scope: 'email'});   
            };
			
            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol 
                    + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());
	</script>