#!/bin/bash

YUM_CMD=$(which yum)
APT_GET_CMD=$(which apt-get)

if [[ ! -z $YUM_CMD ]]; then
	sudo yum update -y
	sudo yum install -y git
	sudo yum install -y docker
	sudo usermod -a -G docker ec2-user
elif [[ ! -z $APT_GET_CMD ]]; then
	sudo apt-get update
	sudo apt-get install -y git
	curl -sSL https://get.docker.com/ubuntu/ | sudo sh
else
    echo "error can't install package $PACKAGE"
    exit 1;
fi

sudo service docker start

#sudo cp -r var/www/html /var/www/html
#sudo cp -r mcdr /var/www/html