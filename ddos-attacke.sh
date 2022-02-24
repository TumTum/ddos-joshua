#!/usr/bin/env bash

END=${1:-3};

for i in $(seq 1 $END)
do
  echo -n .
  time curl --silent "http://127.0.0.1:8090/?user=adca&pwd=asdc" > /dev/null &
done
