#!/bin/bash

YUM_CMD=$(which yum)
APT_GET_CMD=$(which apt-get)

if [[ ! -z $APT_GET_CMD ]]; then
	sudo apt-get update
	sudo apt-get install -y git
	curl -sSL https://get.docker.com/ubuntu/ | sudo sh
else
	sudo yum update -y
	sudo yum install -y git
	sudo yum install -y docker
	sudo usermod -a -G docker ec2-user
fi

sudo service docker start

curl -L https://github.com/docker/compose/releases/download/1.7.0/docker-compose-`uname -s`-`uname -m` > ./docker-compose
sudo mv ./docker-compose /usr/bin/docker-compose
sudo chmod +x /usr/bin/docker-compose
