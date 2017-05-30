#!/bin/bash
docker build -t docker/project .
#docker run -t -i docker/project
docker/project

## Delete all docker containers
# docker rm $(docker ps -a -q)
## Delete all docker images
# docker rmi $(docker images -q)
