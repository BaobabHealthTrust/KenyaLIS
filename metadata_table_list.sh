#!/usr/bin/env bash

unset username

# clear

STR=$'Enter username:\r'

echo "$STR"

read username

# clear

unset password

prompt="Enter Password:"
while IFS= read -p "$prompt" -r -s -n 1 char
do
    if [[ $char == $'\0' ]]
    then
        break
    fi
    prompt='*'
    password+="$char"
done

mysqldump -u $username -p$password blis_revamp --tables specimen_activity test_type measure test_type_measure test_panel test_type_container_type specimen_type specimen_test measure_mapping specimen_custom_data test_category unit > metadata.sql

clear

echo "Done!"
