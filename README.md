....... PROJECT NAME : NEWS-OF-THE-DAY...................



NEWS-OF-THE-DAY

...............................................................................................................
You will get daily tech news all over the world in your email and you can like every tech news daily 

.................................................................................................................
								Deployment Steps
.................................................................................................................
step 1: Go to global_variable.php and give your hostnane,username,password..
step 2: go to global variable.php and assign domain name to all variables.
step 3: Run database_table_script.php script to generate database and table..
step 4: store all the files in server
	 Cron setup
	
	1) 0 22 * * * domain name/storenews.php 
		To store news in database every day 10pm. daily
	2) 0 8 * * * domain name/sending.php
		To send email to all user.. at 8:am daily
	3) 0 12 * * 6 domain name/weekly_mail.php
		To send mail every week sunday
