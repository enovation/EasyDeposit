#
# Regular cron jobs for the ndlrdeposit package
#
0 4	* * *	root	[ -x /usr/bin/ndlrdeposit_maintenance ] && /usr/bin/ndlrdeposit_maintenance
