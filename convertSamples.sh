#!/bin/bash
folder="./DSCONVERT"
sudo find $folder | rename "s/\s+//g";
sudo find $folder | rename "s/\(//g";
sudo find $folder | rename "s/\)//g";