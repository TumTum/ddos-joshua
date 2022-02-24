#!/usr/bin/env bash

END=${1:-3};
HOST=${WEBHOST:-'127.0.0.1'}
PORT=${WEBHOST:-'8090'}

for i in $(seq 1 $END)
do
  echo -n .
  time curl --silent "http://${HOST}:${PORT}/?user=hacker&pwd=verlaufen!" > /dev/null &
done
