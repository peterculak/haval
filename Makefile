deploy:
	git diff --name-only HEAD^..HEAD | awk -F 'web/' '{print "curl -u $$FTP_USER:$$FTP_PASSWORD --ftp-create-dirs -T web/"$$2" ftp://wimbledonmobilemechanic.com/"$$2}' | xargs -0 bash -c